<?php

namespace App\Filament\Resources\OrganizedMediaResource\Pages;

use App\Filament\Resources\OrganizedMediaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrganizedMedia extends CreateRecord
{
    protected static string $resource = OrganizedMediaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);
        $data['path'] = 'media/' . $data['type'] . '/' . $data['name'];
        $data = array_merge($data, $data['file']);
        unset($data['file']);

        return $data;
    }
}
