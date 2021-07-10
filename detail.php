<?php 
include_once('includes/header.php');
include_once('includes/core.php');
require __DIR__ .  '/vendor/autoload.php';
?>

<!-- SDK MercadoPago.js V2 -->
<script type="text/javascript" src="https://www.mercadopago.com/v2/security.js" view="detail.php"></script>

<?php
//Inicializa SDK
MercadoPago\SDK::initialize();
MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181'); //Access Token
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004"); // Integrator ID
MercadoPago\SDK::config();

// Crea la preferencia de pago
$preference = new MercadoPago\Preference();

//Datos Pagador
$payer          = new MercadoPago\Payer();
$payer->name    = "Lalo";
$payer->surname = "Landa";
$payer->email   = "test_user_81131286@testuser.com";
$payer->phone = [
    "area_code" => "11",
    "number" => "22223333"
];
$payer->address = [
    "street_name"   => "Falsa",
    "street_number" => 123,
    "zip_code"      => "1111"
];
$preference->payer = $payer;

//Datos de envío
$shipments = new MercadoPago\Shipments();
$shipments->receiver_address = [
    "zip_code"      => "1111",
    "street_number" => 123,
    "street_name"   => "Falsa"
];

$preference->shipments = $shipments;

//Datos Producto
$item              = new MercadoPago\Item();
$item->id          = "1234";
$item->title       = $_POST["title"];
$item->description =  "Dispositivo móvil de Tienda e-commerce";
$item->quantity    = (int) $_POST["unit"];
$item->unit_price  = (float) $_POST["price"];
$item->picture_url = base_url().$_POST["img"];
$item->currency_id = "MXN";
$preference->items = [$item];

//Url de retorno
$preference->back_urls = [
    "success" => base_url()."respuesta.php?id=success",
    "failure" => base_url()."respuesta.php?id=failure",
    "pending" => base_url()."respuesta.php?id=pending"
];
$preference->auto_return = "approved";

//Deshabilitación de medios de pago y máximo de cuotas
$preference->payment_methods = [
    "excluded_payment_methods" => [
        [
            "id" => "amex"
        ]
    ],
    "excluded_payment_types" => [
        [
            "id" => "atm"
        ]
    ],
    "installments" => 6
];

//Número de orden de pedido
$preference->external_reference = "arturohrdez@gmail.com";

//Webhook
$preference->notification_url   = base_url()."webhooks/webhook.php";

//Genera la preferencia
$preference->save();
?>
<body class="as-theme-light-heroimage">
    <div class="stack">
        <div class="as-search-wrapper" role="main">
            <div class="as-navtuck-wrapper">
                <div class="as-l-fullwidth  as-navtuck" data-events="event52">
                    <div>
                        <div class="pd-billboard pd-category-header">
                            <div class="pd-l-plate-scale">
                                <div class="pd-billboard-background">
                                    <img src="./assets/music-audio-alp-201709" alt="" width="1440" height="320" data-scale-params-2="wid=2880&amp;hei=640&amp;fmt=jpeg&amp;qlt=95&amp;op_usm=0.5,0.5&amp;.v=1503948581306" class="pd-billboard-hero ir">
                                </div>
                                <div class="pd-billboard-info">
                                    <h1 class="pd-billboard-header pd-util-compact-small-18">Tienda e-commerce</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="as-search-results as-filter-open as-category-landing as-desktop" id="as-search-results">
                <div id="accessories-tab" class="as-accessories-details">
                    <div class="as-accessories" id="as-accessories">
                        <div class="as-accessories-header">
                            <div class="as-search-results-count">
                                <span class="as-search-results-value"></span>
                            </div>
                        </div>
                        <div class="as-searchnav-placeholder" style="height: 77px;">
                            <div class="row as-search-navbar" id="as-search-navbar" style="width: auto;">
                                <div class="as-accessories-filter-tile column large-6 small-3">
                                    <button class="as-filter-button" aria-expanded="true" aria-controls="as-search-filters" type="button">
                                        <h2 class=" as-filter-button-text">
                                            Smartphones
                                        </h2>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="as-accessories-results  as-search-desktop">
                            <div class="width:60%">
                                <div class="as-producttile-tilehero with-paddlenav " style="float:left;">
                                    <div class="as-dummy-container as-dummy-img">
                                        <img src="./assets/wireless-headphones" class="ir ir item-image as-producttile-image  " style="max-width: 70%;max-height: 70%;"alt="" width="445" height="445">
                                    </div>
                                    <div class="images mini-gallery gal5 ">
                                        <div class="as-isdesktop with-paddlenav with-paddlenav-onhover">
                                            <div class="clearfix image-list xs-no-js as-util-relatedlink relatedlink" data-relatedlink="6|Powerbeats3 Wireless Earphones - Neighborhood Collection - Brick Red|MPXP2">
                                                <div class="as-tilegallery-element as-image-selected">
                                                    <div class=""></div>
                                                    <img src="./assets/003.jpg" class="ir ir item-image as-producttile-image" alt="" width="445" height="445" style="content:-webkit-image-set(url(<?php echo $_POST['img'] ?>) 2x);">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="as-producttile-info" style="float:left;min-height: 168px;">
                                    <div class="as-producttile-titlepricewraper" style="min-height: 128px;">
                                        <div class="as-producttile-title">
                                            <h3 class="as-producttile-name">
                                                <p class="as-producttile-tilelink">
                                                    <span data-ase-truncate="2"><?php echo $_POST['title'] ?></span>
                                                </p>
                                            </h3>
                                        </div>
                                        <h3 >
                                            <?php echo $_POST['unit'] ?>
                                        </h3>
                                        <h3 >
                                            <?php echo "$" . number_format($_POST['price'],2,'.',','); ?>
                                        </h3>
                                    </div>
                                    <?php 
                                    echo "<a href='$preference->init_point'><button type='button' class='mercadopago-button' formmethod='post'>Pagar la compra</button></a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="alert" class="as-loader-text ally" aria-live="assertive"></div>
        <div class="as-footnotes">
            <div class="as-footnotes-content">
                <div class="as-footnotes-sosumi">
                    Todos los derechos reservados Tienda Tecno 2019
                </div>
            </div>
        </div>
</div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div class="mp-mercadopago-checkout-wrapper" style="z-index:-2147483647;display:block;background:rgba(0, 0, 0, 0.7);border:0;overflow:hidden;visibility:hidden;margin:0;padding:0;position:fixed;left:0;top:0;width:0;opacity:0;height:0;transition:opacity 220ms ease-in;"> <svg class="mp-spinner" viewBox="25 25 50 50"> <circle class="mp-spinner-path" cx="50" cy="50" r="20" fill="none" stroke-miterlimit="10"></circle> </svg> </div><div id="ac-gn-viewport-emitter"> </div></body></html>