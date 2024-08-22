<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use App\Filament\Resources\ServiceResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListServices extends ListRecords
{
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('+ Add Service')
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('Service Successfully Created')
                        ->body('New services has been successfully created.')
                )
                ->slideOver(),
        ];
    }
}
