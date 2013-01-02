<?php

require_once("exacttarget_soap_client.php");
require_once("config.php");
require_once("FuelAPI-Platform.php");

<<<<<<< HEAD
// Initalize the session
if(!isset($_SESSION)) {session_start();}

// The Internal OAuth Token is needed for Email SOAP API, this is different from the OAuth Token used for REST
$token = $_SESSION['internalOauthToken'];

// This is the search string that was entered in the UI
$searchString = $_GET['searchString'];	

// Call the Fuel API Rest service for Endpoints to make sure we hit the correct SOAP endpoint
=======
// Initalize the session.
if(!isset($_SESSION)) {session_start();}

// The Email SOAP API requires the Internal OAuth Token. This values differs from the OAuth Token used for REST.
$token = $_SESSION['internalOauthToken'];

// This value includes the search string entered in the UI.
$searchString = $_GET['searchString'];

// Call the Fuel API Rest service for Endpoints to make sure we hit the correct SOAP endpoint.
>>>>>>> Added new comments and Documentation
$soapURL = getSoapURLFromPlatform();


try{

	$client = new ExactTargetSoapClient('etframework.wsdl', array('trace'=>1));
<<<<<<< HEAD
	// Use the endpoint from the REST call we made above
=======
	// Use the endpoint from the previously completed REST call.
>>>>>>> Added new comments and Documentation
	$client->__setLocation($soapURL);


	// Set username and password here when passing an AuthToken. The username and password are required but should be set to "*".
	$client->username = '*';
	$client->password = '*';
	$client->authtoken = $token;

	$rr = new ExactTarget_RetrieveRequest();
	$rr->ObjectType = 'Subscriber';

	// Set the properties to return.
	$props = array( "ID", "EmailAddress", "SubscriberKey", "Status");
	$rr->Properties = $props;

<<<<<<< HEAD
	// Setup filter to look for any subscribers where their email address contains the search string
=======
	// Set up filter to look for any subscribers where their email address contains the search string.
>>>>>>> Added new comments and Documentation
	$filterPart = new ExactTarget_SimpleFilterPart();
	$filterPart->Property = 'EmailAddress';
	$filterPart->SimpleOperator = ExactTarget_SimpleOperators::like;
	$filterPart->Value = $searchString;

	$filterPart = new SoapVar($filterPart, SOAP_ENC_OBJECT,'SimpleFilterPart', "http://exacttarget.com/wsdl/partnerAPI");
	$rr->Filter = $filterPart;

	// Set up and execute request.
	$rrm = new ExactTarget_RetrieveRequestMsg();
	$rrm->RetrieveRequest = $rr;
<<<<<<< HEAD
	// The line below makes the HTTP request to ExactTarget with the SOAP payload
	$results = $client->Retrieve($rrm);
	
	
	// We want the response to be an array even if it has 1 result in it
=======
	// The line below makes the HTTP request to ExactTarget with the SOAP payload.
	$results = $client->Retrieve($rrm);


	// Place the response in an array even if it contains only one result.
>>>>>>> Added new comments and Documentation
	$output = array();

	// Check to see if there are any results
	if (property_exists($results, "Results")){
<<<<<<< HEAD
		// If the results are already an array then we can add each item to the new array
		if (is_array($results->Results)){		
			foreach($results->Results as $sub) 
			{		
				$output = $results->Results;
			} 
		// If there is only one object returned then the result is not an array so we will put this single object into our new array		
=======
		// If the results are already an array, add each item to the new array.
		if (is_array($results->Results)){
			foreach($results->Results as $sub)
			{
				$output = $results->Results;
			}
		// If only one object returned, place this single object into our new array.
>>>>>>> Added new comments and Documentation
		} else {
				$output = array();
				$output[] = $results->Results;
		}
	}

	$Subcontainer->subscribers = $output;
	// Print the results as JSON so that they can be consumed using an AJAX post.
	print_r (json_encode($Subcontainer));
}
catch (SoapFault $e)
{
<<<<<<< HEAD
	// Print error message to the screen
	print_r($e);
}	
=======
	// Print error message to the screen.
	print_r($e);
}
>>>>>>> Added new comments and Documentation


?>
