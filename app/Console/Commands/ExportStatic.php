<?php

namespace App\Console\Commands;

use App\Support\Seo;
use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

/**
 * Static site exporter (AWQAF-CORPORATE-STATIC-001). Renders every public
 * route through the HTTP kernel and writes it to dist/ as static HTML, then
 * bundles the built assets and Cloudflare Pages config. The result runs on
 * Cloudflare Pages with no PHP/DB/Redis at runtime. Excludes /admin.
 */
class ExportStatic extends Command
{
    protected $signature = 'site:export {--base=https://awqaf.my : Absolute base URL baked into canonical/OG/sitemap}';

    protected $description = 'Export the public corporate website to static HTML in dist/';

    public function handle(HttpKernel $kernel): int
    {
        $base = rtrim((string) $this->option('base'), '/');
        $dist = base_path('dist');

        // Force every URL helper (asset(), Storage::url(), Ziggy, canonical)
        // to the production base so nothing bakes the local dev host.
        config([
            'app.url' => $base,
            // The public disk URL is resolved from env at config-load time,
            // so override it explicitly for correct report download links.
            'filesystems.disks.public.url' => $base.'/storage',
        ]);
        URL::forceRootUrl($base);
        if (str_starts_with($base, 'https://')) {
            URL::forceScheme('https');
        }

        File::deleteDirectory($dist);
        File::makeDirectory($dist, 0755, true);

        $failed = 0;
        foreach ($this->urls() as $path) {
            Seo::reset(); // prevent per-page SEO bleed across in-process renders
            // Ziggy emits its full `const Ziggy = {…}` definition only once per
            // process; reset the flag so every exported page is self-contained
            // (otherwise later pages get only an incremental route merge and
            // `route()` is undefined → the page cannot boot).
            \Tighten\Ziggy\BladeRouteGenerator::$generated = false;
            $request = Request::create($base.$path, 'GET');
            $response = $kernel->handle($request);
            $status = $response->getStatusCode();

            if ($status !== 200) {
                $this->error(sprintf('  ✗ %-40s HTTP %d', $path, $status));
                $failed++;
                $kernel->terminate($request, $response);

                continue;
            }

            $this->writeFile($dist, $path, (string) $response->getContent());
            $this->line(sprintf('  ✓ %s', $path));
            $kernel->terminate($request, $response);
        }

        $this->copyAssets($dist);
        $this->writeCloudflareFiles($dist);

        if ($failed > 0) {
            $this->error("Export finished with {$failed} failed route(s).");

            return self::FAILURE;
        }

        $this->info('Static export complete → '.$dist);

        return self::SUCCESS;
    }

    /** @return array<int,string> */
    private function urls(): array
    {
        $slugUrls = fn (string $file, string $prefix) => collect(require resource_path("data/$file"))
            ->pluck('slug')
            ->map(fn ($slug) => "$prefix/$slug")
            ->all();

        return array_merge(
            [
                '/',
                '/wakaf/wakaf-korporat',
                '/wakaf/kaedah-berwakaf',
                '/wakaf/wakaf-bulanan',
                '/wakaf/kategori-pewakaf',
                '/korporat/maklumat-korporat',
                '/korporat/pengasas',
                '/korporat/lembaga-pengarah',
                '/korporat/laporan-tahunan',
                '/ketelusan',
                '/portfolio',
                '/program',
                '/berita',
                '/hubungi',
            ],
            $slugUrls('leadership.php', '/korporat/lembaga-pengarah'),
            $slugUrls('portfolios.php', '/portfolio'),
            $slugUrls('programmes.php', '/program'),
            ['/sitemap.xml', '/robots.txt'],
        );
    }

    private function writeFile(string $dist, string $path, string $content): void
    {
        // Non-HTML routes are written as the literal file (sitemap.xml, robots.txt).
        if (str_ends_with($path, '.xml') || str_ends_with($path, '.txt')) {
            File::put($dist.$path, $content);

            return;
        }

        // Every page becomes <route>/index.html so Cloudflare Pages serves it
        // for the clean URL without an SPA catch-all.
        $target = $path === '/' ? '/index.html' : rtrim($path, '/').'/index.html';
        File::ensureDirectoryExists($dist.dirname($target));
        File::put($dist.$target, $content);
    }

    private function copyAssets(string $dist): void
    {
        foreach (['build', 'css', 'js', 'images'] as $dir) {
            if (File::isDirectory(public_path($dir))) {
                File::copyDirectory(public_path($dir), $dist.'/'.$dir);
            }
        }

        foreach (['favicon.ico', 'favicon.svg', 'apple-touch-icon.png'] as $file) {
            if (File::exists(public_path($file))) {
                File::copy(public_path($file), $dist.'/'.$file);
            }
        }

        // Public storage (downloadable annual reports / financial statements).
        // public/storage is a symlink → copy the real target into the output.
        if (File::isDirectory(storage_path('app/public'))) {
            File::copyDirectory(storage_path('app/public'), $dist.'/storage');
        }
    }

    private function writeCloudflareFiles(string $dist): void
    {
        // Version-controlled in ops/cloudflare/, copied into the output root.
        foreach (['_redirects', '_headers'] as $file) {
            $src = base_path('ops/cloudflare/'.$file);
            if (File::exists($src)) {
                File::copy($src, $dist.'/'.$file);
            }
        }
    }
}
