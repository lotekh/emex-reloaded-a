<?php

namespace App\Filament\Resources;

use App\Models\Product;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class MediaResource extends \Awcodes\Curator\Resources\MediaResource
{
    public static function table(Table $table): Table
    {
        $table = parent::table($table);

        $table->filters([
            SelectFilter::make('ext')
                ->options([
                    'jpg' => 'JPG',
                    'png' => 'PNG',
                    'webp' => 'WEBP',
                    'pdf' => 'PDF',
                ])
                ->label('Extension'),

                // SelectFilter::make('created_at')
                // ->options(Product::all()->pluck('name', 'id')->toArray())
                // ->searchable()
                // ->query(function (Builder $query, array $data): Builder {
                //     return $query
                //         ->when(
                //             $data['creation_date'],
                //             fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                //         )
                //         ->when(
                //             $data['creation_date'],
                //             fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<', date('Y-m-d', strtotime($date . ' +1 day'))),
                //         );
                // })
        ], layout: FiltersLayout::AboveContent)->filtersFormColumns(4);
                

        return $table;
    }
}
