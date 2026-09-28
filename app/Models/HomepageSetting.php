<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'eyebrow',
    'headline_line_1',
    'headline_line_2',
    'headline_line_3',
    'hero_description',
    'hero_video',
    'hero_image',
    'cta_label',
    'cta_url',
    'seo_title',
    'seo_description',
    'og_image',
    'is_published',
    'published_at',
])]
class HomepageSetting extends Model
{
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }
}
