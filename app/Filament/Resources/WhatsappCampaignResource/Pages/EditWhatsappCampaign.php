<?php
namespace App\Filament\Resources\WhatsappCampaignResource\Pages;
use App\Filament\Resources\WhatsappCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
class EditWhatsappCampaign extends EditRecord {
 protected static string $resource=WhatsappCampaignResource::class;
 protected function getHeaderActions(): array { return []; }
};