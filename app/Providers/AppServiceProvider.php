<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use App\Contracts\WhatsAppProvider;
use App\Services\WhatsApp\MetaCloudWhatsAppProvider;
use App\Services\WhatsApp\NullWhatsAppProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WhatsAppProvider::class, fn () => config('services.whatsapp.enabled', false)
            ? new MetaCloudWhatsAppProvider()
            : new NullWhatsAppProvider());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
