<?php

use yii\helpers\Url;
use common\models\Popups;
use common\models\Wishlist;

$user_agent = getenv("HTTP_USER_AGENT");
$os = "windows";
$base_url = Url::base();

if (strpos($user_agent, "Win") !== FALSE)
    $os = "windows";
elseif (strpos($user_agent, "Mac") !== FALSE)
    $os = "mac";
?>

<body id="main_body" class="<?php echo $os; ?>">
    <!-- Google Tag Manager -->
    <amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-NBFSWLV&gtm.url=SOURCE_URL" data-credentials="include"></amp-analytics>
    <amp-analytics type="googleanalytics" config="https://amp.analytics-debugger.com/ga4.json" data-credentials="include">
        <script type="application/json">
            {
                "vars": {
                    "GA4_MEASUREMENT_ID": "G-08T97HCME1",
                    "GA4_ENDPOINT_HOSTNAME": "www.google-analytics.com",
                    "DEFAULT_PAGEVIEW_ENABLED": true,
                    "GOOGLE_CONSENT_ENABLED": false,
                    "WEBVITALS_TRACKING": false,
                    "PERFORMANCE_TIMING_TRACKING": false
                },
                "triggers": {
                    "phonecalls": {
                        "on": "click",
                        "selector": "a[href^='tel:']",
                        "request": "ga4Event",
                        "vars": {
                            "ga4_event_name": "phonecall_click"
                        },
                        "extraUrlParams": {
                            "event__str_outgoing_click_type": "tel",
                            "event__str_outgoing_click_value": "+40724509552"
                        }
                    },
                    "addtocart": {
                        "on": "click",
                        "selector": "input[id^='ops_btn']",
                        "request": "ga4Event",
                        "vars": {
                            "ga4_event_name": "add_to_cart"
                        }
                    },
                    "purchase": {
                        "on": "click",
                        "selector": "button[id^='send_final_order']",
                        "request": "ga4Event",
                        "vars": {
                            "ga4_event_name": "purchase"
                        }
                    }
                }
            }
        </script>
    </amp-analytics>
    <!-- End Google Tag Manager -->

    <header class="w-full bg-white-gray">
        <!-- first layer -->
        <div class="main-container row justify-between align-center desktop-header gap-lg">
            <!-- empty div -->
            <div></div>
            <!-- contact data -->
            <div id="header_social_media" class="row align-center">
                <a href="mailto:vanzari@emex.ro" class="row align-center" title="mail">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.7 20" width="25.7" height="20">
                        <path d="M24.2 19.5H1.4c-.6 0-1-.5-1-1.2V1.7c0-.6.4-1.2 1-1.2h22.8c.5 0 1 .6 1 1.2v16.7c0 .6-.4 1.1-1 1.1z" fill="none" stroke="#203471" stroke-miterlimit="10" stroke-width="1.25"></path>
                        <path d="m2.8 2 10.1 7L23 2l-10.1 9.7L2.8 2zM1.3 18.1l6.5-8.3L9.1 11l-7.8 7.1zm15.3-7.2 7.9 7.2L18 9.7" fill="#203471"></path>
                    </svg>
                    <span>
                        <em>vanzari@emex.ro</em>
                    </span>
                </a>
                <a href="tel:+40724509552" class="row align-center" title="phone">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.45 23.8" width="20" height="20">
                        <path d="M19.24 12.05h-1.19c0-4-3.09-7.13-6.65-7.13V3.67c4.39.13 7.84 3.87 7.84 8.37ZM11.4 5.8v1.25c2.61 0 4.87 2.24 4.87 5.13h1.19c-.24-3.5-2.73-6.38-6.06-6.38ZM11.16.06C5.11.05 0 5.43 0 11.92S5.11 23.8 11.16 23.8c.36 0 .71-.38.71-.75s-.36-.75-.71-.75c-5.46 0-9.74-4.62-9.74-10.38s4.4-10.38 9.74-10.38 9.74 4.62 9.74 10.38c0 2.38-1.19 4.75-2.97 5.75-.59.38-1.31.5-2.02.5.48-.25.83-.63 1.07-1.13 0-.13.12-.13.12-.25.24-.63.24-1.25.36-1.88.12-.75-3.21-2.24-3.56-1.38-.12.38-.24 1.5-.48 1.75s-.71.13-.95-.13l-2.38-2.51-.12-.13-.12-.13c-.71-.75-1.78-1.75-2.38-2.51 0 0-.12-.5.12-.63.24-.25 1.31-.38 1.66-.5.95-.25-.48-3.87-1.31-3.75-.48.13-1.07.13-1.66.38 0 0-.12.13-.24.25-1.9 1.25-2.14 4.37-.24 6.75.71.88 1.43 1.75 2.26 2.62l.12.13.12.13c.83.88 1.78 2 3.33 3.12 3.21 2.24 5.7 1.63 7.13.75 2.49-1.5 3.68-4.62 3.68-7.13-.12-6.5-5.23-12.01-11.28-12.01v.06Z" fill="#253670"></path>
                    </svg>
                    <span>
                        <em>+40724-509.552</em>
                    </span>
                </a>
                <a href="tel:+40214571646" class="row align-center" title="phone">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.45 23.8" width="20" height="20">
                        <path d="M19.24 12.05h-1.19c0-4-3.09-7.13-6.65-7.13V3.67c4.39.13 7.84 3.87 7.84 8.37ZM11.4 5.8v1.25c2.61 0 4.87 2.24 4.87 5.13h1.19c-.24-3.5-2.73-6.38-6.06-6.38ZM11.16.06C5.11.05 0 5.43 0 11.92S5.11 23.8 11.16 23.8c.36 0 .71-.38.71-.75s-.36-.75-.71-.75c-5.46 0-9.74-4.62-9.74-10.38s4.4-10.38 9.74-10.38 9.74 4.62 9.74 10.38c0 2.38-1.19 4.75-2.97 5.75-.59.38-1.31.5-2.02.5.48-.25.83-.63 1.07-1.13 0-.13.12-.13.12-.25.24-.63.24-1.25.36-1.88.12-.75-3.21-2.24-3.56-1.38-.12.38-.24 1.5-.48 1.75s-.71.13-.95-.13l-2.38-2.51-.12-.13-.12-.13c-.71-.75-1.78-1.75-2.38-2.51 0 0-.12-.5.12-.63.24-.25 1.31-.38 1.66-.5.95-.25-.48-3.87-1.31-3.75-.48.13-1.07.13-1.66.38 0 0-.12.13-.24.25-1.9 1.25-2.14 4.37-.24 6.75.71.88 1.43 1.75 2.26 2.62l.12.13.12.13c.83.88 1.78 2 3.33 3.12 3.21 2.24 5.7 1.63 7.13.75 2.49-1.5 3.68-4.62 3.68-7.13-.12-6.5-5.23-12.01-11.28-12.01v.06Z" fill="#253670"></path>
                    </svg>
                    <span>
                        <em>+4021-457.1646</em>
                    </span>
                </a>
            </div>
            <!-- contul meu -->
            <div class="dropdown" id="header_login_actions_wrapper">
                <div class="dropdown-header row align-center justify-end ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.5 23.5" width="20" height="20">
                        <defs>
                            <clipPath id="a">
                                <circle fill="none" cx="11.75" cy="11.75" r="11.25"></circle>
                            </clipPath>
                        </defs>
                        <g clip-path="url(#a)">
                            <path d="M15.76 9.17c0 1.2-.4 2.24-1.28 3.12s-1.92 1.28-3.12 1.28c-1.2 0-2.24-.4-3.12-1.28-.88-.88-1.28-1.92-1.28-3.12s.4-2.24 1.28-3.12 1.92-1.28 3.12-1.28c1.2 0 2.24.4 3.12 1.28.8.88 1.28 1.92 1.28 3.12Zm4.41 11.21c0 .94-.35 1.71-.97 2.22-.62.51-1.5.85-2.56.85H6.86c-1.06 0-1.94-.26-2.56-.85-.71-.6-.97-1.28-.97-2.22v-1.03c0-.34.09-.77.18-1.11.09-.43.18-.77.35-1.11.09-.34.35-.68.53-1.03.26-.34.53-.68.79-.94.35-.26.71-.51 1.15-.6.44-.17.97-.26 1.5-.26.18 0 .44.09.79.26.26.17.53.34.79.51.26.17.62.26 1.06.43.35.09.79.17 1.15.17h.09c.44 0 .88-.09 1.32-.17s.79-.26 1.06-.43c.35-.17.62-.34.79-.51.35-.26.62-.26.79-.26.53 0 1.06.09 1.5.26s.79.34 1.15.6c.26.26.53.6.79.94.18.34.44.68.53 1.03s.26.77.35 1.11c.09.43.18.77.18 1.11v1.03Z" fill="#203471"></path>
                        </g>
                        <circle fill="none" cx="11.75" cy="11.75" r="11.25" stroke="#203471" stroke-miterlimit="10"></circle>
                    </svg>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <?php echo Yii::$app->user->identity->last_name . ' ' . Yii::$app->user->identity->first_name; ?>
                    <?php else : ?>
                        <span>
                            Contul meu
                        </span>
                    <?php endif; ?>
                    <amp-img src="<?= $base_url ?>/resources/new_design/icons/expand_more.svg" height="24" width="24" alt="See more" title="See more">
                    </amp-img>
                </div>
                <div class="col dropdown-menu">
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <a href="<?php echo Url::base() . '/contul-meu'; ?>" title="Setari cont">
                            Setari cont
                        </a>
                        <a href="<?php echo Url::base() . '/wishlist'; ?>" title="Favorite">
                            Favorite
                        </a>
                        <a href="<?php echo Url::base() . '/contul-meu?page='; ?>" title="Istoric">
                            Istoric
                        </a>
                        <a href="<?php echo Url::base() . '/contul-meu#facturare'; ?>" title="Facturare">
                            Facturare
                        </a>
                        <a href="<?php echo Url::base() . '/logout'; ?>" id="logoutButton" title="Iesire din cont">
                            Iesire din cont
                        </a>
                    <?php else : ?>
                        <button id="auth_lightbox_trigger" class="auth" on="tap:auth-lightbox" role="button" tabindex="0" aria-label="Autentificare">
                            Autentificare
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- second layer -->
        <div class="desktop-header bg-white">
            <div class="main-container row second-layer">
                <a id="logo" href="<?php echo empty($base_url) ? '/' : $base_url; ?>" title="acasa">
                    <amp-img src="<?= $base_url ?>/resources/new_design/general/logo.png" height="84" width="252" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim">
                    </amp-img>
                </a>
                <form class="relative flex align-center w-full justify-end" method="GET" target="_top" action="<?php echo Url::base() . '/search'; ?>">
                    <div class="flex align-center">
                        <amp-img width="18" height="18" src="<?= $base_url ?>/resources/new_design/icons/search.svg" id="search-icon" alt="search-icon" title="search-icon"></amp-img>
                    </div>
                    <input id="search-input-desktop" type="text" name="zoom_query" class="form-control w-full" placeholder="Cauta dupa nume produs sau cod SKU">
                </form>
                <div class="row align-center gap-md" id="favorites-cart">
                    <a href="<?php echo Url::base() . '/wishlist'; ?>" title="produse favorite">
                        <?php
                        if (Yii::$app->user->isGuest) {
                            $session_wishlist_products = Yii::$app->session->get('wish_list_products');
                            $wishlist_products_count = 0;
                            if (!empty($session_wishlist_products)) {
                                $wishlist_products_count = sizeof($session_wishlist_products);
                            }
                        } else {
                            $wishlist_products = Wishlist::find()->where(['user_id' => Yii::$app->user->id])->all();
                            $wishlist_products_count = count($wishlist_products);
                        }

                        ?>
                        <div class="flex align-center">
                            <svg width="20" height="19" viewBox="0 0 14 13" fill="#1071FF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.6668 5.15992L8.8735 4.74659L7.00016 0.333252L5.12683 4.75325L0.333496 5.15992L3.9735 8.31325L2.88016 12.9999L7.00016 10.5133L11.1202 12.9999L10.0335 8.31325L13.6668 5.15992ZM7.00016 9.26659L4.4935 10.7799L5.16016 7.92659L2.94683 6.00659L5.86683 5.75325L7.00016 3.06659L8.14016 5.75992L11.0602 6.01325L8.84683 7.93325L9.5135 10.7866L7.00016 9.26659Z" />
                            </svg>
                        </div>
                        <div class="circle flex justify-center align-center">
                            <?php echo $wishlist_products_count; ?>
                        </div>
                        <span class="label">Favorite</span>
                    </a>
                    <a href="<?php echo Url::base() . '/produse-adaugate'; ?>" title="cos">
                        <?php
                        $session_preorder_products = Yii::$app->session->get('cart_list_products');
                        $preorder_count = 0;
                        if (!empty($session_preorder_products)) {
                            $preorder_count = sizeof($session_preorder_products);
                        }
                        ?>
                        <div class="flex align-center">
                            <svg width="20" height="19" viewBox="0 0 15 14" fill="#1071FF" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3665 7.66659C10.8665 7.66659 11.3065 7.39325 11.5332 6.97992L13.9198 2.65325C14.1665 2.21325 13.8465 1.66659 13.3398 1.66659H3.47317L2.8465 0.333252H0.666504V1.66659H1.99984L4.39984 6.72659L3.49984 8.35325C3.01317 9.24659 3.65317 10.3333 4.6665 10.3333H12.6665V8.99992H4.6665L5.39984 7.66659H10.3665ZM4.1065 2.99992H12.2065L10.3665 6.33325H5.6865L4.1065 2.99992ZM4.6665 10.9999C3.93317 10.9999 3.33984 11.5999 3.33984 12.3333C3.33984 13.0666 3.93317 13.6666 4.6665 13.6666C5.39984 13.6666 5.99984 13.0666 5.99984 12.3333C5.99984 11.5999 5.39984 10.9999 4.6665 10.9999ZM11.3332 10.9999C10.5998 10.9999 10.0065 11.5999 10.0065 12.3333C10.0065 13.0666 10.5998 13.6666 11.3332 13.6666C12.0665 13.6666 12.6665 13.0666 12.6665 12.3333C12.6665 11.5999 12.0665 10.9999 11.3332 10.9999Z" />
                            </svg>
                        </div>
                        <div class="circle flex justify-center align-center">
                            <?php echo $preorder_count; ?>
                        </div>
                        <span class="label">Cos</span>
                    </a>
                </div>
            </div>
        </div>



        <!-- third layer -->
        <div class="main-container row justify-between align-center desktop-header">
            <div class="breadcrumbs-container">
                <?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'breadcrumbs.php'; ?>
            </div>
            <div id="navigation_wrapper">
                <div id="navigation">
                    <?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'desktop-menu.php'; ?>
                </div>
            </div>
        </div>

        <!-- mobile -->
        <?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mobile-menu.php';  ?>
        <div class="breadcrumbs-mobile-container">
            <?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'breadcrumbs.php'; ?>
        </div>
    </header>



    <?php
    // $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // $actual_link = explode('/', $actual_link);
    // $slug = $actual_link[count($actual_link) - 1];

    // if($slug) {
    //     $popups = Popups::find()->where(['page_slug' => $slug, 'is_active' => true])->all();
    //     if(count($popups)) {
    //         echo '<div class="popups">';
    //         foreach($popups as $popup) {
    //             echo \frontend\widgets\PopupWidget::widget([
    //                 'model' => $popup
    //             ]);
    //         }
    //         echo '</div>';
    //     }
    // } 
    ?>
    <?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'general-elements.php'; ?>


    <div id="content" [class]="menu_visibility ? 'lock_scroll' : ''"> <?php echo $content; ?> </div>
    <div class="phone-icon" id="scrollToTopButton">
        <a href="tel:+40724509552">
            <amp-img width="50" height="50" layout="fixed" src="<?php echo Url::base(true); ?>/resources/images/Phone-mobile.png" alt="Phone Emex"></amp-img>
        </a>
    </div>

    <div id="contact_email_small_devices" class="email-icon" on="tap:contact-lightbox" tabindex="0" role="button">
        <amp-img width="50" height="50" src="<?php echo Url::base(true); ?>/resources/images/Mail-mobile.png" alt="Email Emex"></amp-img>
    </div>

    <footer class="w-full">
        <div class="sixth_top"></div>
        <div id="fsr" class="main-container footer-container">
            <div class="logo-section">
                <a href="<?php echo empty($base_url) ? '/' : $base_url; ?>" aria-label="Logo Emex by Romtehnochim" title="Marca Emex proprietate a Romtehnochim">
                    <amp-img id="logo-footer" width="201" height="72" src="<?= $base_url ?>/resources/new_design/general/logo-footer.png" alt="Emex by Romtehnochim logo" title="Marca Emex proprietate a Romtehnochim">
                    </amp-img>
                </a>
                <ul id="fsrfcfu">
                    <li>
                        <p class="mt-16">Productie lacuri, vopsele, tencuieli, pardoseli.</p>
                    </li>
                    <li>
                        <p>Productie vopsele epoxidice, poliuretanice, poliesterice, clorcauciuc.</p>
                    </li>
                    <li>
                        <p>Aplicari profesionale de pardoseli epoxidice si poliuretanice.</p>
                    </li>
                </ul>
                <div class="col contact-info-container">
                    <div class="row align-center cursor-default">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>
                            Str. Steaua Sudului Nr. 22, Jilava, Ilfov, Romania
                        </span>
                    </div>
                    <div class="infos-row">
                        <div class="row align-center my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <a href="tel:+40214571693">+4021-457.1693</a>, <a href="tel:+40785-232.552">+40785-232.552</a>
                        </div>
                        <div class="row align-center my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4A4A4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <a href="mailto:office@emex.ro"><em>office@emex.ro</em></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-3">
                <!-- links -->
                <div class="col">
                    <p class="title">Linkuri utile</p>
                    <div class="link-section">
                        <div class="section">
                            <ul>
                                <li>
                                    <a href="<?= $base_url ?>/" rel="noopener noreferrer">Acasa</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/servicii" rel="noopener noreferrer">Servicii</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/blog" rel="noopener noreferrer">Blog</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/solicita-cotatie" rel="noopener noreferrer">Solicita Cotatie</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/angajari" rel="noopener noreferrer"><strong><em>- Angajari -</em></strong></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <p class="title">Cine suntem</p>
                    <div class="link-section">
                        <div class="section">
                            <ul>
                                <li>
                                    <a href="<?= $base_url ?>/despre-noi" rel="noopener noreferrer">Despre noi</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/politica-de-calitate" rel="noopener noreferrer">Politica de calitate</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/politica-de-mediu" rel="noopener noreferrer">Politica de mediu</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/politica-sanatate-securitate" rel="noopener noreferrer">Politica de securitate</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/certificari-iso" rel="noopener noreferrer">Certificari ISO</a>
                                </li>
                                <li>
                                    <a href="<?= $base_url ?>/catalog-emex.pdf" rel="noopener noreferrer">Catalog "EMEX"</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- stiri -->
                <div class="col">
                    <div class="footer_news_area">
                        <h3 class="title">Stiri recente</h3>
                        <?php
                        $blogArticles = \common\models\BlogArticle::find()->limit(3)->orderBy(['id' => SORT_DESC])->all();
                        ?>
                        <ul class="col">
                            <?php foreach ($blogArticles as $blogArticle) : ?>
                                <li>
                                    <div class="news_row mb-16">
                                        <h4 class="news-title"><a href="<?php echo \yii\helpers\Url::base() ?>/blog/article?id=<?= $blogArticle['id'] ?>"><?php echo $blogArticle->title; ?></a></h4>
                                        <p><?= date_format(date_create($blogArticle['created_at']), 'j.m.Y') ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


            </div>

            <div class="newsletter-section">
                <div class="title">Newsletter</div>
                <p>
                    Daca doriti sa aflati noutati despre noi sau produsele noastre puteti sa ne lasati adresa de mail. Atunci cand vom lansa un produs nou, sau vom desfasura un eveniment cu adevarat important, veti primi informatia.
                </p>
                <form id="newsletter_form" method="POST" class="w-full mt-16" action-xhr="<?php echo \yii\helpers\Url::base(true) . '/newsletter'; ?>" target="_top">
                    <input type="hidden" name="current_url" value="<?php echo Yii::$app->request->url; ?>">
                    <input type="hidden" name="_csrf-frontend" value="<?php echo Yii::$app->request->csrfToken ?>">
                    <input type="email" required class="w-full form-control" name="NewsletterEmails[email]" placeholder="Adauga email..." id="nfi">
                    <input type="submit" class="btn btn-blue w-full mt-8" id="nfs_btn" value="Aboneaza-te">
                    <div id="subscribe-msg"></div>
                </form>
            </div>
        </div>
        <?php
        $tags = [];
        $current_url = trim(Url::current(), '/');
        $current_url = explode('/', $current_url);
        $current_url = $current_url[sizeof($current_url) - 1];
        if (strpos($current_url, '?')) {
            $current_url = substr($current_url, 0, strpos($current_url, '?'));
        }
        if (($handle = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR . "tags.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $tags[$data[0]] = $data[1];
            }
            fclose($handle);
        }
        ?>
        <div class="main-container">
            <p id="tags_h4"><?php echo !empty($tags[$current_url]) ? $tags[$current_url] : ''; ?></p>
        </div>
        <amp-animation id="showAnim" layout="nodisplay">
            <script type="application/json">
                {
                    "duration": "200ms",
                    "fill": "both",
                    "iterations": "1",
                    "direction": "alternate",
                    "animations": [{
                            "selector": "#scrollToTopButton",
                            "keyframes": [{
                                "opacity": "1",
                                "visibility": "visible"
                            }]
                        },
                        {
                            "selector": "#contact_email_small_devices",
                            "keyframes": [{
                                "opacity": "1",
                                "visibility": "visible"
                            }]
                        }
                    ]
                }
            </script>
        </amp-animation>
        <amp-animation id="hideAnim" layout="nodisplay">
            <script type="application/json">
                {
                    "duration": "200ms",
                    "fill": "both",
                    "iterations": "1",
                    "direction": "alternate",
                    "animations": [{
                            "selector": "#contact_email_small_devices",
                            "keyframes": [{
                                "opacity": "0",
                                "visibility": "hidden"
                            }]
                        },
                        {
                            "selector": "#scrollToTopButton",
                            "keyframes": [{
                                "opacity": "0",
                                "visibility": "hidden"
                            }]
                        }
                    ]
                }
            </script>
        </amp-animation>

        <div class="bottom-section main-container" id="ftr">
            <amp-position-observer on="enter:hideAnim.start; exit:showAnim.start" layout="nodisplay"></amp-position-observer>
            <div id="fc" class="row align-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_312_8025)">
                        <path d="M10.08 10.86C10.13 10.53 10.24 10.24 10.38 9.99C10.52 9.74 10.72 9.53 10.97 9.37C11.21 9.22 11.51 9.15 11.88 9.14C12.11 9.15 12.32 9.19 12.51 9.27C12.71 9.36 12.89 9.48 13.03 9.63C13.17 9.78 13.28 9.96 13.37 10.16C13.46 10.36 13.5 10.58 13.51 10.8H15.3C15.28 10.33 15.19 9.9 15.02 9.51C14.85 9.12 14.62 8.78 14.32 8.5C14.02 8.22 13.66 8 13.24 7.84C12.82 7.68 12.36 7.61 11.85 7.61C11.2 7.61 10.63 7.72 10.15 7.95C9.67 8.18 9.27 8.48 8.95 8.87C8.63 9.26 8.39 9.71 8.24 10.23C8.09 10.75 8 11.29 8 11.87V12.14C8 12.72 8.08 13.26 8.23 13.78C8.38 14.3 8.62 14.75 8.94 15.13C9.26 15.51 9.66 15.82 10.14 16.04C10.62 16.26 11.19 16.38 11.84 16.38C12.31 16.38 12.75 16.3 13.16 16.15C13.57 16 13.93 15.79 14.24 15.52C14.55 15.25 14.8 14.94 14.98 14.58C15.16 14.22 15.27 13.84 15.28 13.43H13.49C13.48 13.64 13.43 13.83 13.34 14.01C13.25 14.19 13.13 14.34 12.98 14.47C12.83 14.6 12.66 14.7 12.46 14.77C12.27 14.84 12.07 14.86 11.86 14.87C11.5 14.86 11.2 14.79 10.97 14.64C10.72 14.48 10.52 14.27 10.38 14.02C10.24 13.77 10.13 13.47 10.08 13.14C10.03 12.81 10 12.47 10 12.14V11.87C10 11.52 10.03 11.19 10.08 10.86ZM12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20Z" fill="#434447" />
                    </g>
                    <defs>
                        <clipPath id="clip0_312_8025">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <p>
                    <?php echo date('Y'); ?>
                    Emex By Romtehnochim. Toate drepturile rezervate.
                </p>
            </div>
            <div id="footer_links">
                <ul class="footer-list">
                    <li>
                        <a href="/sitemap.htm">Sitemap</a>
                    </li>
                    <li>
                        <a class="desktop-terms" href="<?php echo Url::base(true) ?>/termeni-si-conditii">Termeni si conditii</a>
                    </li>
                    <li><a href="<?php echo Url::base(true) ?>/confidentialitate-gdpr">Protectie date</a></li>
                    <li><a href="<?php echo Url::base(true) ?>/politica-de-retur">Retur</a></li>
                    <li><a href="<?php echo Url::base(true) ?>/faq">Faq</a></li>
                    <li><a href="<?php echo Url::base(true) ?>/contact" class="b-0">Contact</a></li>
                </ul>
            </div>

            <div id="fsm" class="sprites">
                <span>
                    <a href="/blog" title="Blog Emex by Romtehnochim">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 179.51975 179.20429">
                            <path fill="#f06a35" d="M20.512413 178.49886c-3.359449-.8837-6.258272-2.1837-8.931866-4.0056-2.256922-1.5379-5.555601-4.7174-6.810077-6.5637-1.532132-2.255-3.293254-6.1168-4.010994-8.795-.732062-2.7319-.743927-3.8198-.757063-69.39501-.01306-65.24411.0018-66.67877.719335-69.48264C3.259268 10.34132 11.117019 2.7971 21.251347.54646 24.165189-.10065 154.331139-.21383 157.47424.42803c8.508999 1.73759 15.197718 6.84619 19.06824 14.56362 3.07712 6.13545 2.80203-.61622 2.94296 72.23085.0897 46.34991.007 65.80856-.28883 68.23286-1.38576 11.3442-9.210679 20.1431-20.470153 23.0183-2.880202.7354-3.882129.7459-69.275121.7259-63.227195-.019-66.474476-.052-68.938923-.7007z" />
                            <path fill="none" d="M-82.99522 87.83767V-84.06232h1020v343.79998h-1020V87.83767z" />
                            <path fill="#fff" d="M115.16168 144.83466c8.064748-1.1001 14.384531-4.3325 20.313328-10.3896 4.288999-4.38181 6.973811-9.12472 8.728379-15.41921.728903-2.6149.790018-3.88807.923587-19.24149.100809-11.58796.01669-17.01514-.285075-18.38528-.437344-1.98593-1.67711-3.83016-3.091687-4.59911-.435299-.23661-3.224334-.53819-6.197859-.67015-4.982681-.22115-5.540155-.31832-7.11287-1.24-2.494681-1.46198-3.181724-3.04069-3.188544-7.32677-.01304-8.1894-3.421087-15.79237-10.154891-22.65435-4.797263-4.8886-10.14889-8.19759-16.256563-10.05172-1.462167-.44388-4.736105-.59493-15.7023605-.72452-17.2069763-.20332-21.0264035.14939-26.8842785 2.48265-10.799733 4.30168-18.559563 13.36742-21.390152 24.98992-.531646 2.18295-.634845 5.6815-.760427 25.77865-.157327 25.17748.01622 28.87467 1.589422 33.86414 1.299798 4.12233 2.611223 6.64844 5.312916 10.23388 5.146805 6.83036 12.860236 11.76336 20.572006 13.15646 3.669923.6631 48.94793.829 53.585069.1965z" />
                            <path fill="#f06a35" d="M67.5750093 75.71747c-4.1229413-1.13646-5.6634683-7.05179-2.6332273-10.11109 1.9367555-1.95536 2.4721802-2.02981 14.5952492-2.02981 10.8833578 0 11.2491898.0238 12.8478758.83129 2.310253 1.16711 3.314106 2.81263 3.314106 5.43252 0 2.36619-.942769 4.0244-3.045645 5.35691-1.129143.71549-1.803912.76002-12.4672419.82265-6.5844803.0387-11.829856-.0872-12.6111168-.30247zm-.5165819 39.80858c-1.7697484-.77113-3.4178244-2.91327-3.7026534-4.81263-.271319-1.80929.637963-4.29669 2.031786-5.55809 1.7569755-1.59003 2.5280723-1.64307 24.134743-1.66008 22.226353-.0174 22.11068-.0268 24.218307 1.94113 2.976827 2.77944 2.348939 7.7279-1.238363 9.75964l-3.686323.59948-19.213121.22489c-16.8830622.19762-21.6656419-.1114-22.5443756-.49433z" />
                        </svg>
                    </a>
                </span>
                <span>
                    <a href="https://www.linkedin.com/company/romtehnochim" title="linkedin">
                        <em class="sprite-linkedin"></em>
                    </a>
                </span>
                <span>
                    <a href="https://www.youtube.com/c/EmexRomtehnochim" title="youtube">
                        <em class="sprite-youtube"></em>
                    </a>
                </span>
                <span>
                    <a href="https://ro.pinterest.com/romtehnochim/" title="pinterest">
                        <em class="sprite-pinterest"></em>
                    </a>
                </span>
                <span>
                    <a href="https://www.instagram.com/emexbyromtehnochim/" title="instagram">
                        <em class="sprite-instagram"></em>
                    </a>
                </span>
                <span>
                    <a href="https://twitter.com/Romtehnochim" title="twitter">
                        <em class="sprite-twitter"></em>
                    </a>
                </span>
                <span>
                    <a href="https://www.facebook.com/EmexByRomtehnochim/" title="facebook">
                        <em class="sprite-facebook"></em>
                    </a>
                </span>

            </div>
        </div>
    </footer>
    <?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'flash-messages.php'; ?>
    <?php include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'consent.php'; ?>
</body>


<amp-sidebar id="sidebar-left" class="sidebar" layout="nodisplay" side="left">
    <nav class="col">
        <a href="<?php echo empty($base_url) ? '/' : $base_url; ?>" class="mb-32" title="acasa">
            <amp-img src="<?= $base_url ?>/resources/new_design/general/logo-footer.png" height="72" width="201" alt="Emex - un brand de incredere" title="Emex - brand al companiei Romtehnochim">
            </amp-img>
        </a>
        <section>
            <header>
                <a href="<?php echo Url::base() ?>" title="Acasa">Acasa</a>
            </header>
        </section>
        <amp-accordion id="cine-suntem">
            <section>
                <header>Cine suntem</header>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo Url::base() ?>/despre-noi" title="Despre noi">Despre noi</a></li>
                    <li><a href="<?php echo Url::base() ?>/politica-de-calitate" title="Politica de Calitate">Politica de Calitate</a></li>
                    <li><a href="<?php echo Url::base() ?>/politica-de-mediu" title="Politica de mediu">Politica de Mediu</a></li>
                    <li><a href="<?php echo Url::base() ?>/politica-sanatate-securitate" title="Politica de securitate">Politica de Securitate</a>
                    </li>
                    <li><a href="<?php echo Url::base() ?>/certificari-iso" title="Certificari ISO">Certificari ISO</a></li>
                    <li><a href="https://emex.ro/catalog-emex.pdf" title="Catalog Emex">Catalog “Emex”</a></li>
                </ul>
            </section>
        </amp-accordion>
        <amp-accordion id="produse">
            <section>
                <header>Produse</header>
                <ul class="dropdown-menu">
                    <li id="apmim_mob"><a href="<?php echo Url::base() . '/produse'; ?>" title="toate produsele">Toate Produsele</a></li>
                    <?php
                    $categories = \common\models\Categories::find()->where([
                        'active' => 1
                    ])->all();
                    ?>
                    <?php foreach ($categories as $category) : ?>
                        <li>
                            <a href="<?php echo Url::base() . '/' . $category->slug; ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </amp-accordion>
        <amp-accordion id="aplicare">
            <section>
                <header>Aplicare</header>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo Url::base() ?>/aplicare-vopsele-lavabile" title="Vopsele Lavabile">Vopsele Lavabile</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-email" title="Emailuri Decorative">Emailuri Decorative</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-lacuri-alchidice" title="Lacuri Monocomponente">Lacuri Monocomponente</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-tencuiala-decorativa" title="Tencuieli Decorative">Tencuieli Decorative</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-vopsele-grunduri-bicomponente" title="Vopsele Bicomponente">Vopsele Bicomponente</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-vopsele-pardoseala" title="Vopsele Pardoseala">Vopsele Pardoseala</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-vopsea-marcaj-rutier" title="Vopsea  Marcaj Rutier">Vopsea Marcaj Rutier</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-pardoseli-autonivelante-bicomponente" title="Pardoseli Bicomponente">Pardoseli Bicomponente</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-membrana-hidroizolanta-poliuretanica" title="Membrana Poliuteranica">Membrana Poliuteranica</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-vopsele-hidrosolubile" title="Vopsele Hidrosolubile">Vopsele Hidrosolubile</a></li>
                </ul>
            </section>
        </amp-accordion>
        <amp-accordion id="consum">
            <section>
                <header>Consum</header>
                <ul class="dropdown-menu">
                    <?php
                    $categories = \common\models\Categories::find()->where([
                        'active' => 1
                    ])->all();
                    ?>
                    <?php foreach ($categories as $category) : ?>
                        <?php
                        $category_product = \common\models\CategoriesProducts::find()->where([
                            'category_id' => $category->id
                        ])->one();
                        if ($category_product) {
                            $slug = \common\models\Slugs::find()->where([
                                'entity_id' => $category_product->product_id,
                                'type' => 'consum'
                            ])->one();
                        }
                        ?>
                        <?php if ($slug) : ?>
                            <li>
                                <a href="<?php echo Url::base() . '/' . $slug->slug; ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </section>
        </amp-accordion>
        <amp-accordion id="servicii">
            <section>
                <header>Servicii</header>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo Url::base() ?>/aplicare-covor-epoxidic-stb" title="Pardoseli Cuartz">Pardoseli Cuartz Epoxi</a></li>
                    <li><a href="<?php echo Url::base() ?>/aplicare-pardoseala-epoxidica-autonivelanta" title="Autonivelanta Epoxi">Autonivelanta Epoxi</a></li>
                    <li><a href="<?php echo Url::base() ?>/vopsire-epoxidica-pardoseli" title="Vopsiri Epoxidice">Vopsiri Epoxidice</a></li>
                    <li><a href="<?php echo Url::base() ?>/servicii" title="Servicii Generale">Servicii Generale</a></li>
                </ul>
            </section>
        </amp-accordion>
        <amp-accordion id="culori">
            <section>
                <header>Culori</header>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo Url::base() ?>/cartela-culori-ral-vopsele" title="Cartela RAL">Cartela RAL - Emailuri</a></li>
                    <li><a href="<?php echo Url::base() ?>/cartela-culori-lavabile" title="Paletar Lavabile">Paletar Lavabile</a></li>
                </ul>
            </section>
        </amp-accordion>
        <section>
            <header>
                <a href="<?php echo Url::base() ?>/blog" title="blog">Blog</a>
            </header>
        </section>
        <section>
            <header>
                <a href="<?php echo Url::base() ?>/contact" title="contact">Contact</a>
            </header>
        </section>
        <div class="contul_meu">
            <?php if (!Yii::$app->user->isGuest) : ?>
                <a href="<?php echo Url::base() . '/contul-meu'; ?>" title="Setari cont">
                    Setari cont
                </a>
                <a href="<?php echo Url::base() . '/wishlist'; ?>" title="Favorite">
                    Favorite
                </a>
                <a href="<?php echo Url::base() . '/contul-meu?page='; ?>" title="Istoric">
                    Istoric
                </a>
                <a href="<?php echo Url::base() . '/contul-meu#facturare'; ?>" title="Facturare">
                    Facturare
                </a>
                <a href="<?php echo Url::base() . '/logout'; ?>" title="Iesire">
                    Iesire
                </a>
            <?php else : ?>
                <button id="auth_lightbox_trigger_mobile" class="btn btn-blue" on="tap:sidebar-left.close, auth-lightbox" role="button" aria-label="Autentificare">
                    Autentificare
                </button>
            <?php endif; ?>
        </div>
    </nav>
</amp-sidebar>
