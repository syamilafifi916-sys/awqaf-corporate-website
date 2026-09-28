<?php
namespace App\Filament\Resources;
use App\Filament\Resources\WhatsappSuppressionResource\Pages;
use App\Models\WhatsappSuppression;
use App\Services\WhatsApp\PhoneNormalizer;
use Filament\Forms; use Filament\Forms\Form; use Filament\Resources\Resource; use Filament\Tables; use Filament\Tables\Table;
class WhatsappSuppressionResource extends Resource {
 protected static ?string $model=WhatsappSuppression::class;
 protected static ?string $navigationIcon='heroicon-o-no-symbol';
 protected static ?string $navigationGroup='Communications';
 protected static ?string $navigationLabel='WhatsApp Suppressions';
 public static function form(Form $form): Form { return $form->schema([
  Forms\Components\TextInput::make('phone')->required()->dehydrateStateUsing(fn($state)=>app(PhoneNormalizer::class)->malaysia($state)),
  Forms\Components\TextInput::make('reason')->maxLength(255),
  Forms\Components\Hidden::make('suppressed_at')->default(fn()=>now()),
 ]); }
 public static function table(Table $table): Table { return $table->columns([
  Tables\Columns\TextColumn::make('phone')->searchable(), Tables\Columns\TextColumn::make('reason'), Tables\Columns\TextColumn::make('suppressed_at')->dateTime()->sortable()
 ])->actions([Tables\Actions\DeleteAction::make()])->bulkActions([]); }
 public static function getPages(): array { return ['index'=>Pages\ListWhatsappSuppressions::route('/')]; }
};