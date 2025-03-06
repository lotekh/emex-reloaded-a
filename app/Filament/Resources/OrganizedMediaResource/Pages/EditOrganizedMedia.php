<?php

namespace App\Filament\Resources\OrganizedMediaResource\Pages;

use App\Filament\Resources\OrganizedMediaResource;
use Awcodes\Curator\Resources\MediaResource\EditMedia;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizedMedia extends EditMedia
{
    protected static string $resource = OrganizedMediaResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->after(function ($record) {
                    // After the delete action, you can redirect to a custom URL.
                    return redirect()->route('filament.admin.resources.organized-media.index');
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data = array_merge($data, $data['file']);
        unset($data['file']);

        return $data;
    }
}
