<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoryProduct::truncate();
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $jsonFile = resource_path('json/categoriesImport.json');
        $categories = json_decode(file_get_contents($jsonFile), true)['categories'];

        foreach($categories as $category) {
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
            self::uploadImage($category['seo_twitter_image'], $dbCategory, 'twitter_image_id');
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
        return $seo;
    }

    public static function uploadImage($fileUrl, $dbProduct, $column, $metadata = ['alt' => null, 'title' => null])
    {
        $parts = explode('/', $fileUrl);
        $filename = end($parts);

        if ($fileUrl) {
            try {
                $header = get_headers($fileUrl);

                if (strpos($header[0], '404') === false) {
                    $imageContent = file_get_contents($fileUrl);
                    if ($imageContent) {
                        $extension = explode('.', $filename)[1];
                        $filenameWithoutExtension = explode('.', $filename)[0];

                        if($extension == 'pdf') {
                            $path = 'media/technical-files/' . $dbProduct->slug;
                        }
                        else {
                            $path = 'media/images/' . $dbProduct->slug;
                        }
                        $image =  '/' . $path . '/' . $filename;

                        Storage::disk('public')->put($image, $imageContent);
                        $filePath = public_path('storage' . $image);

                        $data = getimagesize($filePath);
                        if ($data) {
                            $width = $data[0];
                            $height = $data[1];
                        } else {
                            $width = null;
                            $height = null;
                        }

                        switch($extension) {
                            case 'webp':
                                $type = 'image/webp';
                                break;
                            case 'jpg':
                                $type = 'image/jpg';
                                break;
                            case 'pdf':
                                $type = 'application/pdf';
                                break;
                            case 'png':
                                $type = 'image/png';
                                break; 
                            default: 
                                $type = '???';
                        }

                        $alt = isset($metadata['alt']) ? $metadata['alt'] : null;
                        $title = isset($metadata['title']) ? $metadata['title'] : null;

                        $media = Media::create([
                            'disk' => 'public',
                            'directory' => $path,
                            'visibility' => 'public',
                            'name' => $filenameWithoutExtension,
                            'path' => $path . '/' . $filename, 
                            'height' => $height,
                            'width' => $width,
                            'type' => $type,
                            'ext' => $extension,
                            'alt' => $alt,
                            'title' => $title
                        ]);

                        $dbProduct->$column = $media->id;
                        $dbProduct->save();
                    }
                }
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }
}
