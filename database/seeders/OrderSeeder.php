<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\County;
use App\Models\Media;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file1 = resource_path('json/orders2.json');
        $orders = array_values((array)json_decode(file_get_contents($file1), true))[2]['data'];

        $importedOrders = array();
        foreach ($orders as $order) {
            if (!isset($importedOrders[$order['id']])) {
                $user = $order['email'] ? User::where('email', $order['email'])->first() : null;
                $userId = $user ? $user->id : null;

                $deliveryCounty = County::where('name', $order['delivery_county'])->first();
                $deliveryLocality = City::where('name', $order['delivery_locality'])->first();

                // Persoană fizică
                if ($order['billing_type'] == 0) {
                    $county = County::where('name', $order['person_county'])->first();
                    if (isset($order['person_city'])) {
                        $locality = City::where('name', $order['person_city'])->first();
                    } else {
                        $locality = null;
                    }
                    $companyInformationArray = [
                        'person_last_name' => $order['person_last_name'],
                        'person_first_name' => $order['person_first_name'],
                        'person_phone' => $order['person_phone'],
                        'person_email' => $order['person_email'],
                        'person_county_id' => $county ? $county->id : null,
                        'person_city_id' => $locality ? $locality->id : null,
                        'person_address' => $order['person_address'],
                    ];
                    // Persoană juridică
                } elseif ($order['billing_type'] == 1) {
                    $county = County::where('name', $order['organization_county'])->first();
                    $locality = City::where('name', $order['organization_locality'])->first();
                    $companyInformationArray = [
                        'organization_name' => $order['organization_name'],
                        'organization_cui' => $order['organization_cui'],
                        'organization_phone' => $order['organization_phone'],
                        'organization_email' => $order['organization_email'],
                        'organization_bank' => $order['organization_bank'],
                        'organization_bank_account' => $order['organization_bank_account'],
                        'organization_county_id' => $county ? $county->id : null,
                        'organization_city_id' => $locality ? $locality->id : null,
                        'organization_address' => $order['organization_address'],
                    ];
                }

                try {
                    $dbOrder = Order::create([
                        'user_id' => $userId,
                        'total' => $order['total'],
                        'created_at' => $order['created_at'],
                        'guid' => $order['guid'],
                        'identifier' => $order['identifier'],
                        'transport_price' => $order['transport_price'],
                        'transport_price_no_tva' => $order['transport_price_no_tva'],
                        'total_no_tva' => $order['total_no_tva'],
                        'discount_code_id' => $order['discount_code_id'],
                        'payment_method' => $order['payment_method'],
                        'delivery_type' => $order['delivery_type'],
                        'billing_type' => $order['billing_type'],
                        'delivery_information' => json_encode([
                            'delivery_type' => $order['delivery_type'],
                            'delivery_first_name' => $order['delivery_first_name'],
                            'delivery_last_name' => $order['delivery_last_name'],
                            'delivery_phone' => $order['delivery_phone'],
                            'delivery_county' => $deliveryCounty ? $deliveryCounty->id : null,
                            'delivery_locality' => $deliveryLocality ? $deliveryLocality->id : null,
                        ]),
                        'company_information' => json_encode($companyInformationArray),
                    ]);

                    $initialBillPath = explode('/', $order['initial_bill']);
                    $initialBillPath = public_path($initialBillPath[5] . '/' . $initialBillPath[6]);
                    self::uploadFile($initialBillPath, $dbOrder, 'proforma_id');
                } catch (\Throwable $e) {
                    print_r('Could not create order with id: ' . $order['id'] . '-' . $e->getMessage() . PHP_EOL);
                    continue;
                }


                $importedOrders[$order['id']] = $dbOrder->id;

                $this->importOrderProduct($order, $dbOrder);
            } else {
                $orderId = $importedOrders[$order['id']];
                $dbOrder = Order::find($orderId);

                $this->importOrderProduct($order, $dbOrder);
            }
        }
    }

    private static function importOrderProduct($order, $dbOrder)
    {
        $dbProduct = Product::where('slug', $order['slug'])->first();

        if ($dbProduct) {
            $packaging = explode(' ', $order['packaging']);
            $packaging = $packaging[0];
            $variation = $dbProduct->variations()->where('colour', $order['color'])->where('quantity', $packaging)->first();

            if ($variation) {
                $dbOrder->productVariations()->attach($variation->id, [
                    'product_variation_id' => $variation->id,
                    'quantity' => $order['quantity'],
                    'price' => $order['price'],
                    'price_no_vat' => $order['price_no_tva'],
                    'mentions' => substr($order['mentions'], 0, 190),
                ]);
            } else {
                print_r('Could not find variation of product ' . $dbProduct->slug . ' with colour: ' . $order['color'] . ' and packaging: ' . $packaging . PHP_EOL);
            }
        } else {
            print_r('Could not find product with slug: ' . $order['slug'] . PHP_EOL);
        }
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

                    $path = 'media/proforma-invoices';

                    $image =  '/' . $path . '/' . $filename;

                    Storage::disk('public')->put($image, $imageContent);
                    $filePath = public_path('storage' . $image);

                    $data = getimagesize($filePath);
                    $size = filesize($filePath);

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
                            $type = 'image/jpeg';
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
                        'title' => $title,
                        'size' => $size,
                    ]);

                    $dbProduct->$column = $media->id;
                    $dbProduct->save();
                }
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }
}
