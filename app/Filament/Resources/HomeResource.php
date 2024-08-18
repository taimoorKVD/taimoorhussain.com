<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomeResource\Pages;
use App\Models\Home;
use Filament\Forms;
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

class HomeResource extends Resource
{
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    protected static ?string $model = Home::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Home';

    protected static ?string $breadcrumb = 'Home';

    protected static ?string $pluralLabel = 'Home';

    protected static ?string $slug = 'website/pages/home';

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
                Forms\Components\Section::make('Cover Information')
                    ->schema([
                        Forms\Components\FileUpload::make('bg-image')
                            ->label('Upload Image')
                            ->required()
                            ->directory('website/image/covers')
                            ->columnSpanFull()
                    ]),
                Forms\Components\Section::make('Socialize Information')
                    ->schema([
                        Repeater::make('home_social_links')
                            ->relationship('socialLinks')
                            ->schema([
                                TextInput::make('link')
                                    ->required(),
                                Forms\Components\FileUpload::make('svg')
                                    ->label('Upload SVG')
                                    ->required()
                                    ->directory('website/image/social-links')
                                    ->columnSpanFull()
                            ])
                            ->collapsed()
                            ->collapsible()
                            ->cloneable()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('bg-image')
                    ->label('Cover')
                    ->circular(),
                TextColumn::make('title'),
                TextColumn::make('description')
                    ->wrap()
                    ->html(true),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M, Y - h:i:s A')
                    ->timezone('Asia/Karachi')
                    ->badge()
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
                Tables\Actions\EditAction::make()
                    ->successNotification(
                        Notification::make()
                            ->warning()
                            ->title('Home Successfully Updated')
                            ->body('The home page has been successfully updated.')
                    )
                    ->slideOver(),
            ])
            ->paginated(false);
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
                            ->html(true),
                    ])->columns(2),
                Section::make('Cover Information')
                    ->schema([
                        ImageEntry::make('bg-image')
                            ->label('Uploaded Image')
                            ->extraImgAttributes([
                                'alt' => 'Logo',
                                'loading' => 'lazy',
                            ]),
                    ]),
                Section::make('Socialize Information')
                    ->schema([
                        RepeatableEntry::make('socialLinks')
                            ->schema([
                                TextEntry::make('link'),
                                ImageEntry::make('svg')
                                    ->label('Uploaded SVG')
                                    ->extraImgAttributes([
                                        'alt' => 'Logo',
                                        'loading' => 'lazy',
                                    ]),
                            ])
                            ->columns(2)
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomes::route('/')
        ];
    }
}
