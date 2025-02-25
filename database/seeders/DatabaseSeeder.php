<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SettingsSeeder::class,
            MeasurementUnitSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ProductVariationSeeder::class,
            ImagesSeeder::class,
            CategoryFiltersSeeder::class,
            BlogSeeder::class,
            PopupSeeder::class,
            ReviewSeeder::class,
            CountySeeder::class,
        ]);
    }
}
