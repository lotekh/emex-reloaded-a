<?php

namespace App\Filament\Resources\ProductVariationResource\Pages;

use App\Filament\Resources\ProductVariationResource;
use App\Imports\ProductVariationImport;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ListProductVariations extends ListRecords
{
    protected static string $resource = ProductVariationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),

            Action::make('Import preturi culori')
            ->form([
                FileUpload::make('file')
                    ->required()
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // XLSX
                        'application/vnd.ms-excel', // XLS
                        'text/csv' // CSV (optional)
                    ])
                    ->directory('preturi-culori') // Ensures file is stored in storage/app/uploads/
                    ->preserveFilenames()
                // ->storeFileNamesIn('file'),
            ])
            ->action(function (array $data) {
                $file = $data['file'];

                Excel::import(new ProductVariationImport, Storage::disk('local')->path($data['file']));
            }),
            Action::make('Update feeds')
            ->url(route('feeds.update'), true)
        ];
    }
}
