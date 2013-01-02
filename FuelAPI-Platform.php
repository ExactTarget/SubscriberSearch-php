<?php

require_once 'FuelAPIHelper.php';

function getSoapURLFromPlatform() {

<<<<<<< HEAD
	// Initalize the session
	if(!isset($_SESSION)) {
		session_start();
	}
	
	// Get the oAuthToken that we have stored for the session so we can pass to the service
	$oauthToken = $_SESSION['oauthToken'];

	// Append the OAuth token onto the URL as the access_token parameter
	$requestURL = 'https://www.exacttargetapis.com/platform/v1/endpoints/soap?access_token='.$oauthToken;	

	// Call restGet() from FuelAPIHelper.php
	$endpointsResponse = restGet($requestURL);	

	// Decode the JSON string into a PHP object
	$endpointJSON = json_decode($endpointsResponse);
			
	// Return only the URL from the response from the Endpoints API
	// This is the URL that corresponds with the appropriate stack for your account	
	return $endpointJSON->url;	
=======
	// Initalize the session.
	if(!isset($_SESSION)) {
		session_start();
	}

	// Get the oAuthToken stored for the session so we can pass that token to the service.
	$oauthToken = $_SESSION['oauthToken'];

	// Append the OAuth token to the URL as the access_token parameter.
	$requestURL = 'https://www.exacttargetapis.com/platform/v1/endpoints/soap?access_token='.$oauthToken;

	// Call restGet() from FuelAPIHelper.php.
	$endpointsResponse = restGet($requestURL);

	// Decode the JSON string into a PHP object.
	$endpointJSON = json_decode($endpointsResponse);

	// Return only the URL from the response from the Endpoints API.
	// Use the URL that corresponds with the appropriate stack for your account.
	return $endpointJSON->url;
>>>>>>> Added new comments and Documentation
}


?>
