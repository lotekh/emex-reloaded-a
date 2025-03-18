<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file1 = resource_path('json/orders1.json');
        $orders = array_values((array)json_decode(file_get_contents($file1), true))[2]['data'];

        // $file2 = resource_path('json/orders2.json');
        // $file2Orders = array_values((array)json_decode(file_get_contents($file2), true))[2]['data'];

        // $file3 = resource_path('json/orders2.json');
        // $file3Orders = array_values((array)json_decode(file_get_contents($file3), true))[2]['data'];

        // $orders = array_merge($file1Orders, $file2Orders, $file3Orders);

        $importedOrders = array();
        foreach ($orders as $order) {
            // dd($order);

            if(!isset($importedOrders[$order['id']])) {
                $user = $order['email'] ? User::where('email', $order['email'])->first() : null;
                $userId = $user ? $user->id : null;
            
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
                    ]);
                }
                catch(\Throwable $e) {
                    print_r('Could not create order with id: ' . $order['id'] . '-' . $userId . PHP_EOL);
                    continue;
                }

                
                $importedOrders[$order['id']] = $dbOrder->id;

                $this->importOrderProduct($order, $dbOrder);
            }
            else {
                $orderId = $importedOrders[$order['id']];
                $dbOrder = Order::find($orderId);

                $this->importOrderProduct($order, $dbOrder);
            }
        }
    }

    private static function importOrderProduct($order, $dbOrder) {
        $dbProduct = Product::where('slug', $order['slug'])->first();

        if($dbProduct) {
            $packaging = explode(' ', $order['packaging']);
            $packaging = $packaging[0];
            $variation = $dbProduct->variations()->where('colour', $order['color'])->where('quantity', $packaging)->first();
    
            if($variation) {
                $dbOrder->productVariations()->attach($variation->id, [
                    'product_variation_id' => $variation->id,
                    'quantity' => $order['quantity'],
                    'price' => $order['price'],
                    'price_no_vat' => $order['price_no_tva'],
                    'mentions' => substr($order['mentions'], 0, 190),
                ]);
            }
            else {
                print_r('Could not find variation of product ' . $dbProduct->slug . ' with colour: ' . $order['color'] . ' and packaging: ' . $packaging . PHP_EOL);
            }
        }
        else {
            print_r('Could not find product with slug: ' . $order['slug'] . PHP_EOL);
        }
    }
}
