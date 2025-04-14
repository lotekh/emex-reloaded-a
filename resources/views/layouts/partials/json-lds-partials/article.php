<?php

if (!isset($model)) {
    return false; 
}

$created_at = $model->created_at->format('Y-m-d\TH:i:sP');
$updated_at = $model->updated_at->format('Y-m-d\TH:i:sP');
$seoKeywords = $model->seo_meta_keywords ?? '';
$body = strip_tags($model->body); // Eliminăm orice HTML din conținut
$description = $model->jsonld_description ?? $model->seo_meta_description;
$title = $model->title;
$image_url = $model->featuredImage->url ?? '';
$image_width = $model->featuredImage->width ?? '';
$image_height = $model->featuredImage->height ?? '';
$url = route('blog.article.show', ['slug' => $model->slug]);

$article_json = [
    '@context' => 'http://schema.org',
    '@type' => 'BlogPosting',
    'url' => $url,
    'headline' => $title,
    'alternativeHeadline' => $title,
    'dateCreated' => $created_at,
    'datePublished' => $created_at,
    'dateModified' => $updated_at,
    'description' => $description,
    'inLanguage' => 'ro-RO',
    'isFamilyFriendly' => 'true',
    'copyrightYear' => now()->year,
    'author' => [
        '@type' => 'Organization',
        'name' => 'Romtehnochim',
        'url' => 'https://emex.ro',
    ],
    'creator' => [
        '@type' => 'Organization',
        'name' => 'Romtehnochim',
        'url' => 'https://emex.ro',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Romtehnochim',
        'url' => 'https://emex.ro',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => 'https://emex.ro/images/general/Emex-logo.webp',
        ],
    ],
    'mainEntityOfPage' => 'True',
    'keywords' => $seoKeywords,
    'genre' => ['PRODUCT', 'JSON-LD'],
    'articleSection' => 'Blog',
    'articleBody' => $body,
    'image' => [
        'url' => $image_url,
        'width' => $image_width,
        'height' => $image_height,
    ],
];

return json_encode($article_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
