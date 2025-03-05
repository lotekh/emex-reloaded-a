<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFile = resource_path('json/reviews.json');
        $reviews = array_values((array)json_decode(file_get_contents($jsonFile), true))[2]['data'];

        foreach ($reviews as $review) {
            $product = Product::where('slug', substr($review['url'], 1))->first();
            if($product) {
                Review::create([
                    'user_id' => 2,
                    'product_id' => $product->id,
                    'rating' => $review['rating'],
                    'review' => $review['review'],
                    'approved' => $review['approved']
                ]);
            }
            else {
                print_r($review['url'] . ' not found as products so review was not created' . PHP_EOL);
            }
        }
    }
}
