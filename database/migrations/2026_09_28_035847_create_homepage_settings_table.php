<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('eyebrow')->default('AWQAF Holdings Berhad');
            $table->string('headline_line_1')->default('Membina Ekonomi.');
            $table->string('headline_line_2')->default('Memakmurkan Ummah.');
            $table->string('headline_line_3')->default('Mewariskan Masa Depan.');
            $table->text('hero_description')->nullable();

            // Hero media
            $table->string('hero_video')->nullable();
            $table->string('hero_image')->nullable();

            // Primary CTA
            $table->string('cta_label')->nullable();
            $table->string('cta_url')->nullable();

            // SEO
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('og_image')->nullable();

            // Publishing
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
