<?php //Aggregate Rating ?>
<?php
$current_url = Yii::$app->request->url;
$total_reviews = \common\models\Review::find()->where([
    'url' => $current_url
])->count();
if (empty($total_reviews)){
    $total_reviews = 1;
}
$rating = \common\models\Review::find()->where([
    'url' => $current_url
])->average('rating');
if (empty($rating)){
    $rating = 5;
}
?>

<?php if(!empty($json_data) && !empty($json_data['type']) && $json_data['type'] != 'product' && $json_data['type'] != 'consum'): ?>
    <?php
    $aggregate_rating_json = <<<js
{
  "@context": "http://schema.org",
  "@type": "AggregateRating",
  "bestRating": "5",
  "ratingCount": "$total_reviews",
  "ratingValue": "$rating",
  "itemReviewed": {
    "@type": "Organization",
    "name": "Emex"
  }
}
js;
    ?>
<?php else: ?>
    <?php $aggregate_rating_json = false; ?>
<?php endif; ?>
