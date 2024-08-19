<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ContactsChart extends ChartWidget
{
    protected static ?string $heading = 'Contacts Chart';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(Contact::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Contact Graph',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
