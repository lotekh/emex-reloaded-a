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

        $cities = json_decode(file_get_contents($jsonFile), true);

        foreach($cities as $city) {
            $existingCity = City::where('name', $city['name'])->first();

            if(!$existingCity) {
                $newCity = array();
                $newCity['county_id'] = $city['countyId'];
                $newCity['name'] = $city['name'];

                City::create($newCity);
            }
        }
    }
}
