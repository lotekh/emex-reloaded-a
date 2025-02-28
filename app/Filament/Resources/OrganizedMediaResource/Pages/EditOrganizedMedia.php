<?php

namespace App\Filament\Resources\OrganizedMediaResource\Pages;

use App\Filament\Resources\OrganizedMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizedMedia extends EditRecord
{
    protected static string $resource = OrganizedMediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
