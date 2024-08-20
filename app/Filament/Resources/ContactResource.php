<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $slug = 'website/pages/contact';

    protected static ?string $pluralLabel = 'Contact';

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 4;

    public static function getEloquentQuery(): Builder
    {
        return Contact::latest();
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

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                        Forms\Components\TextInput::make('email')
                            ->required()
                            ->email(),
                        Forms\Components\Textarea::make('subject')
                            ->required(),
                        Forms\Components\RichEditor::make('message')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('subject')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Contacted At')
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
                            ->title('Contact Successfully Updated')
                            ->body('The contact has been successfully updated.')
                    )
                    ->slideOver(),
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->danger()
                            ->title('Contact Successfully Deleted')
                            ->body('The contact has been successfully deleted.')
                    )
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
        ];
    }
}
