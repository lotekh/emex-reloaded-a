<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = resource_path('imports/categories_import.json');
        $categories = json_decode(file_get_contents($jsonFile), true)['categories'];

        foreach($categories as $category) {
            $dbCategory = Category::where('name', $category['name'])->first();
            if(!$dbCategory) {
                $seo = self::generateSeo($category);

                $dbCategory = Category::create([
                    'name' => $category['name'],
                    'slug' => $category['slug'],
                    'description' => $category['description'],
                    'active' => $category['active'],
                    'seo' => $seo,
                    'jsonld' => $category['jsonld_description']
                ]);

                self::uploadImage($category['seo_og_image'], $dbCategory, 'og_image_id');
            }
        }
    }

    public static function generateSeo($category) {
        $seo = [];
        $avilableSeoAttributes = ['title', 'og_url', 'og_type', 'og_title', 'fb_app_id', 'og_locale', 'twitter_url', 'og_image_alt', 'og_site_name', 'twitter_card', 'twitter_site', 'meta_keywords',  'twitter_title', 'og_description', 'og_image_width', 'og_image_height', 'meta_description', 'twitter_image_alt', 'twitter_description'];

        foreach($avilableSeoAttributes as $attribute) {
            $seo[$attribute] = null;
        }

        foreach($category as $attribute => $value) {
            if(str_contains($attribute, 'seo_')) {
                $newAttributeName = substr($attribute, 4);

                if(in_array($newAttributeName, $avilableSeoAttributes)) {
                    $seo[$newAttributeName] = $value;
                }
            }
        }
        return json_encode($seo);
    }

    public static function uploadImage($seoOgImage, $dbCategory, $column) {
        if($seoOgImage) {
            $imageContent = file_get_contents($seoOgImage);
            if($imageContent) {
                $maxId = Media::max('id');
                $newId = $maxId + 1;
                $image = '/media/' . $newId . '/' . $dbCategory->id . '.jpg';
                $file = Storage::disk('public')->put($image, $imageContent);

                Media::create([
                    'disk' => 'public',
                    'directory' => 'media/' . $newId,
                    'visibility' => 'public',
                    'name' => $dbCategory->id,
                    'path' => 'media/' . $newId . '/' . $dbCategory->id . '.jpg',
                    'height' => 628,
                    'width' => 1200,
                    'type' => 'image/jpg',
                    'ext' => 'jpg',
                ]);

                $dbCategory->$column = $newId;
                $dbCategory->save();
            }
        }
    }
}
