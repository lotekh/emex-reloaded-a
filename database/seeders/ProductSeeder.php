<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
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

        $jsonFile = resource_path('json/productsImport2.json');
        $products = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        foreach ($products as $product) {
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

            $dbProduct->categories()->attach($product['category_id'], ['order' => $product['sort_priority']]);

            //TO DO image, technical file
            $largeImageUrl = self::constructImageUrl($product, 'large_image_path');
            $smallImageUrl = self::constructImageUrl($product, 'small_image_path');
            $technicalFileUrl = self::constructTechnicalFileUrl($product);

            self::uploadFile($largeImageUrl, $dbProduct, 'large_image_id', (array)json_decode($product['large_image_metadata']));
            self::uploadFile($smallImageUrl, $dbProduct, 'small_image_id', (array)json_decode($product['small_image_metadata']));
            self::uploadFile($product['seo_og_image'], $dbProduct, 'og_image_id');
            self::uploadFile($product['consum_seo_og_image'], $dbProduct, 'consumption_og_image_id');
            self::uploadFile($product['seo_twitter_image'], $dbProduct, 'twitter_image_id');
            self::uploadFile($product['consum_seo_twitter_image'], $dbProduct, 'consumption_twitter_image_id');
            self::uploadFile($technicalFileUrl, $dbProduct, 'technical_file_id', '.pdf');
        }
    }

    public static function generateSeo($category, $prefix = 'seo_')
    {
        $seo = [];
        $avilableSeoAttributes = ['title', 'og_url', 'og_type', 'og_title', 'fb_app_id', 'og_locale', 'twitter_url', 'og_image_alt', 'og_site_name', 'twitter_card', 'twitter_site', 'meta_keywords',  'twitter_title', 'og_description', 'og_image_width', 'og_image_height', 'meta_description', 'twitter_image_alt', 'twitter_description'];

        foreach ($avilableSeoAttributes as $attribute) {
            $seo[$attribute] = null;
        }

        foreach ($category as $attribute => $value) {
            if (str_contains($attribute, 'seo_')) {
                $newAttributeName = substr($attribute, 4);

                if (in_array($newAttributeName, $avilableSeoAttributes)) {
                    $seo[$newAttributeName] = $value;
                }
            }
        }
        return $seo;
    }

    public static function uploadFile($fileUrl, $dbProduct, $column, $metadata = ['alt' => null, 'title' => null])
    {
        $parts = explode('/', $fileUrl);
        $filename = end($parts);

        if ($fileUrl) {
            try {
                $header = get_headers($fileUrl);

                if (strpos($header[0], '404') === false) {
                    $imageContent = file_get_contents($fileUrl);
                    if ($imageContent) {
                        $maxId = Media::max('id');
                        $newId = $maxId + 1;
                        $image = '/media/' . $dbProduct->slug . '/' . $filename;
                        Storage::disk('public')->put($image, $imageContent);
                        $path = public_path('storage' . $image);

                        $data = getimagesize($path);
                        if ($data) {
                            $width = $data[0];
                            $height = $data[1];
                        } else {
                            $width = null;
                            $height = null;
                        }

                        $extension = explode('.', $filename)[1];
                        $filenameWithoutExtension = explode('.', $filename)[0];

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

                        Media::create([
                            'disk' => 'public',
                            'directory' => 'media/' . $newId,
                            'visibility' => 'public',
                            'name' => $filenameWithoutExtension,
                            'path' => 'media/' . $dbProduct->slug . '/' . $filename,
                            'height' => $height,
                            'width' => $width,
                            'type' => $type,
                            'ext' => $extension,
                            'alt' => $alt,
                            'title' => $title
                        ]);

                        $dbProduct->$column = $newId;
                        $dbProduct->save();
                    }
                }
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }

    public static function constructImageUrl($product, $param)
    {
        $site = 'https://vopsele.xyz/images/';

        return $site . $product[$param];
    }

    public static function constructTechnicalFileUrl($product)
    {
        $site = 'https://vopsele.xyz/';

        return $site . $product['fisa_tehnica'];
    }
}
