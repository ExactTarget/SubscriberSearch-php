<?php

require_once("exacttarget_soap_client.php");
require_once("config.php");
require_once("FuelAPI-Platform.php");

<<<<<<< HEAD
// Initalize the session
if(!isset($_SESSION)) {session_start();}

// The Internal OAuth Token is needed for Email SOAP API, this is different from the OAuth Token used for REST
$token = $_SESSION['internalOauthToken'];

// This is the ID of the single subscriber we need details on
$id = $_GET['id'];	

// Call the Fuel API Rest service for Endpoints to make sure we hit the correct SOAP endpoint
=======
// Initalize the session.
if(!isset($_SESSION)) {session_start();}

// The Email SOAP API requires an internal OAuth Token. This token contains a different value from the OAuth Token used for REST.
$token = $_SESSION['internalOauthToken'];

// This value represents the ID of the single subscriber for whom we need details.
$id = $_GET['id'];

// Call the Fuel API Rest service for Endpoints to make sure we hit the correct SOAP endpoint.
>>>>>>> Added new comments and Documentation
$soapURL = getSoapURLFromPlatform();


try{

	$client = new ExactTargetSoapClient('etframework.wsdl', array('trace'=>1));
<<<<<<< HEAD
	// Use the endpoint from the REST call we made above
	$client->__setLocation($soapURL);	
=======
	// Use the endpoint from the REST call made previously.
	$client->__setLocation($soapURL);
>>>>>>> Added new comments and Documentation

	/* Set the username and password here when passing an AuthToken. Username and password are required but should be set to "*". */
	$client->username = '*';
	$client->password = '*';
	$client->authtoken = $token;

	$rr = new ExactTarget_RetrieveRequest();
	$rr->ObjectType = 'Subscriber';

<<<<<<< HEAD
	// Set the properties to return
	$props = array( "ID", "EmailAddress", "SubscriberKey", "Status", "CreatedDate");
	$rr->Properties = $props;

	// Setup filter to look for the specific Subscriber based on ID
=======
	// Set the properties to return.
	$props = array( "ID", "EmailAddress", "SubscriberKey", "Status", "CreatedDate");
	$rr->Properties = $props;

	// Set up filter to look for the specific Subscriber based on ID.
>>>>>>> Added new comments and Documentation
	$filterPart = new ExactTarget_SimpleFilterPart();
	$filterPart->Property = 'ID';
	$filterPart->SimpleOperator = ExactTarget_SimpleOperators::equals;
	$filterPart->Value = $id;

	$filterPart = new SoapVar($filterPart, SOAP_ENC_OBJECT,'SimpleFilterPart', "http://exacttarget.com/wsdl/partnerAPI");
	$rr->Filter = $filterPart;

	//Set up and execute request.
	$rrm = new ExactTarget_RetrieveRequestMsg();
	$rrm->RetrieveRequest = $rr;

<<<<<<< HEAD
	// The line below makes the HTTP request to ExactTarget with the SOAP payload
	$results = $client->Retrieve($rrm);
	
	// We want the response to be an array even if it has 1 result in it
	$output = array();

	// Check to see if there are any results
	if (property_exists($results, "Results")){
		// If the results are already an array then we can add each item to the new array
		if (is_array($results->Results)){		
			foreach($results->Results as $sub) 
			{		
				$output = $results->Results;
			} 		
		// If there is only one object returned then the result is not an array so we will put this single object into our new array
=======
	// This code makes the HTTP request to ExactTarget with the SOAP payload.
	$results = $client->Retrieve($rrm);

	// Return the response in an array, even if that reponse contains only one result.
	$output = array();

	// Check to see if there are any results.
	if (property_exists($results, "Results")){
		// If the results are already an array, add each item to the new array.
		if (is_array($results->Results)){
			foreach($results->Results as $sub)
			{
				$output = $results->Results;
			}
		// Place any single object into our new array.
>>>>>>> Added new comments and Documentation
		} else {
				$output = array();
				$output[] = $results->Results;
		}
	}
<<<<<<< HEAD
	// Setup a container object so we can specify the return as being "subscribers"
=======
	// Set up a container object so we can specify the returned value as being "subscribers."
>>>>>>> Added new comments and Documentation
	$Subcontainer->subscribers = $output;
	// Print the results as JSON so that those results can be consumed using an AJAX post.
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
