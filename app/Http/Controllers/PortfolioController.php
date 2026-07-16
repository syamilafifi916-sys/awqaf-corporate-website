<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Portfolio Pelaburan hub — investment / business portfolios only.
 *
 * Four portfolios: Pendidikan, Kesihatan & Kesejahteraan, Hartanah, Fintech.
 * CURVES lives under Kesihatan & Kesejahteraan; Infaq lives under Fintech.
 * Welfare programmes (ZuriatCARE, EduWAQF, AWQAF4Health) are NOT here.
 *
 * Single source of truth: resources/data/portfolios.php. Every figure is
 * verified visually against the source PDF page and labelled with year,
 * metric type, report title and page number.
 */
class PortfolioController extends Controller
{
    /** @return array<int,array<string,mixed>> */
    private function portfolios(): array
    {
        return collect(require resource_path('data/portfolios.php'))
            ->sortBy('display_order')
            ->values()
            ->all();
    }

    public function index(): Response
    {
        Seo::set([
            'title' => 'Portfolio Pelaburan — AWQAF Holdings Berhad',
            'description' => 'Empat portfolio pelaburan AWQAF Holdings Berhad — Pendidikan, Kesihatan & Kesejahteraan, Hartanah dan Fintech — dengan fakta daripada Laporan Tahunan rasmi.',
        ]);

        return Inertia::render('Portfolio/Index', [
            'portfolios' => collect($this->portfolios())->map(fn ($p) => [
                'slug' => $p['slug'],
                'name' => $p['name'],
                'entity' => $p['entity'],
                'status' => $p['status'],
                'summary' => $p['summary'],
                'headline' => $p['facts'][0] ?? null,
            ])->values(),
        ]);
    }

    public function show(string $slug): Response
    {
        $portfolio = collect($this->portfolios())->firstWhere('slug', $slug)
            ?? throw new NotFoundHttpException;

        Seo::set([
            'title' => $portfolio['name'].' — Portfolio Pelaburan — AWQAF Holdings Berhad',
            'description' => $portfolio['summary'],
        ]);

        return Inertia::render('Portfolio/Show', [
            'portfolio' => $portfolio,
            'others' => collect($this->portfolios())
                ->reject(fn ($p) => $p['slug'] === $slug)
                ->map(fn ($p) => ['slug' => $p['slug'], 'name' => $p['name']])
                ->values(),
        ]);
    }
}
