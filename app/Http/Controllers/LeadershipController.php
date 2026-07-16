<?php

namespace App\Http\Controllers;

use App\Support\Seo;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LeadershipController extends Controller
{
    public function index(): Response
    {
        Seo::set([
            'title' => 'Lembaga Pengarah — AWQAF Holdings Berhad',
            'description' => 'Ahli Lembaga Pengarah AWQAF Holdings Berhad (2025) — pengerusi, jawatankuasa dan profil kepimpinan.',
        ]);

        return Inertia::render('Korporat/Leadership/Index', [
            'directors' => self::directors()->map(fn ($d) => [
                'slug' => $d['slug'],
                'full_name' => $d['full_name'],
                'designation' => $d['designation'],
                'committee_roles' => $d['committee_roles'],
                'summary' => $d['summary'],
                'photo' => $d['photo'],
            ])->values(),
        ]);
    }

    public function show(string $slug): Response
    {
        $director = self::directors()->firstWhere('slug', $slug) ?? throw new NotFoundHttpException;
        $jobTitle = trim($director['designation'].(empty($director['committee_roles']) ? '' : ' · '.implode(' · ', $director['committee_roles'])));

        Seo::set([
            'title' => $director['full_name'].' — Lembaga Pengarah — AWQAF Holdings Berhad',
            'description' => $director['summary'],
            'image' => asset("images/leadership/{$director['photo']}.jpg"),
            'type' => 'profile',
            'schema' => [
                '@context' => 'https://schema.org',
                '@type' => 'Person',
                'name' => $director['full_name'],
                'jobTitle' => $jobTitle,
                'image' => asset("images/leadership/{$director['photo']}.jpg"),
                'worksFor' => [
                    '@type' => 'Organization',
                    'name' => 'AWQAF Holdings Berhad',
                ],
            ],
        ]);

        return Inertia::render('Korporat/Leadership/Show', [
            'director' => $director,
            'others' => self::directors()
                ->reject(fn ($d) => $d['slug'] === $slug)
                ->map(fn ($d) => ['slug' => $d['slug'], 'full_name' => $d['full_name'], 'designation' => $d['designation']])
                ->values(),
        ]);
    }

    private static function directors(): Collection
    {
        return collect(require resource_path('data/leadership.php'))
            ->where('status', 'active')
            ->sortBy('display_order')
            ->values();
    }
}
