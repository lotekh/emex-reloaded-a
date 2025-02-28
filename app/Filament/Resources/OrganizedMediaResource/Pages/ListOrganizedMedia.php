<?php

namespace App\Filament\Resources\OrganizedMediaResource\Pages;

use App\Filament\Resources\OrganizedMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrganizedMedia extends ListRecords
{
    protected static string $resource = OrganizedMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
