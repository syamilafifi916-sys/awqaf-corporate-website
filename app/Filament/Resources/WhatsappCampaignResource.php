<?php
namespace App\Filament\Resources;
use App\Filament\Resources\WhatsappCampaignResource\Pages;
use App\Models\WhatsappCampaign;
use App\Filament\Resources\WhatsappCampaignResource\RelationManagers\RecipientsRelationManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WhatsappCampaignResource extends Resource {
 protected static ?string $model=WhatsappCampaign::class;
 protected static ?string $navigationIcon='heroicon-o-chat-bubble-left-right';
 protected static ?string $navigationGroup='Communications';
 protected static ?string $navigationLabel='WhatsApp Broadcast';
 protected static ?string $modelLabel='WhatsApp Campaign';
 protected static ?string $pluralModelLabel='WhatsApp Campaigns';

 public static function form(Form $form): Form {
  return $form->schema([
   Forms\Components\Section::make('Campaign')->schema([
    Forms\Components\TextInput::make('name')->required()->maxLength(150),
    Forms\Components\TextInput::make('template_name')->helperText('Use an approved WhatsApp template name when provider integration is enabled.')->maxLength(150),
    Forms\Components\Textarea::make('message_preview')->label('Message preview')->rows(7)->helperText('Preview only. V1 does not send messages from this screen.'),
    Forms\Components\DateTimePicker::make('scheduled_at')->label('Planned send time'),
   ])->columns(2),
  ]);
 }
 public static function table(Table $table): Table {
  return $table->columns([
   Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
   Tables\Columns\TextColumn::make('status')->badge()->sortable(),
   Tables\Columns\TextColumn::make('recipient_count')->label('Recipients')->numeric(),
   Tables\Columns\TextColumn::make('delivered_count')->label('Delivered')->numeric(),
   Tables\Columns\TextColumn::make('read_count')->label('Read')->numeric(),
   Tables\Columns\TextColumn::make('failed_count')->label('Failed')->numeric(),
   Tables\Columns\TextColumn::make('scheduled_at')->dateTime()->sortable(),
   Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(),
  ])->defaultSort('created_at','desc')->actions([
   Tables\Actions\EditAction::make(),
  ])->bulkActions([]);
 }
 public static function getRelations(): array { return [RecipientsRelationManager::class]; }
 public static function getPages(): array {
  return ['index'=>Pages\ListWhatsappCampaigns::route('/'),'create'=>Pages\CreateWhatsappCampaign::route('/create'),'edit'=>Pages\EditWhatsappCampaign::route('/{record}/edit')];
 }
};