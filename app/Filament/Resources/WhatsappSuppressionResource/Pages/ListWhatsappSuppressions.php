<?php
namespace App\Filament\Resources\WhatsappSuppressionResource\Pages;
use App\Filament\Resources\WhatsappSuppressionResource; use Filament\Actions; use Filament\Resources\Pages\ListRecords;
class ListWhatsappSuppressions extends ListRecords {
 protected static string $resource=WhatsappSuppressionResource::class;
 protected function getHeaderActions(): array { return [Actions\CreateAction::make()->label('Add Suppression')]; }
};