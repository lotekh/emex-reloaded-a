<?php

namespace App\Filament\Resources\OrganizedMediaResource\Pages;

use App\Filament\Resources\OrganizedMediaResource;
use Awcodes\Curator\Resources\MediaResource\CreateMedia;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganizedMedia extends CreateMedia
{
    protected static string $resource = OrganizedMediaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data = array_merge($data, $data['file']);
        unset($data['file']);

        return $data;
    }
}
