<?php
 //    session_start();

	// $url = "https://mobifinng.primeairtime.com/api/";

	// $USERNAME = "info@bemastech.com";
 //    $PASSWORD = "TechBemas@23373";
    // $msisdn = "2347061933309";
    $ch = curl_init($url."topup/info/$msisdn");
    // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$_SESSION['token']
        )
    );
    $response = curl_exec($ch);
    curl_close($ch);

    $resp = json_decode($response, true);
    $network = $resp['products'][0]['product_id'];
?>