<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static ?string $slug = 'website/pages/portfolios';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Pages';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver(),
                Tables\Actions\EditAction::make()
                    ->slideOver(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPortfolios::route('/')
        ];
    }
}
