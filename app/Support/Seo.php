<?php

namespace App\Support;

class Seo
{
    protected static array $data = [];

    public static function set(array $data): void
    {
        static::$data = array_merge(static::defaults(), static::$data, $data);
    }

    public static function get(): array
    {
        return array_merge(static::defaults(), static::$data);
    }

    protected static function defaults(): array
    {
        return [
            'title' => config('app.name'),
            'description' => 'AWQAF Holdings Berhad — institusi Waqaf Korporat yang memacu kelestarian ummah menerusi tadbir urus yang telus dan bertanggungjawab.',
            'image' => asset('images/og-default.jpg'),
            'canonical' => url()->current(),
            'type' => 'website',
            'schema' => null,
        ];
    }
}
