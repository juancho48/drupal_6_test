<?php 


function paypal_pro_get_settings() {
	$settings = array();

	$settings['proxy_host'] = variable_get('paypal_pro_proxy_host', '127.0.0.1');
	$settings['proxy_port'] = variable_get('paypal_pro_proxy_port', '808');

	$settings['sandbox'] = variable_get('paypal_pro_sandbox', true);
	
	$settings['api_username']  = urlencode(variable_get('paypal_pro_api_username', 'test_1313776594_biz_api1.gmail.com'));
	$settings['api_password']  = urlencode(variable_get('paypal_pro_api_password', '1313776643'));
	$settings['api_signature'] = urlencode(variable_get('paypal_pro_api_signature', 'A2bwnYmQe69zKQGB4pl5KluJSHEvAkr94.LUnPVu-UAb0iUGj0bs8NUm'));

		
	if ($settings['sandbox'] == true) {
		$settings['api_endpoint'] = "https://api-3t.sandbox.paypal.com/nvp";
		$settings['paypal_url'] = "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=";
	}
	else {
		$settings['api_endpoint'] = "https://api-3t.paypal.com/nvp";
		$settings['paypal_url'] = "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=";
	}
	
	$settings['use_proxy'] = false;
	$settings['version'] = '64.0';
	
	return $settings;
}

/**
 * UNIMPLEMENTED - DIRECT FROM PAYPAL'S INTEGRATION WIZARD
 */
function paypal_pro_call_shortcut_express_checkout( $paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL) {
	//------------------------------------------------------------------------------------------------------------------------------------
	// Construct the parameter string that describes the SetExpressCheckout API call in the shortcut implementation
	
	$nvpstr = "&PAYMENTREQUEST_0_AMT=". $paymentAmount;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_PAYMENTACTION=" . $paymentType;
	$nvpstr = $nvpstr . "&RETURNURL=" . $returnURL;
	$nvpstr = $nvpstr . "&CANCELURL=" . $cancelURL;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_CURRENCYCODE=" . $currencyCodeType;
	
	$_SESSION["currencyCodeType"] = $currencyCodeType;	  
	$_SESSION["PaymentType"] = $paymentType;

	//'--------------------------------------------------------------------------------------------------------------- 
	//' Make the API call to PayPal
	//' If the API call succeded, then redirect the buyer to PayPal to begin to authorize payment.  
	//' If an error occured, show the resulting errors
	//'---------------------------------------------------------------------------------------------------------------
    $resArray = paypal_pro_hash_call("SetExpressCheckout", $nvpstr);
	$ack = strtoupper($resArray["ACK"]);
	if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING") {
		$token = urldecode($resArray["TOKEN"]);
		$_SESSION['TOKEN']=$token;
	}
	   
    return $resArray;
}

/**
 * UNIMPLEMENTED - DIRECT FROM PAYPAL'S INTEGRATION WIZARD
 */
function paypal_pro_call_mark_express_checkout( $paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL, $shipToName, $shipToStreet, $shipToCity, $shipToState, $shipToCountryCode, $shipToZip, $shipToStreet2, $phoneNum) {
	//------------------------------------------------------------------------------------------------------------------------------------
	// Construct the parameter string that describes the SetExpressCheckout API call in the shortcut implementation
	
	$nvpstr = "&PAYMENTREQUEST_0_AMT=". $paymentAmount;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_PAYMENTACTION=" . $paymentType;
	$nvpstr = $nvpstr . "&RETURNURL=" . $returnURL;
	$nvpstr = $nvpstr . "&CANCELURL=" . $cancelURL;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_CURRENCYCODE=" . $currencyCodeType;
	$nvpstr = $nvpstr . "&ADDROVERRIDE=1";
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTONAME=" . $shipToName;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOSTREET=" . $shipToStreet;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOSTREET2=" . $shipToStreet2;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOCITY=" . $shipToCity;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOSTATE=" . $shipToState;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=" . $shipToCountryCode;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOZIP=" . $shipToZip;
	$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOPHONENUM=" . $phoneNum;
	
	$_SESSION["currencyCodeType"] = $currencyCodeType;	  
	$_SESSION["PaymentType"] = $paymentType;

	//'--------------------------------------------------------------------------------------------------------------- 
	//' Make the API call to PayPal
	//' If the API call succeded, then redirect the buyer to PayPal to begin to authorize payment.  
	//' If an error occured, show the resulting errors
	//'---------------------------------------------------------------------------------------------------------------
    $resArray=paypal_pro_hash_call("SetExpressCheckout", $nvpstr);
	$ack = strtoupper($resArray["ACK"]);
	if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")
	{
		$token = urldecode($resArray["TOKEN"]);
		$_SESSION['TOKEN']=$token;
	}
	   
    return $resArray;
}

/**
 * UNIMPLEMENTED - DIRECT FROM PAYPAL'S INTEGRATION WIZARD
 */
function paypal_pro_confirm_payment( $FinalPaymentAmt ) {
	/* Gather the information to make the final call to
	   finalize the PayPal payment.  The variable nvpstr
	   holds the name value pairs
	*/
	
	//Format the other parameters that were stored in the session from the previous calls	
	$token 				= urlencode($_SESSION['TOKEN']);
	$paymentType 		= urlencode($_SESSION['PaymentType']);
	$currencyCodeType 	= urlencode($_SESSION['currencyCodeType']);
	$payerID 			= urlencode($_SESSION['payer_id']);

	$serverName 		= urlencode($_SERVER['SERVER_NAME']);

	$nvpstr  = '&TOKEN=' . $token . '&PAYERID=' . $payerID . '&PAYMENTREQUEST_0_PAYMENTACTION=' . $paymentType . '&PAYMENTREQUEST_0_AMT=' . $FinalPaymentAmt;
	$nvpstr .= '&PAYMENTREQUEST_0_CURRENCYCODE=' . $currencyCodeType . '&IPADDRESS=' . $serverName; 

	/* Make the call to PayPal to finalize payment
	   If an error occured, show the resulting errors
	*/
	$resArray=paypal_pro_hash_call("DoExpressCheckoutPayment",$nvpstr);

	/* Display the API response back to the browser.
	   If the response from PayPal was a success, display the response parameters'
	   If the response was an error, display the errors received using APIError.php.
	*/
	$ack = strtoupper($resArray["ACK"]);

	return $resArray;
}

/**
 * implementation of NVP direct payment
 */
function paypal_pro_direct_payment($options) {
	// $paymentType, $paymentAmount, $creditCardType, $creditCardNumber, $expDate, $cvv2, $firstName, $lastName, $street, $city, $state, $zip, $countryCode, $currencyCode 

	// Construct the parameter string that describes DoDirectPayment
	$nvpstr = "&AMT=" . $options['amount'];
	$nvpstr = $nvpstr . "&CURRENCYCODE=" . $options['currency_code'];
	$nvpstr = $nvpstr . "&PAYMENTACTION=Sale";
	$nvpstr = $nvpstr . "&CREDITCARDTYPE=" . $options['card_type'];
	$nvpstr = $nvpstr . "&ACCT=" . $options['card_number'];
	$nvpstr = $nvpstr . "&EXPDATE=" . $options['expiration_date'];
	$nvpstr = $nvpstr . "&CVV2=" . $options['cvv2'];
	$nvpstr = $nvpstr . "&FIRSTNAME=" . $options['first_name'];
	$nvpstr = $nvpstr . "&LASTNAME=" . $options['last_name'];
	$nvpstr = $nvpstr . "&STREET=" . $options['street'];
	$nvpstr = $nvpstr . "&CITY=" . $options['city'];
	$nvpstr = $nvpstr . "&STATE=" . $options['state'];
	$nvpstr = $nvpstr . "&COUNTRYCODE=" . $options['country_code'];
	$nvpstr = $nvpstr . "&IPADDRESS=" . $_SERVER['REMOTE_ADDR'];
	$resArray = paypal_pro_hash_call("DoDirectPayment", $nvpstr);

	return $resArray;
}

/**
 * hash_call: Function to perform the API call to PayPal using API signature
 * @methodName is name of API  method.
 * @nvpStr is nvp string.
 * returns an associtive array containing the response from the server.
 */
function paypal_pro_hash_call($methodName,$nvpStr) {
	$settings = paypal_pro_get_settings();

	//setting the curl parameters.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $settings['api_endpoint']);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);

	//turning off the server and peer verification(TrustManager Concept).
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	
    //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
   //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
	if($settings['use_proxy'])
		curl_setopt ($ch, CURLOPT_PROXY, $settings['proxy_host']. ":" . $settings['proxy_port']); 

	//NVPRequest for submitting to server
	$nvpreq="METHOD=" . urlencode($methodName) . "&VERSION=" . urlencode($settings['version']) . "&PWD=" . urlencode($settings['api_password']) . "&USER=" . urlencode($settings['api_username']) . "&SIGNATURE=" . urlencode($settings['api_signature']) . $nvpStr;

	//setting the nvpreq as POST FIELD to curl
	curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

	//getting response from server
	$response = curl_exec($ch);

	//convrting NVPResponse to an Associative Array
	$nvpResArray=paypal_pro_deformatNVP($response);
	$nvpReqArray=paypal_pro_deformatNVP($nvpreq);
	$_SESSION['nvpReqArray']=$nvpReqArray;
	$_SESSION['nvpResArray']=$nvpResArray;
	
	if (curl_errno($ch)) {
		// moving to display page to display curl errors
		$_SESSION['curl_error_no']=curl_errno($ch) ;
		$_SESSION['curl_error_msg']=curl_error($ch);

		//Execute the Error handling module to display errors. 
	} 
	else {
		//closing the curl
		curl_close($ch);
	}

	return $nvpResArray;
}

/**
 * This function will take NVPString and convert it to an Associative Array and it will decode the response.
 * It is usefull to search for a particular key and displaying arrays.
 * @nvpstr is NVPString.
 */
function paypal_pro_deformatNVP($nvpstr) {
	$intial=0;
 	$nvpArray = array();

	while(strlen($nvpstr)) {
		//postion of Key
		$keypos= strpos($nvpstr,'=');
		//position of value
		$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

		/*getting the Key and Value values and storing in a Associative Array*/
		$keyval=substr($nvpstr,$intial,$keypos);
		$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
		//decoding the respose
		$nvpArray[urldecode($keyval)] =urldecode( $valval);
		$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
     }
	return $nvpArray;
}

/**
 * Purpose: Redirects to PayPal.com site.
 * Inputs:  NVP string.
 */
function paypal_pro_redirect( $token ) {
	$settings = paypal_pro_get_settings();
	
	// Redirect to paypal.com here
	$payPalURL = $settings['paypal_url'] . $token;
	header("Location: ".$payPalURL);
}
