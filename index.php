<?php
    session_start();
	$url = "https://mobifinng.primeairtime.com/api/";

	$USERNAME = "info@bemastech.com";
    $PASSWORD = "TechBemas@23373";
	// $user    = "univas";
	// $pass    = "8f56ktvswuz";

    // CREATING JSON BODY
    $body = '{
        "username" : "'.$USERNAME.'",
        "password" : "'.$PASSWORD.'"
    }';
    $ch = curl_init($url."auth");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);
    echo "<pre>";
    print_r(json_decode($response, true));
    echo "</pre>";

    $resp = json_decode($response, true);
    $_SESSION['token'] = $resp['token'];

?>