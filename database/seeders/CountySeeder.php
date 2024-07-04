<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = resource_path('json/county.json');

        $counties = json_decode(file_get_contents($jsonFile), true);

        foreach($counties as $county) {
            County::where('name', $county['name'])->firstOrCreate($county);
        }
    }
}
