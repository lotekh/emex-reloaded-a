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
        $counties = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        foreach ($counties as $county) {
            County::firstOrCreate([
                'name' => $county['name'],
                'code' => $county['code']
            ]);
        }
    }
}
