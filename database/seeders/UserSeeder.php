<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@emex.ro',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::firstOrCreate([
            'first_name' => 'Adrian',
            'last_name' => 'Petre',
            'email' => 'adrian.petre@emex.ro',
            'password' => bcrypt('adrian56'),
            'role' => 'admin',
        ]);
    }
}
