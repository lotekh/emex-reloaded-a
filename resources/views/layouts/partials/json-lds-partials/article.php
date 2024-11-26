<?php $article_json = false; ?>

<?php if (!empty($json_data) && !empty($json_data['type']) && $json_data['type'] == 'blog'): ?>
<?php
    $model = $json_data['data'];
    $created_at = $model->created_at;
    $updated_at = $model->updated_at;
    $seoKeywords = $model->seo_meta_keywords;
    $body = $model->body;
    $description = $model->jsonld_description;
    $title = $model->title;
    $image_url = $model->json_ld_image_url;
    $image_width = $model->json_ld_image_width;
    $image_height = $model->json_ld_image_height;
    $url = 'https://emex.ro/blog/article?id=' . $model->id;
?>
<?php
$article_json = <<<js
{
    "@context":"http://schema.org",
    "@type": "BlogPosting",
    "url": "$url",
    "headline": "$title",
    "alternativeHeadline": "$title",
    "dateCreated": "$created_at",
    "datePublished": "$created_at",
    "dateModified": "$updated_at",
    "description": "$description",
    "inLanguage": "ro-RO",
    "isFamilyFriendly": "true",
    "copyrightYear": "2023",
    "copyrightHolder": "",
    "author": {
        "@type": "Organization",
        "name": "Romtehnochim",
        "url": "https://emex.ro"
    },
    "creator": {
        "@type": "Organization",
        "name": "Romtehnochim",
        "url": "https://emex.ro"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Romtehnochim",
        "url": "https://emex.ro",
        "logo": {
            "@type": "ImageObject",
            "url": "https://emex.ro/images/general/Emex-logo.png"
        }
    },
    "mainEntityOfPage": "True",
    "keywords": "$seoKeywords",
    "genre":["PRODUCT","JSON-LD"],
    "articleSection": "Blog",
    "articleBody": "$body",
    "image": {
        "url": "$image_url",
        "width": "$image_width",
        "height": "$image_height"
    }
}
js;
?>
<?php endif;?>