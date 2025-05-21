<?php

if (!isset($product)) {
    return false; 
}

$slug = $product->slug;
$sub_title = $product->sub_title;
$lightBoxImageUrl = $product->largeImage->url ?? '';
$json_ld_description = $product->consumption_jsonld['description'];
$sku = $product->sku;
$mpn = $product->variations->first()->mpn ?? '';
$gtin = $product->variations->first()->ean ?? '';
$first_price = $product->variations->first()->price ?? 0;
$ambalare = $product->variations->first()->packaging ?? '';
$measurementUnit = 'LTR'; // Example
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
    'aggregateRating' => [
        '@type' => 'AggregateRating',
        'ratingValue' => $avgRating,
        'reviewCount' => $ratingCount,
    ],
    'offers' => [
        '@type' => 'Offer',
        'priceCurrency' => 'RON',
        'price' => number_format($first_price, 2, '.', ''),
        'priceValidUntil' => '2026-01-01',
        'availability' => 'https://schema.org/InStock',
        'hasMerchantReturnPolicy' => [
            "@context" => "https://schema.org",
            "@type" => "MerchantReturnPolicy",
            "applicableCountry" => "RO",
            "returnPolicyCountry" => "RO",
            "returnPolicyCategory" => "https://schema.org/MerchantReturnFiniteReturnWindow",
            "merchantReturnDays" => 14,
            "name" => "Politica de Returnare",
            "returnMethod" => "https://schema.org/ReturnByMail",
            "returnFees" => "https://schema.org/FreeReturn",
            "additionalProperty" => [
                "@type" => "PropertyValue",
                "name" => "Metode de returnare",
                "value" => "prin curier, prin posta sau prin returnarea banilor"
            ]
        ],
        "shippingDetails" => [
            "@type" => "OfferShippingDetails",
            "shippingRate" => [
                "@type" => "MonetaryAmount",
                "value" => 25,
                "currency" => "RON"
            ],
            "shippingDestination" => [
                "@type" => "DefinedRegion",
                "addressCountry" => "RO"
            ],
            "deliveryTime" => [
                "@type" => "ShippingDeliveryTime",
                "handlingTime" => [
                    "@type" => "QuantitativeValue",
                    "minValue" => 1,
                    "maxValue" => 3,
                    "unitCode" => "DAY"
                ],
                "transitTime" => [
                    "@type" => "QuantitativeValue",
                    "minValue" => 1,
                    "maxValue" => 3,
                    "unitCode" => "DAY"
                ]
            ]
        ]
    ],
];

return json_encode($consum_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
