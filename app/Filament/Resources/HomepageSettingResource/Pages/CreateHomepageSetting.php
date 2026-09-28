<?php

namespace App\Filament\Resources\HomepageSettingResource\Pages;

use App\Filament\Resources\HomepageSettingResource;
use App\Models\HomepageSetting;
use Filament\Resources\Pages\CreateRecord;

class CreateHomepageSetting extends CreateRecord
{
    protected static string $resource = HomepageSettingResource::class;

    public function mount(): void
    {
        $existing = HomepageSetting::query()->first();

        if ($existing) {
            $this->redirect(HomepageSettingResource::getUrl('edit', ['record' => $existing]));

            return;
        }

        parent::mount();
    }
}
