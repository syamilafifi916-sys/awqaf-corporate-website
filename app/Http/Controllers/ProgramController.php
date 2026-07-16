<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Program & Inisiatif hub — welfare / social-benefit programmes only.
 *
 * Exactly three programmes: Yayasan ZuriatCARE, EduWAQF, AWQAF4Health.
 * CURVES and Infaq are NOT here — they are investment portfolios and live
 * under PortfolioController.
 *
 * Single source of truth: resources/data/programmes.php. Every figure is
 * verified visually against the source PDF page and labelled with year,
 * metric type, report title and page number.
 */
class ProgramController extends Controller
{
    /** @return array<int,array<string,mixed>> */
    private function programmes(): array
    {
        return collect(require resource_path('data/programmes.php'))
            ->sortBy('display_order')
            ->values()
            ->all();
    }

    public function index(): Response
    {
        Seo::set([
            'title' => 'Program & Inisiatif — AWQAF Holdings Berhad',
            'description' => 'Program kebajikan AWQAF Holdings Berhad — Yayasan ZuriatCARE, EduWAQF dan AWQAF4Health — dengan fakta daripada Laporan Tahunan rasmi.',
        ]);

        return Inertia::render('Program/Index', [
            'programmes' => collect($this->programmes())->map(fn ($p) => [
                'slug' => $p['slug'],
                'name' => $p['name'],
                'organisation' => $p['organisation'],
                'status' => $p['status'],
                'summary' => $p['summary'],
                'headline' => $p['facts'][0] ?? null,
            ])->values(),
        ]);
    }

    public function show(string $slug): Response
    {
        $programme = collect($this->programmes())->firstWhere('slug', $slug)
            ?? throw new NotFoundHttpException;

        Seo::set([
            'title' => $programme['name'].' — Program & Inisiatif — AWQAF Holdings Berhad',
            'description' => $programme['summary'],
        ]);

        return Inertia::render('Program/Show', [
            'programme' => $programme,
            'others' => collect($this->programmes())
                ->reject(fn ($p) => $p['slug'] === $slug)
                ->map(fn ($p) => ['slug' => $p['slug'], 'name' => $p['name']])
                ->values(),
        ]);
    }
}
