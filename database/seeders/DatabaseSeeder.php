<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * This app's users table holds STAFF ONLY — member identities live
     * exclusively in the member portal (ADR-001). Staff accounts are
     * created via `php artisan make:filament-user`, never seeded here.
     */
    public function run(): void
    {
        $this->call(ReportSeeder::class);
    }
}
