<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Imports\TagImport;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ListTags extends ListRecords
{
    protected static string $resource = TagResource::class;

    public static function canAccess($parameters = []): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('Import tags')
            ->form([
                FileUpload::make('file')
                    ->required()
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // XLSX
                        'application/vnd.ms-excel', // XLS
                        'text/csv' // CSV (optional)
                    ])
                    ->directory('tags') // Ensures file is stored in storage/app/uploads/
                    ->preserveFilenames()
                // ->storeFileNamesIn('file'),
            ])
            ->action(function (array $data) {
                $file = $data['file'];

                Excel::import(new TagImport, Storage::disk('local')->path($data['file']));
            }),
            Actions\CreateAction::make(),
        ];
    }
}
