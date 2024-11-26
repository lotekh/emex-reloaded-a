<?php //Product ?>
<?php $product_json = false; ?>
<?php if(!empty($json_data) && !empty($json_data['type']) && $json_data['type'] == 'product'): ?>
<?php $model = $json_data['data']; ?>

<?php
$slug = $model->slug;

// function getProductPrice($slug)
// {
//     $csv = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . DIRECTORY_SEPARATOR . 'controllers' .DIRECTORY_SEPARATOR. 'preturi_culori.csv';
//     $handler = fopen($csv, "r");
//     while (($data = fgetcsv($handler, 1000, ",")) !== FALSE) {
//         if (strtolower($data[0]) == $slug){
//             $price = $data[3];
//             break;
//         }
//     }
//
//     if (empty($price)){
//         return 99;
//     }
//
//     return $price;
// }

//get quantity min & max and first price
$csv = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . DIRECTORY_SEPARATOR . 'controllers' .DIRECTORY_SEPARATOR. 'preturi_culori.csv';
$handler = fopen($csv, "r");
$price = 0;
$min = 99999;
$max = 0;
$quantity = 0;
$first_price = 0;
$quantities = [];

while (($data = fgetcsv($handler, 1000, ",")) !== FALSE) {
 if (strtolower($data[0]) == $slug){
     if($first_price < 1){
         $first_price = (float)$data[5];
     }

     $quantity = (float)trim(explode(' ', $data[1])[0]);
     $quantities[] = $quantity;
 }
}
$minMax = [$quantities[0], $quantities[sizeof($quantities) - 1], $first_price];


//$minMax = [0, 0];
$min = $minMax[0];
$max = $minMax[1];
$first_price = $minMax[2];

$sku = $model->sku;
$sub_title = $model->sub_title;
$lightBoxImageUrl = $model->getLightboxImageUrl();
$json_ld_description = strip_tags($model->jsonld_description);
$mpn = $model->mpn;
$gtin = $model->gtin;
//$avgRating = $model->getRatingAverage();
//$ratingCount = $model->getRatingsCount();

$current_url = Yii::$app->request->url;
$ratingCount = \common\models\Review::find()->where([
    'url' => $current_url
])->count();
if (empty($ratingCount)){
    $ratingCount = 1;
}
$avgRating = \common\models\Review::find()->where([
    'url' => $current_url
])->average('rating');
if (empty($avgRating)){
    $avgRating = 5;
}

// $price = getProductPrice($model->slug);
//$price = 0;
//$price = number_format($price, 2);

$ambalare = $model->ambalare;
$measurementUnit = $model->measurementunit->microdata_name;
$plainName = $model->plain_name;
$seo_title = $model->seo_title;
$productUrl = \yii\helpers\Url::base(true) . '/' . $model->slug;
$seoMetaDescr = $model->seo_meta_description;
$seoKeywords = $model->seo_meta_keywords;

$similarProductsIds = $model->similar_products;
$similarProductsIds = explode(',', $similarProductsIds);
$similarProducts = \common\models\Products::find()->where(['in', 'id', $similarProductsIds])->all();
$similarProductsFormatted = [];
foreach ($similarProducts as $ind => $similarProduct){
    $similarProductUrl = 'https://emex.ro/' . $similarProduct->slug;
    $similarProductsFormatted[] = '{
      "@type": "ListItem",
      "position": "'.($ind + 1).'",
      "url": "'.$similarProductUrl.'",
      "name": "'.$similarProduct->sub_title.'",
      "image": "'.$similarProduct->getSimilarProductImageUrl().'",
      "description": "'.$similarProduct->jsonld_description.'"
    }';
}
$similarProductsText = implode(',', $similarProductsFormatted);

$url = 'https://emex.ro/'.$model->slug;
?>

<?php
$product_json = <<<js
    {
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "$sub_title",
  "image": "$lightBoxImageUrl",
  "description":"$json_ld_description",
  "brand": {
    "@type": "Brand",
    "name": "Emex"
  },
  "sku": "$sku",
  "mpn": "$mpn",
  "gtin": "$gtin",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "$avgRating",
    "bestRating": "5",
    "worstRating": "1",
    "reviewCount": "$ratingCount"
  },
  "review": {
    "@context": "http://schema.org/",
    "@type": "Review",
    "name": "Recomandare",
    "reviewBody": "Vopsea profesionala",
    "datePublished": "2020-03-01",
    "author": {"@type": "Person",
    "name":"Raducu Gh"}
  },
  "offers": {
    "@type": "Offer",
    "shippingDetails": "",
    "hasMerchantReturnPolicy": "",
	  "itemOffered": "$plainName",
    "priceCurrency": "RON",
    "price": "$first_price",
    "priceValidUntil": "2025-12-31",
    "availability": "https://schema.org/InStock",
    "itemCondition": "http://schema.org/NewCondition",
    "url":"$url",
    "eligibleQuantity":{
        "@type":"QuantitativeValue",    
        "name":"Ambalare: $ambalare",
        "minValue":"$min",
        "maxValue":"$max",
        "unitCode":"$measurementUnit"
        }
  }
},
{
  "@context": "http://schema.org",
  "@type": "Offer",
  "ItemCondition": "http://schema.org/NewCondition",
  "description": "Pretul este informativ, fara TVA, si difera in functie de ambalaj, culoare si nuanta.",
  "acceptedPaymentMethod": [
      {"@type": "PaymentMethod", "@id": "http://purl.org/goodrelations/v1#PaymentMethodCreditCard"},
      {"@type": "PaymentMethod", "@id": "http://purl.org/goodrelations/v1#VISA"},
      {"@type": "PaymentMethod", "@id": "http://purl.org/goodrelations/v1#MasterCard"},
      {"@type": "PaymentMethod", "@id": "http://purl.org/goodrelations/v1#Cash"},
      {"@type": "PaymentMethod", "@id": "http://purl.org/goodrelations/v1#CheckInAdvance"},
      {"@type": "PaymentMethod", "@id": "http://purl.org/goodrelations/v1#ByBankTransferInAdvance"},
      {"@type": "PaymentMethod", "@id": "http://purl.org/goodrelations/v1#ByInvoice"}
  ],
  "eligibleQuantity": {
    "@type": "QuantitativeValue",
    "name": "Ambalare: $ambalare",
    "minValue": "$min",
    "maxValue": "$max",
    "unitCode": "$measurementUnit"
  },
  "potentialAction": {
    "@type": "BuyAction",
    "description": "Plata online cu cardul din pagina securizata"
  }
},
{
  "@context": "http://schema.org",
  "@type": "PriceSpecification",
  "price": $first_price,
  "priceCurrency": "RON",
  "valueAddedTaxIncluded": "True"
},
{
    "@context": "http://schema.org",
    "@type": "WebPage",
    "inLanguage": "ro-RO",
    "isFamilyFriendly":"http://schema.org/True",
    "name":"$plainName",
    "alternateName":"$seo_title",
    "url":"$productUrl",
    "image": "$lightBoxImageUrl",
    "description":"$seoMetaDescr",
    "publisher": {
        "@type": "Organization",
        "name": "Emex by Romtehnochim",
        "logo": {
            "@type": "imageObject",
            "url": "https://emex.ro/images/general/Emex-logo.png"
        }
    }
},
{
  "@context": "http://schema.org",
  "@type": "ItemList",
  "url": "$url",
  "name": "$sub_title",
  "description": "$json_ld_description",
  "keywords": "$seoKeywords",
  "itemListElement": [$similarProductsText]
}
js;
?>

<?php endif; ?>