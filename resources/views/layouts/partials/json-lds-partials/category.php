<?php //Category ?>
<?php if(!empty($json_data) && !empty($json_data['type']) && $json_data['type'] == 'category'): ?>
<?php
$model = $json_data['data'];
$categories_products = \common\models\CategoriesProducts::find()->where([
    'category_id' => $model->id
])->all();
$products = [];
foreach ($categories_products as $categories_product){
    $product_model = \common\models\Products::findOne($categories_product->product_id);
    if(!empty($product_model)){
        $products[] = '{
          "@type": "ListItem",
          "position": "'.($categories_product->sort_priority + 1).'",
          "url": "'.\yii\helpers\Url::base() . '/' . $product_model->slug.'",
          "name": "'.$product_model->sub_title.'",
          "image": "'.$product_model->getCategoryImageUrl().'",
          "description": "'.$model->jsonld_description.'"
        }';
    }
}

$productsList = implode(',', $products);
$name = $model->name;
$seo_title = $model->seo_title;
$url = \yii\helpers\Url::base() . '/' . $model->slug;
$featured_image_url = $model->getFeaturedImageUrl();
$descr = $model->seo_meta_description;
?>
<?php
$category_json = <<<js
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [$productsList]
},
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "inLanguage": "ro-RO",
    "isFamilyFriendly":"http://schema.org/True",
    "name":"$name",
    "alternateName":"$seo_title",
    "url":"$url",
    "image": "$featured_image_url",
    "description":"$descr",
    "publisher": {
        "@type": "Organization",
        "name": "Emex by Romtehnochim",
        "logo": {
            "@type": "imageObject",
            "url": "https://emex.ro/images/general/Emex-logo.png"
        }
    }
}
js;
?>
<?php endif; ?>