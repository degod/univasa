<?php

    function sendgridMail($toname, $subject, $email, $from, $message, $fromname){
        $mail = preg_replace('/\s+/', '', $message);
        
        $url = "https://api.sendgrid.com/api/mail.send.json?to=".$email."&amp;toname=".$toname."&amp;subject=".urlencode($subject)."&amp;html=".urlencode($message)."&amp;from=".$from."&amp;fromname=".$fromname.";api_user=prodeliveryng&amp;api_key=Sendgrid5th";
        
        // EXECUTING CURL COMMAND
        $json_AllAmt = $url;
        $chAmt = curl_init($json_AllAmt);
        $optionsAmt = array(
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HTTPHEADER      => array("Accept: application/json")
        );
        curl_setopt($chAmt, $optionsAmt, null);
        $response = curl_exec($chAmt);

        return $response;
    }

?>