<?php

require_once 'FuelAPIHelper.php'; 
	
function getSoapURLFromPlatform() {

	if(!isset($_SESSION)) {
		session_start();
	}
	
	$oauthToken = $_SESSION['oauthToken'];

	//Append the OAuth token onto the URL as the access_token parameter
	$requestURL = 'https://www.exacttargetapis.com/platform/v1/endpoints/soap?access_token='.$oauthToken;	
	$endpointsResponse = restGet($requestURL);	
	$endpointJSON = json_decode($endpointsResponse);
			
	return $endpointJSON->url;	

}


?>