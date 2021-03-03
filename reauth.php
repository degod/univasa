<?php
    session_start();

	$url = "https://mobifinng.primeairtime.com/api/";

	$USERNAME = "info@bemastech.com";
    $PASSWORD = "TechBemas@23373";
    $ch = curl_init($url."reauth");
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
    echo "<pre>";
    // echo $response;
    print_r(json_decode($response, true));
    // echo "<bR>From SESSION: ".$_SESSION['token'];
    echo "</pre>";
?>