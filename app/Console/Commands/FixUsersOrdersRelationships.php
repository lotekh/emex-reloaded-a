<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FixUsersOrdersRelationships extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-users-orders-relationships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ini_set('memory_limit', '1028M');

        $ordersJsons = [
            resource_path('json/orders1.json'),
            resource_path('json/orders2.json'),
            resource_path('json/orders4.json'),
        ];

        $processedOrdersIdentifiers = [];

        foreach ($ordersJsons as $ordersJson) {
            Log::info('Processing file: ' . $ordersJson);
            $orders = array_values((array)json_decode(file_get_contents($ordersJson), true))[2]['data'];

            foreach ($orders as $order) {
                if (!in_array($order['identifier'], $processedOrdersIdentifiers)) {
                    $dbOrder = Order::where('identifier', $order['identifier'])->first();

                    if ($dbOrder) {
                        $user = User::where('email', $order['email'])->first();

                        if ($user) {
                            $dbOrder->update([
                                'user_id' => $user->id,
                            ]);
                            $processedOrdersIdentifiers[] = $order['identifier'];

                            Log::info('Updated order ' . $order['identifier'] . ' with user ' . $user->id);
                        } else {
                            $dbOrder->update([
                                'user_id' => null,
                            ]);
                            $processedOrdersIdentifiers[] = $order['identifier'];

                            Log::info('Updated order ' . $order['identifier'] . ' with user null');
                        }
                    }
                }
            }
        }
    }
}
