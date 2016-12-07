<?php
	$pp_hostname = "www.sandbox.paypal.com"; // Change to www.sandbox.paypal.com to test against sandbox
	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-synch';
	 
	$tx_token = $_GET['tx'];
	$auth_token = "GX_sTf5bW3wxRfFEbgofs88nQxvMQ7nsI8m21rzNESnl_79ccFTWj2aPgQ0";
	$req .= "&tx=$tx_token&at=$auth_token";
	 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSLVERSION, 6);
	curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
	//set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
	//if your server does not bundled with default verisign certificates.
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
	$res = curl_exec($ch);
	//curl_close($ch);
	if(!$res){
		echo "Http error!!!".curl_error($ch);
	}else{
		 // parse the data
		$lines = explode("\n", $res);
		$keyarray = array();
		if (strcmp ($lines[0], "SUCCESS") == 0) {
			for ($i=1; $i<count($lines);$i++){
				list($key,$val) = explode("=", $lines[$i]);
				$keyarray[urldecode($key)] = urldecode($val);
			}
			// check the payment_status is Completed
			// check that txn_id has not been previously processed
			// check that receiver_email is your Primary PayPal email
			// check that payment_amount/payment_currency are correct
			// process payment
			$firstname = $keyarray['first_name'];
			$lastname = $keyarray['last_name'];
			$itemname = $keyarray['item_name'];
			$amount = $keyarray['payment_gross'];
			 
			echo ("<p><h3>Merci pour votre reservation!</h3></p><b>Détails du paiment :</b><br>\n<li>Nom : $firstname $lastname</li>\n<li>Reservation : $itemname</li>\n");
			echo ("Vous pouvez voir les détails du paiment en vous connectant à votre compte sur <a href='https://www.paypal.com'>www.paypal.com</a>.<br>");
		}else if (strcmp ($lines[0], "FAIL") == 0) {
			echo "De toute évidence, c'est un fail....";
		}
	}
 
?>

 