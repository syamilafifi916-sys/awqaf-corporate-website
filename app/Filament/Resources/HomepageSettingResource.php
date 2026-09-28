<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageSettingResource\Pages;
use App\Models\HomepageSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HomepageSettingResource extends Resource
{
    protected static ?string $model = HomepageSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Homepage';

    protected static ?string $modelLabel = 'Homepage';

    protected static ?string $pluralModelLabel = 'Homepage';

    protected static ?string $navigationGroup = 'Kandungan Website';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Hero')
                    ->description('Kandungan utama yang dipaparkan pada bahagian atas homepage.')
                    ->schema([
                        Forms\Components\TextInput::make('eyebrow')
                            ->label('Label Atas')
                            ->required()
                            ->maxLength(100),

                        Forms\Components\TextInput::make('headline_line_1')
                            ->label('Headline — Baris 1')
                            ->required()
                            ->maxLength(120),

                        Forms\Components\TextInput::make('headline_line_2')
                            ->label('Headline — Baris 2')
                            ->required()
                            ->maxLength(120),

                        Forms\Components\TextInput::make('headline_line_3')
                            ->label('Headline — Baris 3')
                            ->required()
                            ->maxLength(120),

                        Forms\Components\Textarea::make('hero_description')
                            ->label('Penerangan')
                            ->rows(4)
                            ->maxLength(500)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Media Hero')
                    ->description('Video digunakan pada desktop/tablet. Imej menjadi fallback untuk mobile dan reduced-motion.')
                    ->schema([
                        Forms\Components\FileUpload::make('hero_video')
                            ->label('Video Hero')
                            ->disk('public')
                            ->directory('cms/homepage/video')
                            ->acceptedFileTypes(['video/mp4'])
                            ->maxSize(15360)
                            ->helperText('MP4 sahaja. Disyorkan 16:9 dan bawah 10 MB.'),

                        Forms\Components\FileUpload::make('hero_image')
                            ->label('Imej Fallback')
                            ->disk('public')
                            ->directory('cms/homepage/images')
                            ->image()
                            ->imageEditor()
                            ->maxSize(5120),

                        Forms\Components\FileUpload::make('og_image')
                            ->label('Imej Social / OG')
                            ->disk('public')
                            ->directory('cms/seo')
                            ->image()
                            ->imageEditor()
                            ->maxSize(5120),
                    ])
                    ->columns(3),

                Forms\Components\Section::make('Call to Action')
                    ->schema([
                        Forms\Components\TextInput::make('cta_label')
                            ->label('Teks Butang')
                            ->maxLength(80),

                        Forms\Components\TextInput::make('cta_url')
                            ->label('URL')
                            ->placeholder('/wakaf/kaedah-berwakaf')
                            ->maxLength(2048),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('SEO')
                    ->schema([
                        Forms\Components\TextInput::make('seo_title')
                            ->label('SEO Title')
                            ->maxLength(70),

                        Forms\Components\Textarea::make('seo_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->maxLength(170)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Publishing')
                    ->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Published')
                            ->helperText('Aktifkan hanya apabila kandungan sudah bersedia untuk laman awam.')
                            ->live(),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tarikh Publish')
                            ->seconds(false),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('headline_line_1')
                    ->label('Homepage')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Kemaskini Terakhir')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false);
    }

    public static function canCreate(): bool
    {
        return HomepageSetting::query()->doesntExist();
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageSettings::route('/'),
            'create' => Pages\CreateHomepageSetting::route('/create'),
            'edit' => Pages\EditHomepageSetting::route('/{record}/edit'),
        ];
    }
}
