<?php

namespace App\Filament\Resources\CareerContactResource\Pages;

use App\Filament\Resources\CareerContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerContacts extends ListRecords
{
    protected static string $resource = CareerContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
