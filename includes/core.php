<?php 
function base_url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
    else{
        $protocol = 'http';
    }
    return $_SERVER['HTTP_REFERER'];
}

function creaDocSeguimiento($response_body){
    file_put_contents('notificaciones/'.$data->id.".json", $response_body);
    /*$file = fopen("pagosLog.json", "a");
    fwrite($file, $response_body. PHP_EOL);
    fclose($file);*/
}
?>