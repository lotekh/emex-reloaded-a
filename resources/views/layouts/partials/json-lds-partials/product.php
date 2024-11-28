<?php


// dd($product);
if (!$product) {
    return false; 
}

$sub_title = $product->sub_title;
$lightBoxImageUrl = $product->largeImage->url ?? '';
$json_ld_description = strip_tags($product->description);
$sku = $product->sku;
$mpn = $product->variations->first()->mpn ?? '';
$gtin = $product->variations->first()->ean ?? '';
$first_price = $product->variations->first()->price ?? 0;
$ambalare = $product->variations->first()->packaging ?? '';
$measurementUnit = 'LTR'; // Example

$ratingCount = $product->reviews->count() ?: 1;
$avgRating = $product->reviews->avg('rating') ?: 5;

$product_json = [
    '@context' => 'http://schema.org/',
    '@type' => 'Product',
    'name' => $sub_title,
    'image' => $lightBoxImageUrl,
    'description' => $json_ld_description,
    'sku' => $sku,
    'mpn' => $mpn,
    'gtin' => $gtin,
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => $avgRating,
        'reviewCount' => $ratingCount,
    ],
    'offers' => [
        '@type' => 'Offer',
        'priceCurrency' => 'RON',
        'price' => $first_price,
        'availability' => 'https://schema.org/InStock',
    ],
];

return json_encode($product_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
