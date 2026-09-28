<?php
namespace App\Filament\Resources\WhatsappCampaignResource\Pages;
use App\Filament\Resources\WhatsappCampaignResource;
use Filament\Resources\Pages\CreateRecord;
class CreateWhatsappCampaign extends CreateRecord {
 protected static string $resource=WhatsappCampaignResource::class;
 protected function mutateFormDataBeforeCreate(array $data): array { $data['created_by']=auth()->id(); $data['status']='draft'; return $data; }
};