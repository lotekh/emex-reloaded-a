<?php
$big_json = [];

// JSON-LD Dynamic
$website_json = include base_path('resources/views/layouts/partials/json-lds-partials/website.php');
$big_json[] = $website_json;

// $breadcrumbs_json_ld = include base_path('resources/views/layouts/partials/json-lds-partials/breadcrumbs-list.php');
// $big_json[] = $breadcrumbs_json_ld;

$corporation_json = include base_path('resources/views/layouts/partials/json-lds-partials/corporation.php');
$big_json[] = $corporation_json;

$organization_json = include base_path('resources/views/layouts/partials/json-lds-partials/organization.php');
$big_json[] = $organization_json;

$local_business_json = include base_path('resources/views/layouts/partials/json-lds-partials/local-business.php');
$big_json[] = $local_business_json;

// $aggregate_rating_json = include base_path('resources/views/layouts/partials/json-lds-partials/agregate-rating.php');
// if ($aggregate_rating_json != false) {
//     $big_json[] = $aggregate_rating_json;
// }

// Dynamic JSON-LD for Product
if (request()->get('is_product_page', false)) {
    $product_json = include base_path('resources/views/layouts/partials/json-lds-partials/product.php');
    if ($product_json) {
        $big_json[] = $product_json;
    }
}

// Dynamic JSON-LD for Consum Page
if (request()->get('is_consum_page', false)) {
    $consum_json = include base_path('resources/views/layouts/partials/json-lds-partials/consum.php');
    if ($consum_json) {
        $big_json[] = $consum_json;
    }
}

// Dynamic JSON-LD for Category Page
if (request()->get('is_category_page', false)) {
    $category_json = include base_path('resources/views/layouts/partials/json-lds-partials/category.php');
    if ($category_json) {
        $big_json[] = $category_json;
    }
}

// Dynamic JSON-LD for Blog Page
if (request()->routeIs('blog.article.show')) {
    $article_json = include base_path('resources/views/layouts/partials/json-lds-partials/article.php');
    if ($article_json) {
        $big_json[] = $article_json;
    }
}

// JSON-LD Static
$currentUrl = request()->path() ?: 'homepage';
$jsonFile = resource_path('views/layouts/partials/json-lds/' . $currentUrl . '.json-ld');
$big_json = implode(',', $big_json);

if (file_exists($jsonFile)) {
    $static_jsonld_content = trim(file_get_contents($jsonFile));
    if (!empty($static_jsonld_content)) {
        if (!empty($big_json)) {
            $big_json .= ','; 
        }
        $big_json .= $static_jsonld_content;
    }
}
$big_json = '[' . $big_json . ']';
?>

<script>
    let script = document.createElement('script');
    script.type = "application/ld+json";
    script.textContent = @json($big_json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    document.head.appendChild(script);
</script>
