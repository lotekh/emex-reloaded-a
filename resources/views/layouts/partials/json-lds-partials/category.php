<?php

if (!isset($category) || !isset($products)) {
    return false;
}

$productsList = [];
foreach ($products as $index => $product) {
    $productsList[] = [
        '@type' => 'ListItem',
        'position' => $index + 1,
        'url' => url($product->slug),
        'name' => $product->sub_title,
        'image' => $product->largeImage->url ?? '',
        'description' => strip_tags($product->description),
    ];
}
$productsListJson = json_encode($productsList, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

$categoryName = $category->name;
$seoTitle = $category->seo_title ?? $category->name;
$url = url($category->slug);
$featuredImageUrl = $category->featured_image_url ?? '';
$description = $category->seo_meta_description ?? '';

$category_json =
    [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'itemListElement' => json_decode($productsListJson, true),
    ];
$webpage_json =
    [
        '@context' => 'http://schema.org',
        '@type' => 'WebPage',
        'inLanguage' => 'ro-RO',
        'isFamilyFriendly' => 'http://schema.org/True',
        'name' => $categoryName,
        'alternateName' => $seoTitle,
        'url' => $url,
        'image' => $featuredImageUrl,
        'description' => $description,
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Emex by Romtehnochim',
            'logo' => [
                '@type' => 'imageObject',
                'url' => 'https://emex.ro/images/general/Emex-logo.webp',
            ],
        ],
    ];


return [
    json_encode($category_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
    json_encode($webpage_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT),
];
