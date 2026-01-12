<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $navigationLabel = 'Videos';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Video Information')
                                        ->schema([
                                            Forms\Components\TextInput::make('title')
                                                                      ->required()
                                                                      ->maxLength(255)
                                                                      ->columnSpanFull(),

//                                            Forms\Components\Textarea::make('description')
//                                                                     ->rows(3)
//                                                                     ->columnSpanFull(),

                                            Forms\Components\Grid::make(2)
                                                                 ->schema([
                                                                     Forms\Components\TextInput::make('order')
                                                                                               ->numeric()
                                                                                               ->default(0)
                                                                                               ->required()
                                                                                               ->helperText('Lower numbers appear first'),

                                                                     Forms\Components\Toggle::make('is_active')
                                                                                            ->label('Active')
                                                                                            ->default(true)
                                                                                            ->required(),
                                                                 ]),
                                        ])
                                        ->columns(2),

                Forms\Components\Section::make('Media')
                                        ->schema([
                                            SpatieMediaLibraryFileUpload::make('video')
                                                                        ->collection('video')
                                                                        ->label('Video File')
                                                                        ->acceptedFileTypes([
                                                                            'video/mp4', 'video/mpeg', 'video/quicktime'
                                                                        ])
                                                                        ->maxSize(102400) // 100MB
                                                                        ->required()
                                                                        ->helperText('Upload MP4, MPEG, or MOV video files (Max: 100MB)')
                                                                        ->columnSpanFull(),

                                            SpatieMediaLibraryFileUpload::make('thumbnail')
                                                                        ->collection('thumbnail')
                                                                        ->label('Video Thumbnail')
                                                                        ->image()
                                                                        ->imageEditor()
                                                                        ->imageEditorAspectRatios([
                                                                            '16:9',
                                                                            '4:3',
                                                                        ])
                                                                        ->maxSize(5120) // 5MB
                                                                        ->helperText('Upload a thumbnail image for the video preview')
                                                                        ->columnSpanFull(),
                                        ])
                                        ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')
                                         ->sortable()
                                         ->badge()
                                         ->color('primary'),

                SpatieMediaLibraryImageColumn::make('thumbnail')
                                             ->collection('thumbnail')
                                             ->label('Thumbnail')
                                             ->square()
                                             ->size(80),

                Tables\Columns\TextColumn::make('title')
                                         ->searchable()
                                         ->sortable()
                                         ->weight('bold'),

//                Tables\Columns\TextColumn::make('description')
//                                         ->limit(50)
//                                         ->searchable(),

                Tables\Columns\IconColumn::make('is_active')
                                         ->boolean()
                                         ->label('Active')
                                         ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                                         ->dateTime()
                                         ->sortable()
                                         ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                                            ->label('Active Status')
                                            ->placeholder('All videos')
                                            ->trueLabel('Active only')
                                            ->falseLabel('Inactive only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
