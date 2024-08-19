<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
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

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $slug = 'website/pages/services';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 3;

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
                        Forms\Components\FileUpload::make('image')
                            ->label('Upload Image')
                            ->required()
                            ->directory('website/image/services')
                            ->columnSpanFull()
                    ]),
                Forms\Components\Section::make('Service Information')
                    ->schema([
                        Repeater::make('detail')
                            ->label('Service Details')
                            ->schema([
                                Forms\Components\RichEditor::make('value')
                                    ->required(),
                            ])
                            ->collapsible()
                            ->addActionLabel('+ Add more')
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
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('description')
                    ->wrap()
                    ->searchable(),
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
                            ->title('Service Successfully Updated')
                            ->body('The service page has been successfully updated.')
                    )
                    ->slideOver(),
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
                Section::make('Media Information')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Uploaded Image')
                            ->extraImgAttributes([
                                'alt' => 'Logo',
                                'loading' => 'lazy',
                            ]),
                    ]),
                Section::make('Service Information')
                    ->schema([
                        RepeatableEntry::make('detail')
                            ->label('Service Overview')
                            ->schema([
                                TextEntry::make('value'),
                            ])
                    ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
        ];
    }
}