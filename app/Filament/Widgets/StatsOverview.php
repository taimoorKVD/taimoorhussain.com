<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\ContactResource;
use App\Filament\Resources\PortfolioResource;
use App\Filament\Resources\VisitorResource;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Visitors', Visitor::count())
                ->description('All visitors from the database')
                ->icon('heroicon-m-users')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->url(VisitorResource::getUrl()),
            Stat::make('Contacts', Contact::count())
                ->description('All contacts from the database')
                ->descriptionIcon('heroicon-m-identification')
                ->color('success')
                ->icon('heroicon-m-identification')
                ->url(ContactResource::getUrl()),
            Stat::make('Portfolios', Portfolio::count())
                ->description('All portfolios from the database')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success')
                ->icon('heroicon-m-academic-cap')
                ->url(PortfolioResource::getUrl()),
        ];
    }
}
