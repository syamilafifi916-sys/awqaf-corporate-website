<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgmRsvpResource\Pages;
use App\Models\AgmRsvp;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgmRsvpResource extends Resource
{
    protected static ?string $model = AgmRsvp::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Senarai Kehadiran';
    protected static ?string $modelLabel = 'Kehadiran AGM';
    protected static ?string $pluralModelLabel = 'Kehadiran AGM 2026';
    protected static ?string $navigationGroup = 'AGM 2026';
    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('attendance')
                    ->label('Kehadiran')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'hadir' => 'Hadir',
                        'tidak_hadir' => 'Tidak Hadir',
                        default => ucfirst(str_replace('_', ' ', $state)),
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Dihantar')->dateTime('d M Y, h:i A')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('attendance')
                    ->label('Kehadiran')
                    ->options(['hadir' => 'Hadir', 'tidak_hadir' => 'Tidak Hadir']),
            ])
            ->actions([])
            ->bulkActions([])
            ->emptyStateHeading('Belum ada pengesahan kehadiran')
            ->emptyStateDescription('Rekod akan muncul di sini selepas ahli menghantar borang AGM.');
    }

    public static function canCreate(): bool { return false; }
    public static function canEdit($record): bool { return false; }
    public static function canDelete($record): bool { return false; }

    public static function getPages(): array
    {
        return ['index' => Pages\ListAgmRsvps::route('/')];
    }
}
