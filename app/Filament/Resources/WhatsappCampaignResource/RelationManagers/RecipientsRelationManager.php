<?php
namespace App\Filament\Resources\WhatsappCampaignResource\RelationManagers;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
class RecipientsRelationManager extends RelationManager {
 protected static string $relationship='recipients';
 protected static ?string $title='Recipients';
 public function form(Form $form): Form { return $form->schema([
  Forms\Components\TextInput::make('name')->maxLength(150),
  Forms\Components\TextInput::make('phone')->required()->disabled(),
 ]); }
 public function table(Table $table): Table { return $table->columns([
  Tables\Columns\TextColumn::make('name')->searchable(),
  Tables\Columns\TextColumn::make('phone')->searchable()->copyable(),
  Tables\Columns\TextColumn::make('status')->badge(),
  Tables\Columns\TextColumn::make('sent_at')->dateTime(),
  Tables\Columns\TextColumn::make('delivered_at')->dateTime(),
  Tables\Columns\TextColumn::make('read_at')->dateTime(),
  Tables\Columns\TextColumn::make('failure_reason')->limit(40)->toggleable(),
 ])->defaultSort('id','desc')->actions([])->bulkActions([]); }
};