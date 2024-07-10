<?php

namespace App\Filament\Resources\CareerContactResource\Pages;

use App\Filament\Resources\CareerContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareerContact extends EditRecord
{
    protected static string $resource = CareerContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
