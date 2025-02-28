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
            ->redirect(route('filament.resources.organized-media.index')),
        ];
    }
}
