<?php

<<<<<<< HEAD
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
=======
// This function calls a Fuel API using GET.
/**
* @param string      $url    provides the resource URL for the REST API.
*
* @return string     provides the response payload from the REST service.
*/
function restGet($url) {
	$ch = curl_init();

	// This code uses the URL passed in (specific to the API used).
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPGET, true);

	// This code sets ReturnTransfer to True in order to store the result in a variable.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Force the certificate to be validated for SSL.
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$outputJSON = curl_exec($ch);

	// If there are no errors, this code passes the response returned.
>>>>>>> Added new comments and Documentation
	if(!curl_errno($ch)) {
		curl_close($ch);
		return $outputJSON;
	} else {
<<<<<<< HEAD
	// If there are errors then return a false
=======
	// If there are errors, this code returns a value of false.
>>>>>>> Added new comments and Documentation
		curl_close($ch);
		return false;
	}
}

<<<<<<< HEAD
// Function for calling a Fuel API using POST
/**
* @param string      $url    The resource URL for the REST API
* @param string      $content    A string of JSON which will be passed to the REST API
*
* @return string     The response payload from the REST service
=======
// This function calls a Fuel API using POST.
/**
* @param string      $url    provides the resource URL for the REST API.
* @param string      $content    provides a JSON string which will be passed to the REST API.
*
* @return string     contains the response payload from the REST service.
>>>>>>> Added new comments and Documentation
*/
function restPost($url, $content) {
	$ch = curl_init();

<<<<<<< HEAD
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
=======
	// This code uses the URL passed in (specific to the API used).
	curl_setopt($ch, CURLOPT_URL, $url);

	// When posting to a Fuel API, explicitly set this content-type  to application/json.
	$headers = array("Content-Type: application/json");
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);

	// This code contains the JSON payload that defines the request.
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $content);

	// Set ReturnTransfer to True in order to store the result in a variable.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Force the certificate to be validated for SSL.
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$outputJSON = curl_exec($ch);

	// If there are no errors, this code passes the response returned.
>>>>>>> Added new comments and Documentation
	if(!curl_errno($ch)) {
		curl_close($ch);
		return $outputJSON;
	} else {
<<<<<<< HEAD
	// If there are errors then return a false
=======
	// If there are errors, this code returns a value of false.
>>>>>>> Added new comments and Documentation
		curl_close($ch);
		return false;
	}
}

?>
