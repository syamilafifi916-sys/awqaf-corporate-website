<?php
namespace App\Filament\Resources\WhatsappCampaignResource\Pages;
use App\Filament\Resources\WhatsappCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
class ListWhatsappCampaigns extends ListRecords {
 protected static string $resource=WhatsappCampaignResource::class;
 protected function getHeaderActions(): array { return [Actions\CreateAction::make()->label('New Broadcast')]; }
};