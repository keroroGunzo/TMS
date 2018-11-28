<?php

  function doData( $url, $fields ){
    $curl = curl_init();
    $fields = array(
      
    );


    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://vtsapi.easygo-gps.co.id/api".$url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $fields,
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "token: token"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    echo (!$err) ? $response : "error #:$err";
  }

?>
