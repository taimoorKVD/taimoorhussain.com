<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Models\Visitor;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $slug = 'website/visitors';

    public static function getEloquentQuery(): Builder
    {
        return Visitor::latest();
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

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('user_agent')
                    ->label('User Agent')
                    ->wrap(),
                Tables\Columns\TextColumn::make('referrer')
                    ->getStateUsing(fn($record) => $record->referrer ?? '-')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('location')
                    ->getStateUsing(fn($record) => $record->location ?? '-')
                    ->searchable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Visited At')
                    ->dateTime('d M, Y - h:i:s A')
                    ->timezone('Asia/Karachi')
                    ->badge()
                    ->alignCenter(),
            ])
            ->actions([
                Action::make('update_location')
                    ->label('Refresh Location')
                    ->icon('heroicon-o-arrow-path')
                    ->color('info')
                    ->action(static function (Visitor $visitor) {
                        self::updateLocation($visitor);
                    })->hidden(fn($record) => !empty($record->location)),
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('update_locations')
                        ->label('Refresh Locations')
                        ->icon('heroicon-o-arrow-path')
                        ->color('info')
                        ->action(static function () {
                            foreach (Visitor::whereNull('location')->get() as $visitor) {
                                self::updateLocation($visitor);
                            }
                        }),
                ])
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Basic Information')
                    ->schema([
                        TextEntry::make('ip_address')
                            ->label('IP Address'),
                        TextEntry::make('user_agent')
                            ->label('User Agent'),
                        TextEntry::make('referrer')
                            ->getStateUsing(fn($record) => $record->referrer ?? '-'),
                        TextEntry::make('location')
                            ->getStateUsing(fn($record) => $record->location ?? '-'),
                        TextEntry::make('created_at')
                            ->label('Visited At')
                            ->date()
                            ->badge(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/')
        ];
    }

    public static function updateLocation($visitor): void
    {
        $response = $visitor->updateLocation();
        if ($response['status']) {
            $title = "{$visitor->ip_address} location updated.";
            $body = "{$visitor->location} location has been updated.";
            $icon = 'heroicon-o-arrow-path';
            $color = 'success';
        }
        Notification::make()->title($title ?? "No location found.")->body($body ?? $response['message'])
            ->icon($icon ?? 'heroicon-o-exclamation-triangle')
            ->color($color ?? 'danger')->send();
    }
}
