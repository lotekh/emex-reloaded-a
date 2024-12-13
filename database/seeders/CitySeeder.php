<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = resource_path('json/city.json');
        $cities = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        foreach ($cities as $city) {
            City::firstOrCreate([
                'name' => $city['name'],
                'county_id' => $city['countyId']
            ]);
        }
    }
}
