<?php

function kirimWA($nomor, $pesan) {

    $token = "tU3XKNdiPZHptkA9khjq";
    $ip    = "103.52.212.50";
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.fonnte.com/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'target' => $nomor,
            'message' => $pesan,
        ),
        CURLOPT_HTTPHEADER => array(
            "Authorization: $token"
        ),
        CURLOPT_RESOLVE => array(
            "api.fonnte.com:443:$ip"
        ),
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ));

    $response = curl_exec($curl);

    if(curl_errno($curl)){
        $error = curl_error($curl);
        curl_close($curl);
        die("CURL ERROR: " . $error);
    }

    curl_close($curl);

    return $response;
}
