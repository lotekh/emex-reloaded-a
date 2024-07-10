<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\County;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryAndCountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = resource_path('json/countryAndCounty.json');

        $countries = json_decode(file_get_contents($jsonFile), true);

        foreach($countries as $country) {
            if($country['region'] == 'Europe' && $country['states'] != null && count($country['states']) >= 1) {
                $dbCountry = Country::firstOrCreate([
                    'name' => $country['name']
                ]);

                foreach($country['states'] as $state) {
                    County::firstOrCreate([
                        'country_id' => $dbCountry->id,
                        'code' => $state['state_code'],
                        'name' => $state['name']
                    ]);
                }
            }
        }
    }
}
