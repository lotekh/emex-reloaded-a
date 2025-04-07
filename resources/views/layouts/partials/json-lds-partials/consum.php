<?php

if (!isset($product)) {
    return false; 
}

$slug = $product->slug;
$sub_title = $product->sub_title;
$lightBoxImageUrl = $product->largeImage->url ?? '';
$json_ld_description = strip_tags($product->description);
$sku = $product->sku;
$mpn = $product->variations->first()->mpn ?? '';
$gtin = $product->variations->first()->ean ?? '';
$first_price = $product->variations->first()->price ?? 0;
$ambalare = $product->variations->first()->packaging ?? '';
$measurementUnit = 'LTR'; // Exemplu: poți ajusta dacă ai această informație
$categoryName = $category->name ?? '';


$ratingCount = $product->reviews->count() ?? 1;
$avgRating = $product->reviews->avg('rating') ?? 5;

$productUrl = url($product->slug);

$consum_json = [
    '@context' => 'http://schema.org/',
    '@type' => 'Product',
    'name' => $sub_title,
    'image' => $lightBoxImageUrl,
    'description' => $json_ld_description,
    'brand' => [
        '@type' => 'Brand',
        'name' => 'Emex',
    ],
    'sku' => $sku,
    'mpn' => $mpn,
    'gtin' => $gtin,
    'offers' => [
        '@type' => 'Offer',
        'priceCurrency' => 'RON',
        'price' => $first_price,
        'priceValidUntil' => '2025-12-31',
        'availability' => 'https://schema.org/InStock',
        'itemCondition' => 'http://schema.org/NewCondition',
        'url' => $productUrl,
        'eligibleQuantity' => [
            '@type' => 'QuantitativeValue',
            'name' => "Ambalare: $ambalare",
            'unitCode' => $measurementUnit,
        ],
    ],
];

return json_encode($consum_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
