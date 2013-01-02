<?php

require_once("exacttarget_soap_client.php");
require_once("config.php");
require_once("FuelAPI-Platform.php");

<<<<<<< HEAD
// Initalize the session
if(!isset($_SESSION)) {session_start();}

// The Internal OAuth Token is needed for Email SOAP API, this is different from the OAuth Token used for REST
$token = $_SESSION['internalOauthToken'];

// The ID of the subscriber that we are updating
$subscriberID = $_REQUEST['id'];	

// The status we are setting this subscriber to
$subscriberStatus = $_REQUEST['status'];	
=======
// Initalize the session.
if(!isset($_SESSION)) {session_start();}

// The Email SOAP API requires the Internal OAuth Token. This value differs from the OAuth Token used for REST.
$token = $_SESSION['internalOauthToken'];

// This value provides the ID of the updated subscriber.
$subscriberID = $_REQUEST['id'];

// This values indicates the new status of the subscriber.
$subscriberStatus = $_REQUEST['status'];

// Call the Fuel API Rest service for Endpoints to make sure we hit the correct SOAP endpoint.
$soapURL = getSoapURLFromPlatform();
>>>>>>> Added new comments and Documentation

// Call the Fuel API Rest service for Endpoints to make sure we hit the correct SOAP endpoint
$soapURL = getSoapURLFromPlatform();

try{

	$client = new ExactTargetSoapClient('etframework.wsdl', array('trace'=>1));
	$client->__setLocation($soapURL);

	// Set username and password here when passing an AuthToken. Username and password are required but should be set to "*".
	$client->username = '*';
	$client->password = '*';
	$client->authtoken = $token;

	$subscriber = new ExactTarget_Subscriber();
<<<<<<< HEAD
	// Set the ID on the Subscriber object so we have a unique identifier for which record is being updated
	$subscriber->ID = $subscriberID;
	// Set the Status on the Subscriber object with the new value
	$subscriber->Status = $subscriberStatus;	

	// The line below makes the HTTP request to ExactTarget with the SOAP payload
	$subObject = new SoapVar($subscriber, SOAP_ENC_OBJECT, 'Subscriber', "http://exacttarget.com/wsdl/partnerAPI");				
	
	$request = new ExactTarget_UpdateRequest();
	// We don't need any additional options for this call so set it to an empty array
	$request->Options = array();
	// Pass in the Subscriber object in an array using the Object property
	$request->Objects = array($subObject);

	// The line below makes the HTTP request to ExactTarget with the SOAP payload
	$results = $client->Update($request);
	
	// Return a true if successful and false if the status was anything outside of "OK"
=======
	// Set the ID on the Subscriber object so we have a unique identifier for the record being updated.
	$subscriber->ID = $subscriberID;
	// Set the Status on the Subscriber object with the new value.
	$subscriber->Status = $subscriberStatus;

	// The line below makes the HTTP request to ExactTarget with the SOAP payload.
	$subObject = new SoapVar($subscriber, SOAP_ENC_OBJECT, 'Subscriber', "http://exacttarget.com/wsdl/partnerAPI");

	$request = new ExactTarget_UpdateRequest();
	// Because there is no need for any additional options on this call, set the value to an empty array.
	$request->Options = array();
	// Pass in the Subscriber object in an array using the Object property.
	$request->Objects = array($subObject);

	// This code performs the HTTP request to ExactTarget with the SOAP payload.
	$results = $client->Update($request);

	// Return a value of true if successful. Return a value of false if the status was anything except OK.
>>>>>>> Added new comments and Documentation
	if ($results->OverallStatus == 'OK'){
		return true;
	} else {
		return false;
	}
<<<<<<< HEAD
} 
catch (SoapFault $e) 
{
	// If Exception occured then record was not updated, return false
=======
}
catch (SoapFault $e)
{
	// If an exception occurs, the record was not updated. Return a value of false.
>>>>>>> Added new comments and Documentation
	print_r(false);
}


?>
