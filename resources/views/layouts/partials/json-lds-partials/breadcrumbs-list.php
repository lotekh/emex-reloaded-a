<?php //breadcrumbs list ?>

<?php
$imploded_items = implode(',', $breadcrumbs_items);
$breadcrumbs_json_ld = <<<js
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [$imploded_items]
}
js;

