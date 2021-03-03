<?php
    //include("getParts.php");
    //    EDIT ACCORDINGLY TO ORIGINAL AND LIVE CREDENTIALS TO GET RESULT
    $server = "www.univasa.com";    // the domain
    $port     = "";        // Can be blank if the server has no port
    $email    = "sms2email@univasa.com";     // Ithe username e.g exampl@example.com
    $pass    = "sms2email";        // Your password for the above email

    $address= $server.":".$port;
    if($port == ""){
        $address = $server;
    } 
    $mbox = imap_open("{".$address."/pop3/ssl/novalidate-cert}", $email, $pass); ;
// 	if ($inbox){
// 		$num = imap_num_msg($inbox);
// 	}
//     $emails = imap_search($inbox,'ALL');

	$msgnos = imap_search($mbox, "UNSEEN", SE_UID);
	$i=0;
	foreach($msgnos as $msgUID) {
	    $msgNo = imap_msgno($mbox, $msgUID);
	    $head = imap_headerinfo($mbox, $msgNo);
	    $mail[$i][] = $msgUID;
	    $mail[$i][] = $head->Recent;    
	    $mail[$i][] = $head->Unseen;    
	    $mail[$i][] = $head->from[0]->mailbox."@".$head->from[0]->host; 
	    $mail[$i][] = utf8_decode(imap_utf8($head->subject));   
	    $mail[$i][] = $head->udate;
	}
	print($mail);
	imap_close($mbox);
?>