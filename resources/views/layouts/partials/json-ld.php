<?php
$big_json = [];

// JSON-LD Dynamic

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
var_dump($big_json); die();
?>


<script type="application/ld+json">
<?php
    echo "<pre><code>".$big_json."</pre></code>";
?>
</script>
