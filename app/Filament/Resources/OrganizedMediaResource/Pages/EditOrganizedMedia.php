<?php

namespace App\Filament\Resources\OrganizedMediaResource\Pages;

use App\Filament\Resources\OrganizedMediaResource;
use Awcodes\Curator\Resources\MediaResource\EditMedia;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizedMedia extends EditMedia
{
    protected static string $resource = OrganizedMediaResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }
}
