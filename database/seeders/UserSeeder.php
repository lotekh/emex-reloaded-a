<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = resource_path('json/user.json');
        $users = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        foreach ($users as $user) {
            $newUser = array();
            if($user['role'] == '22') {
                $newUser['role'] = 'admin';
            }
            else {
                $newUser['role'] = 'user';
            }
            $newUser['password'] = $user['password_hash'];
            $newUser['first_name'] = $user['first_name'];
            $newUser['last_name'] = $user['last_name'];
            $newUser['email'] = $user['email'];
            $newUser['phone'] = $user['phone'];
            $newUser['billing_type'] = $user['billing_type'];
            $newUser['company_information'] = json_encode([
                'person_first_name' => $user['person_first_name'],
                'person_last_name' => $user['person_last_name'],
                'person_phone' => $user['person_phone'],
                'person_email' => $user['person_email'],
                'person_address' => $user['person_address'],
                'person_city_id' => $user['person_locality_id'],
                'person_county_id' => $user['person_county_id'],
                'organization_name' => $user['organization_name'],
                'organization_cui' => $user['organization_cui'],
                'organization_phone' => $user['organization_phone'],
                'organization_email' => $user['organization_email'],
                'organization_address' => $user['organization_address'],
                'organization_city_id' => $user['organization_locality_id'],
                'organization_county_id' => $user['organization_county_id'],
                'organization_bank' => $user['organization_bank'],
                'organization_bank_account' => $user['organization_bank_account'],
            ]);
            $newUser['delivery_information'] = json_encode([
                'delivery_first_name' => $user['delivery_first_name'],
                'delivery_last_name' => $user['delivery_last_name'],
                'delivery_phone' => $user['delivery_phone'],
                'delivery_email' => $user['delivery_email'],
                'delivery_address' => $user['delivery_address'],
                'delivery_city_id' => $user['delivery_locality_id'],
                'delivery_county_id' => $user['delivery_county_id'],
            ]);
            try {
                $createdUser = User::create($newUser);
            }
            catch(\Throwable $e) {
                print_r('Cannot import user with email address ' . $user['email'] . PHP_EOL);
            }
        }
    }
}
