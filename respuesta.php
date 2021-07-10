<?php 
include_once('includes/header.php');
require __DIR__ .  '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181'); //Access Token
$data_response = $_REQUEST;

if ($data_response["id"] == "success") {
	$msg                = "Pago Aprobado";
	$preference_id      = $data_response["preference_id"];
	$external_reference = $data_response["external_reference"];
}elseif($data_response["id"] == "failure"){
	$msg = "El pago fue rechazado";
}elseif($data_response["id"] == "pending"){
	$msg = "El pago está siendo procesado ";
}//end if
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
            	<div class="jumbotron">
            		<h1><?php echo $msg; ?></h1>

            		<?php  echo isset($preference_id) ? "<h2>preference_id : ".$preference_id."</h2>" : "";?>
            		<?php  echo isset($external_reference) ? "<h2>external_reference : ".$external_reference."</h2>" : "";?>
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
	</div>
</body>
</html>