<?php 
include_once('../includes/core.php');
require_once('../vendor/autoload.php');

MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181'); //Access Token

$response_body = file_get_contents('php://input',true);
$response_json = json_decode($response_body,true);

//Gaurda la respuesta json
creaDocSeguimiento($response_json["id"],$response_body);
http_response_code(200);

switch($response_json["type"]) {
    case "payment":
        $payment = MercadoPago\Payment::find_by_id($response_json["id"]);
        http_response_code(201);
        break;
    case "plan":
        $plan = MercadoPago\Plan::find_by_id($response_json["id"]);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription::find_by_id($response_json["id"]);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice::find_by_id($response_json["id"]);
        break;
}

?>