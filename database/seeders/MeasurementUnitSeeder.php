<?php

namespace Database\Seeders;

use App\Models\MeasurementUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MeasurementUnit::firstOrCreate([
            'name' => 'L',
        ]);

        MeasurementUnit::firstOrCreate([
            'name' => 'Kg',
        ]);
    }
}
