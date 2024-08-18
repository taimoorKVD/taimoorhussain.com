<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitorResource\Pages;
use App\Models\Visitor;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class VisitorResource extends Resource
{
    protected static ?string $model = Visitor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $slug = 'website/visitors';

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
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Visited At')
                    ->date()
                    ->badge()
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
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
}
