<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgmRsvpResource\Pages;
use App\Models\AgmRsvp;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
                Tables\Columns\TextColumn::make('ic_number')
                    ->label('No. IC')
                    ->copyable()
                    ->copyMessage('No. IC disalin'),
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
            ->headerActions([
                Tables\Actions\Action::make('exportExcel')
                    ->label('Download Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function (): StreamedResponse {
                        $filename = 'senarai-kehadiran-agm-2026-'.now()->format('Y-m-d-His').'.csv';
                        return response()->streamDownload(function () {
                            $out = fopen('php://output', 'w');
                            fwrite($out, "\xEF\xBB\xBF");
                            fputcsv($out, ['Nama', 'No. IC', 'Kehadiran', 'Tarikh', 'Masa']);
                            AgmRsvp::query()->latest()->chunk(500, function ($rows) use ($out) {
                                foreach ($rows as $row) {
                                    fputcsv($out, [
                                        $row->name,
                                        $row->ic_number,
                                        $row->attendance === 'hadir' ? 'Hadir' : 'Tidak Hadir',
                                        $row->created_at?->format('d/m/Y'),
                                        $row->created_at?->format('h:i A'),
                                    ]);
                                }
                            });
                            fclose($out);
                        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
                    }),
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
