<?php 
function lemparData ($fields,$action){
    $url = 'https://vtsapi.easygo-gps.co.id/api/do/new';
    $data = $fields;

    $ch = curl_init;

    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));

    $hasil = curl_exec($ch);
    curl_close($ch);    
}

?>