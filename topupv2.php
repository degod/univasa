<?php
	session_start();
	$msisdn = "2347061933309"; //msisdn
	$amount = 50;
	if(isset($_GET["msisdn"])){
		$msisdn = $_GET["msisdn"]; //msisdn
		$amount = $_GET["amt"]; //amount
		$txid = $_GET["txid"]; //txid
	}
	include_once("auth.php");
	include_once("info.php");

    // CREATING JSON BODY
    $body = '{
		"product_id": "'.$network.'", 
		"denomination" : "'.$amount.'", 
		"send_sms" : false, 
		"sms_text" : "", 
		"customer_reference" : "'.$txid.'"
    }';
    $ch = curl_init($url."topup/exec/$msisdn");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
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

	if ($resp['status'] == "201"){
		echo $resp['status']." | Successful Mobifin Top-up | ".$resp['customer_reference']." | ".$resp['reference']." | ".$resp['code']." | "." | ".$resp['api_transactionid'];
	}else{
		echo $resp['status']." | Failed Mobifin Top-up | ".$resp['customer_reference']." | ".$resp['reference']." | ".$resp['code']." | "." | ".$resp['api_transactionid'];
	}

?>

