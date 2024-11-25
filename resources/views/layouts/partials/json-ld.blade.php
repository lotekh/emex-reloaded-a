<?php
$big_json = [];

// JSON-LD Dynamic

// JSON-LD Static
$currentUrl = request()->path() ?: 'homepage';
// dd($currentUrl);
$jsonFile = resource_path('views/layouts/partials/json-lds/' . $currentUrl . '.json-ld');
// dd($jsonFile);
if (file_exists($jsonFile)) {
    $static_jsonld_content = trim(file_get_contents($jsonFile));
    if (!empty($static_jsonld_content)) {
        // $big_json[] = $static_jsonld_content;
        $big_json .= ','.$static_jsonld_content;
    }
}
// dd(($big_json[0]));
dd($big_json);
?>

<script type="application/ld+json">
    const bigJson = {!! htmlspecialchars($big_json[0]) !!};
</script>
