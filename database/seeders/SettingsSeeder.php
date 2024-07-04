<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'name' => 'seo_og_site_name',
                'value' => ''
            ],
            [
                'name' => 'seo_fb_app_id',
                'value' => ''
            ],
            [
                'name' => 'seo_twitter_card',
                'value' => ''
            ],
            [
                'name' => 'seo_twitter_site',
                'value' => ''
            ],
            [
                'name' => 'seo_og_type',
                'value' => ''
            ],
            [
                'name' => 'seo_og_locale',
                'value' => ''
            ],
        ];

        foreach($settings as $setting) {
            Setting::where('name', $setting['name'])->firstOrCreate($setting);
        }
    }
}
