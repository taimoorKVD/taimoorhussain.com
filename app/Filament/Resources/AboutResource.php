<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $slug = 'website/pages/about';

    protected static ?string $pluralLabel = 'About';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 2;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->minLength(2)
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->required(),
                    ]),
                Forms\Components\Section::make('Sidebar Information')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Upload Image')
                            ->required()
                            ->directory('website/image/about')
                            ->columnSpanFull()
                    ]),
                Forms\Components\Section::make('Skill Information')
                    ->schema([
                        Repeater::make('skill')
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('percentage')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(100),
                                ColorPicker::make('color')
                                    ->required()
                            ])
                            ->collapsible()
                            ->cloneable()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->circular(),
                TextColumn::make('title'),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M, Y - h:i:s A')
                    ->timezone('Asia/Karachi')
                    ->badge()
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->slideOver(),
                Tables\Actions\EditAction::make()
                    ->successNotification(
                        Notification::make()
                            ->warning()
                            ->title('About Successfully Updated')
                            ->body('The about page has been successfully updated.')
                    )
                    ->slideOver(),
            ])->paginated(false);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('updated_at')
                            ->label('Last Update')
                            ->dateTime('d M, Y - h:i:s A')
                            ->timezone('Asia/Karachi')
                            ->badge(),
                        TextEntry::make('description')
                            ->columnSpanFull()
                            ->html(true),
                    ])->columns(2),
                Section::make('Media Information')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Uploaded Image')
                            ->extraImgAttributes([
                                'alt' => 'Logo',
                                'loading' => 'lazy',
                            ]),
                    ]),
                Section::make('Skill Information')
                    ->schema([
                        RepeatableEntry::make('skill')
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('percentage'),
                                TextEntry::make('color'),
                            ])
                            ->columns(2)
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
        ];
    }
}
