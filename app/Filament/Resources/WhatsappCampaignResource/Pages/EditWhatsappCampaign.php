<?php
namespace App\Filament\Resources\WhatsappCampaignResource\Pages;
use App\Filament\Resources\WhatsappCampaignResource;
use App\Services\WhatsApp\RecipientImporter;
use App\Services\WhatsApp\TestSender;
use App\Services\WhatsApp\PhoneNormalizer;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditWhatsappCampaign extends EditRecord {
 protected static string $resource=WhatsappCampaignResource::class;
 protected function getHeaderActions(): array {
  return [
   Actions\Action::make('importRecipients')->label('Import CSV')->icon('heroicon-o-arrow-up-tray')
    ->visible(fn()=>in_array($this->record->status,['draft','ready'],true))
    ->form([FileUpload::make('csv')->label('Recipients CSV')->acceptedFileTypes(['text/csv','text/plain','application/vnd.ms-excel'])->disk('local')->directory('whatsapp-imports')->required()->helperText('Required header: phone. Optional header: name.')])
    ->action(function(array $data,RecipientImporter $importer){
      $path=storage_path('app/'.$data['csv']);
      $stats=$importer->import($this->record,$path);
      @unlink($path);
      Notification::make()->title('Recipient import completed')->body("Imported: {$stats['imported']} · Duplicates: {$stats['duplicate']} · Suppressed: {$stats['suppressed']} · Invalid: {$stats['invalid']}")->success()->send();
    }),
   Actions\Action::make('testSend')->label('Test Send')->icon('heroicon-o-paper-airplane')->color('gray')
    ->visible(fn()=>in_array($this->record->status,['draft','ready'],true))
    ->form([\Filament\Forms\Components\TextInput::make('phone')->label('Test phone')->tel()->required()->helperText('One test number only. This does not add the number to campaign recipients.')])
    ->requiresConfirmation()->modalDescription('Send the approved template to this one test number? The official provider must already be enabled.')
    ->action(function(array $data,TestSender $sender){$sender->send($this->record,$data['phone']);Notification::make()->title('Test message submitted to provider')->success()->send();}),
   Actions\Action::make('markReady')->label('Mark Ready')->color('warning')
    ->requiresConfirmation()->modalDescription('This locks the campaign content for review. It still does not send any WhatsApp messages.')
    ->visible(fn()=>$this->record->status==='draft' && $this->record->recipient_count>0)
    ->action(function(){ $this->record->update(['status'=>'ready']); Notification::make()->title('Campaign ready for review')->success()->send(); }),
   Actions\Action::make('approveQueue')->label('Approve for Queue')->color('danger')
    ->requiresConfirmation()->modalHeading('Approve this broadcast?')
    ->modalDescription('Approval changes status to queued only. Real dispatch remains disabled until an official provider and test-send gate are configured.')
    ->visible(fn()=>$this->record->status==='ready')
    ->action(function(){ $this->record->update(['status'=>'queued']); Notification::make()->title('Campaign queued — dispatch is disabled')->warning()->send(); }),
  ];
 }
 protected function mutateFormDataBeforeSave(array $data): array {
  if(!in_array($this->record->status,['draft','ready'],true)) abort(409,'Queued/sent campaigns cannot be edited.');
  return $data;
 }
};