<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use Filament\Forms;
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
use Illuminate\Database\Eloquent\Builder;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $slug = 'website/pages/portfolios';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 5;

    public static function getEloquentQuery(): Builder
    {
        return Portfolio::latest();
    }

    public static function getCount(): int
    {
        return self::getEloquentQuery()->count();
    }

    public static function getNavigationBadge(): ?string
    {
        return self::getCount();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return self::getCount() > 10 ? 'success' : 'info';
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
                            ->required()
                    ]),
                Forms\Components\Section::make('Technical Information')
                    ->schema([
                        Forms\Components\Select::make('category')
                            ->required()
                            ->options([
                                'Customer Relational Management' => 'Customer Relational Management',
                                'Content Management System' => 'Content Management System',
                                'Ecommerce' => 'Ecommerce',
                                'Point Of Sale' => 'Point Of Sale',
                                'Learning Management System' => 'Learning Management System',
                                'School Management System' => 'School Management System'
                            ])
                            ->searchable()
                            ->suffixIcon('heroicon-m-tag')
                            ->noSearchResultsMessage('No category found.'),
                        TextInput::make('client')
                            ->required(),
                        Forms\Components\DatePicker::make('date')
                            ->required(),
                        TextInput::make('url')
                            ->label('Project URL')
                            ->required()
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt'),
                        Forms\Components\Select::make('stacks')
                            ->required()
                            ->multiple()
                            ->options([
                                'Backend' => [
                                    'Filament' => 'Filament',
                                    'Laravel' => 'Laravel',
                                    'Codeigniter' => 'Codeigniter',
                                    'Node JS' => 'Node JS',
                                    'MySQL' => 'MySQL',
                                ],
                                'Frontend' => [
                                    'Vue JS' => 'Vue JS',
                                    'React JS' => 'React JS',
                                ]
                            ])
                            ->searchable()
                            ->suffixIcon('heroicon-m-server-stack')
                            ->noSearchResultsMessage('No stack found.')
                            ->columnSpanFull(),
                    ])->columns(2),
                Forms\Components\Section::make('Cover Information')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Upload Image')
                            ->required()
                            ->disk('public_folder')
                            ->directory('portfolios')
                            ->columnSpanFull()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public_folder')
                    ->circular(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('stacks')
                    ->badge()
                    ->searchable(),
                TextColumn::make('category')
                    ->badge()
                    ->searchable(),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M, Y - h:i:s A')
                    ->timezone('Asia/Karachi')
                    ->badge()
                    ->sortable()
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
                Tables\Actions\EditAction::make()
                    ->successNotification(function ($record) {
                        return Notification::make()
                            ->warning()
                            ->title('Portfolio Successfully Updated')
                            ->body("The {$record->title} portfolios has been successfully updated.");
                    })
                    ->slideOver(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(function ($record) {
                        return Notification::make()
                            ->danger()
                            ->title('Portfolio Successfully Deleted')
                            ->body("The {$record->title} portfolios has been successfully deleted.");
                    })
            ]);
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
                Section::make('Technical Information')
                    ->schema([
                        TextEntry::make('category')
                            ->badge(),
                        TextEntry::make('date')
                            ->label('Delivered Date')
                            ->dateTime('d M, Y - h:i:s A')
                            ->timezone('Asia/Karachi')
                            ->badge(),
                        TextEntry::make('client'),
                        TextEntry::make('url')
                            ->label('Project URL'),
                        TextEntry::make('stacks')
                            ->badge(),
                    ])->columns(2),
                Section::make('Media Information')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Uploaded Image')
                            ->disk('public_folder')
                            ->extraImgAttributes([
                                'alt' => 'Logo',
                                'loading' => 'lazy',
                            ]),
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/')
        ];
    }
}
