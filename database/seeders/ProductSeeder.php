<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Product::truncate();
        Schema::enableForeignKeyConstraints();

        $jsonFile = resource_path('json/productsImport.json');
        $products = array_values((array)json_decode(file_get_contents($jsonFile), true))[0];

        foreach($products as $product) {
            $seo = self::generateSeo($product);
            $consumptionSeo = self::generateSeo($product, 'consumption_seo_');
            $availableSince = $product['disponibil_din_data'] ? date('Y-m-d', strtotime($product['disponibil_din_data'])) : null;

            $dbProduct = Product::create([
                'name' => $product['name'],
                'plain_name' => $product['plain_name'],
                'sub_title' => $product['sub_title'],
                'slug' => $product['slug'],
                'category_page_description' => $product['category_description'],
                'description' => $product['descriere'],
                'usage_details' => $product['detalii_utilizare'],
                'technical_details' => $product['caracteristici_tehnice'],
                'active' => $product['active'],
                'seo' => $seo,
                'jsonld' => $product['jsonld_description'],
                'consumption_slug' => $product['consum_link'],
                'application_slug' => $product['tip_aplicare'],
                'has_palette' => $product['has_paleta'],
                'has_instructions' => $product['has_instructiuni'],
                'has_calculus' => $product['has_calcul'],
                'has_technical_file' => $product['has_fisa'],
                'has_hardener' => $product['has_intaritor'],
                'h2_contact_title' => $product['h2_contact_title'],
                'h3_contact_title' => $product['h3_contact_title'],
                'category_page_link_title' => $product['category_page_link_title'],
                'category_page_title' => $product['category_title'],
                'price_disclaimer' => $product['price_disclaimer'],
                'consumption_seo' => $consumptionSeo,
                'consumption_jsonld' => $product['consum_jsonld_description'],
                'available_since' => $availableSince,
                'is_package' => $product['is_package'],
            ]);

            $dbProduct->categories()->attach($product['category_id'],['order' => $product['sort_priority']]);

            //TO DO image, technical file
            $mainImageUrl = self::constructMainImageUrl($product);
            $technicalFileUrl = self::constructTechnicalFileUrl($product);

            self::uploadFile($mainImageUrl, $dbProduct, 'featured_image_id');
            self::uploadFile($product['seo_og_image'], $dbProduct, 'og_image_id');
            self::uploadFile($product['consum_seo_og_image'], $dbProduct, 'consumption_og_image_id');
            self::uploadFile($product['seo_twitter_image'], $dbProduct, 'twitter_image_id');
            self::uploadFile($product['consum_seo_twitter_image'], $dbProduct, 'consumption_twitter_image_id');
            self::uploadFile($technicalFileUrl, $dbProduct, 'technical_file_id', '.pdf');
        }
    }

    public static function generateSeo($category, $prefix = 'seo_') {
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

    public static function uploadFile($seoOgImage, $dbProduct, $column, $extension = 'jpg') {
        if($seoOgImage) {
            try {
                $imageContent = file_get_contents($seoOgImage);
                if($imageContent) {
                    $maxId = Media::max('id');
                    $newId = $maxId + 1;
                    $image = '/media/' . $newId . '/' . $dbProduct->id . $extension;
                    Storage::disk('public')->put($image, $imageContent);
    
                    Media::create([
                        'disk' => 'public',
                        'directory' => 'media/' . $newId,
                        'visibility' => 'public',
                        'name' => $dbProduct->id,
                        'path' => 'media/' . $newId . '/' . $dbProduct->id . $extension,
                        'height' => 628,
                        'width' => 1200,
                        'type' => 'image/jpg',
                        'ext' => 'jpg',
                    ]);
    
                    $dbProduct->$column = $newId;
                    $dbProduct->save();
                }
            }
            catch(\Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public static function constructMainImageUrl($product) {
        $site = 'https://vopsele.xyz/images/';
        
        return $site . $product['image_path'] . '/' . $product['image_file_name'];
    }

    public static function constructTechnicalFileUrl($product) {
        $site = 'https://vopsele.xyz/';

        return $site . $product['fisa_tehnica'];
    }
}
