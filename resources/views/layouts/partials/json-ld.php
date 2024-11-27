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

// JSON-LD Static
$currentUrl = request()->path() ?: 'homepage';
// dd($currentUrl);
$jsonFile = resource_path('views/layouts/partials/json-lds/' . $currentUrl . '.json-ld');
// dd($jsonFile);
$big_json = implode(',', $big_json);
if (file_exists($jsonFile)) {
    $static_jsonld_content = trim(file_get_contents($jsonFile));
    if (!empty($static_jsonld_content)) {
        $big_json .= $static_jsonld_content;
    }
}
$big_json = '[' . $big_json . ']';
// dd(($big_json[0]));
// var_dump($big_json); die();
?>


<script type="application/ld+json">
<?php
    echo "$big_json";
?>
</script>
