<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Products', Product::count())
                ->icon('heroicon-o-archive-box'),
            Stat::make('Total Users', User::count())
                ->icon('heroicon-o-users'),
            Stat::make('Total Categories', Category::count())
                ->icon('heroicon-o-folder'),
            Stat::make('Total Media Files', Media::count())
                ->icon('heroicon-o-photo'),
        ];
    }
}
