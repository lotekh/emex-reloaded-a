<?php

namespace App\Filament\Resources\OrganizedMediaResource\Pages;

use App\Filament\Resources\OrganizedMediaResource;
use App\Models\Media;
use Awcodes\Curator\Resources\MediaResource\EditMedia;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

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
        //Save initial name and remove it from data
        $initialName = $data['name'];
        unset($data['name']);

        $mediaFiles = Media::where('name', $initialName)->get();

        dd($data);

        //Decide what kind of file the new one is
        if($data['file']['ext'] == 'pdf') {
            $folder = 'technical-files';
        }
        else {
            $folder = 'images';
        }

        //If the file is not linked to more objects, delete the old file and rename the new one
        if (count($mediaFiles) == 1) {
            $media = $mediaFiles->first();
            $path = $media->path;
            if (file_exists(Storage::disk('public')->path($path))) {
                unlink(Storage::disk('public')->path($path));
            }
            rename(Storage::disk('public')->path($data['file']['path']), Storage::disk('public')->path('media/' . $folder . '/' . $data['originalFilename']));
            $data['file']['path'] = 'media/' . $folder . '/' . $data['originalFilename'];
            $fileName = explode('.', $data['originalFilename']);
            $data['file']['name'] = $fileName[0];
        }

        $data = array_merge($data, $data['file']);
        unset($data['file']);

        return $data;
    }
}
