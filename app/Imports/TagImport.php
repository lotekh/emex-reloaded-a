<?php

namespace App\Imports;

use App\Models\Tag;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TagImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        Tag::firstOrCreate([
            'name' => $row['nume'],
        ]);
    }
}
