<?php

require_once("exacttarget_soap_client.php");
require_once("config.php");
require_once("FuelAPI-Platform.php");

// Initalize the session
if(!isset($_SESSION)) {session_start();}

// The Internal OAuth Token is needed for Email SOAP API, this is different from the OAuth Token used for REST
$token = $_SESSION['internalOauthToken'];

// This is the ID of the single subscriber we need details on
$id = $_GET['id'];	

// Call the Fuel API Rest service for Endpoints to make sure we hit the correct SOAP endpoint
$soapURL = getSoapURLFromPlatform();


try{

	$client = new ExactTargetSoapClient('etframework.wsdl', array('trace'=>1));
	// Use the endpoint from the REST call we made above
	$client->__setLocation($soapURL);	

	/* Set username and password here when passing an AuthToken, username and password are required but should be set to "*" */
	$client->username = '*';
	$client->password = '*';
	$client->authtoken = $token;

	$rr = new ExactTarget_RetrieveRequest();
	$rr->ObjectType = 'Subscriber';

	// Set the properties to return
	$props = array( "ID", "EmailAddress", "SubscriberKey", "Status", "CreatedDate");
	$rr->Properties = $props;

	// Setup filter to look for the specific Subscriber based on ID
	$filterPart = new ExactTarget_SimpleFilterPart();
	$filterPart->Property = 'ID';
	$filterPart->SimpleOperator = ExactTarget_SimpleOperators::equals;
	$filterPart->Value = $id;

	$filterPart = new SoapVar($filterPart, SOAP_ENC_OBJECT,'SimpleFilterPart', "http://exacttarget.com/wsdl/partnerAPI");
	$rr->Filter = $filterPart;

	//Setup and execute request
	$rrm = new ExactTarget_RetrieveRequestMsg();
	$rrm->RetrieveRequest = $rr;

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
		} else {
				$output = array();
				$output[] = $results->Results;		
		}
	}
	// Setup a container object so we can specify the return as being "subscribers"
	$Subcontainer->subscribers = $output;
	// Print the results as JSON so that they can be consumed using an ajax post
	print_r (json_encode($Subcontainer));			
} 
catch (SoapFault $e) 
{
	// Print error message to the screen
	print_r($e);
}	


?>
