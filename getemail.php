<?php 
	//	EDIT ACCORDINGLY TO ORIGINAL AND LIVE CREDENTIALS TO GET RESULT
	// $server = "mail.gmail.com";	// Maybe www.univasa.com
	$server = "bravo.cloudns.io";	// Maybe www.univasa.com
	$port 	= "995";		// Can be blank if the server has no port (be very sure)
	// $email	= "sms2email@univasa.com"; 	// In this case can be kayode@univasa.com
	$email	= "ugodwin@supersoft.com.ng"; 	// In this case can be kayode@univasa.com
	// $pass	= "sms2email";		// Your password for the above email
	$pass	= "08024245093@";		// Your password for the above email

	// MUST NOT CHANGE ANYTHING HERE 	==============>>>
	$address= $server.":".$port;
	if($port == ""){
		$address = $server;
	} 
	$imap 	= imap_open("{".$address."/pop3/ssl/novalidate-cert}", $email, $pass); 

	if( $imap ) { 
	     //Check no.of.msgs 
	     $num = imap_num_msg($imap); 

	     //if there is a message in your inbox 
	     if( $num >0 ) { 
	          //read that mail recently arrived 
	          echo imap_qprint(imap_body($imap, $num)); 
	     } 

	     //close the stream 
	     imap_close($imap); 
	} 
	// MUST NOT CHANGE ANYTHING HERE 	==============>>>
?>