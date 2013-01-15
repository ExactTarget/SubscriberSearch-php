<?php

// Function for calling a Fuel API using GET
/**
* @param string      $url    The resource URL for the REST API
*
* @return string     The response payload from the REST service
*/
function restGet($url) {
	$ch = curl_init();
	
	// Uses the URL passed in that is specific to the API used
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPGET, true);
	
	// Need to set ReturnTransfer to True in order to store the result in a variable
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Disable VerifyPeer for SSL
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$outputJSON = curl_exec($ch);
	
	// If there are no errors then we just pass the response returned back	
	if(!curl_errno($ch)) {
		curl_close($ch);
		return $outputJSON;
	} else {
	// If there are errors then return a false
		curl_close($ch);
		return false;
	}
}

// Function for calling a Fuel API using POST
/**
* @param string      $url    The resource URL for the REST API
* @param string      $content    A string of JSON which will be passed to the REST API
*
* @return string     The response payload from the REST service
*/
function restPost($url, $content) {
	$ch = curl_init();

	// Uses the URL passed in that is specific to the API used
	curl_setopt($ch, CURLOPT_URL, $url);	

	// When posting to a Fuel API, content-type has to be explicitly set to application/json
	$headers = array("Content-Type: application/json");
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);

	// The content is the JSON payload that defines the request
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $content);

	//Need to set ReturnTransfer to True in order to store the result in a variable
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Disable VerifyPeer for SSL
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$outputJSON = curl_exec($ch);
		
	// If there are no errors then we just pass the response returned back	
	if(!curl_errno($ch)) {
		curl_close($ch);
		return $outputJSON;
	} else {
	// If there are errors then return a false
		curl_close($ch);
		return false;
	}
}

?>
