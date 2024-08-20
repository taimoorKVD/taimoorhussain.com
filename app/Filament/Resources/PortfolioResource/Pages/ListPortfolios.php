<?php

namespace App\Filament\Resources\PortfolioResource\Pages;

use App\Filament\Resources\PortfolioResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListPortfolios extends ListRecords
{
    protected static string $resource = PortfolioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('+ Add Portfolio')
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('Portfolio Successfully Created')
                        ->body('The portfolio has been successfully created.')
                )
                ->slideOver(),
        ];
    }
}
