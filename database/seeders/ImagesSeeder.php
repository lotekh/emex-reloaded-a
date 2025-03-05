<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Import small PNGs
        $csvFile = resource_path('images/png-import.csv');
        $fileHandle = fopen($csvFile, 'r');
        $rowKey = 0;
        while ($csvRow = fgetcsv($fileHandle, null, ',')) {
            if ($rowKey) {
                if (strpos($csvRow[4], 'category') !== false && $csvRow[8]) {
                    $dbProduct = Product::where('slug', $csvRow[8])->first();

                    if ($dbProduct) {
                        $metadata = json_decode($csvRow[3], true);
                        self::uploadFile(resource_path('images/png/small/' . $csvRow[2]), $dbProduct, 'png_small_image_id', $metadata);
                    } else {
                        echo 'Product not found: ' . $csvRow[8] . PHP_EOL;
                    }
                }
            }
            $rowKey++;
        }
        fclose($fileHandle);

        // Import large PNGs
        $csvFile = resource_path('images/png-import.csv');
        $fileHandle = fopen($csvFile, 'r');
        $rowKey = 0;
        while ($csvRow = fgetcsv($fileHandle, null, ',')) {
            if ($rowKey) {
                if (strpos($csvRow[4], 'produs') !== false && $csvRow[8]) {
                    $dbProduct = Product::where('slug', $csvRow[8])->first();

                    if ($dbProduct) {
                        $metadata = json_decode($csvRow[3], true);
                        self::uploadFile(resource_path('images/png/large/' . $csvRow[2]), $dbProduct, 'png_large_image_id', $metadata);
                    } else {
                        echo 'Product not found: ' . $csvRow[8] . PHP_EOL;
                    }
                }
            }
            $rowKey++;
        }
        fclose($fileHandle);

        // Import small WEBPs
        $csvFile = resource_path('images/webp-import.csv');
        $fileHandle = fopen($csvFile, 'r');
        $rowKey = 0;
        while ($csvRow = fgetcsv($fileHandle, null, ',')) {
            if ($rowKey) {
                if (strpos($csvRow[4], 'category') !== false && $csvRow[8]) {
                    $dbProduct = Product::where('slug', $csvRow[8])->first();

                    if ($dbProduct) {
                        $metadata = json_decode($csvRow[3], true);
                        self::uploadFile(resource_path('images/webp/small/' . $csvRow[2]), $dbProduct, 'small_image_id', $metadata);
                    } else {
                        echo 'Product not found: ' . $csvRow[8] . PHP_EOL;
                    }
                }
            }
            $rowKey++;
        }
        fclose($fileHandle);

        // Import large WEBPs
        $csvFile = resource_path('images/webp-import.csv');
        $fileHandle = fopen($csvFile, 'r');
        $rowKey = 0;
        while ($csvRow = fgetcsv($fileHandle, null, ',')) {
            if ($rowKey) {
                if (strpos($csvRow[4], 'produs') !== false && $csvRow[8]) {
                    $dbProduct = Product::where('slug', $csvRow[8])->first();

                    if ($dbProduct) {
                        $metadata = json_decode($csvRow[3], true);
                        self::uploadFile(resource_path('images/webp/large/' . $csvRow[2]), $dbProduct, 'large_image_id', $metadata);
                    } else {
                        echo 'Product not found: ' . $csvRow[8] . PHP_EOL;
                    }
                }
            }
            $rowKey++;
        }
        fclose($fileHandle);
    }

    public static function uploadFile($fileUrl, $dbProduct, $column, $metadata = ['alt' => null, 'title' => null])
    {
        $parts = explode('/', $fileUrl);
        $filename = end($parts);

        if ($fileUrl) {
            try {
                $imageContent = file_get_contents($fileUrl);
                if ($imageContent) {
                    $extension = explode('.', $filename)[1];
                    $filenameWithoutExtension = explode('.', $filename)[0];

                    if ($extension == 'pdf') {
                        $path = 'media/technical-files';
                    } else {
                        $path = 'media/images';
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

                    switch ($extension) {
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
            } catch (\Exception $e) {
                Log::error($fileUrl);
                echo $fileUrl . PHP_EOL;
            }
        }
    }
}
