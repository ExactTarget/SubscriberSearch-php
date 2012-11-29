<?php

require_once("exacttarget_soap_client.php");
require_once("config.php");
require_once("FuelAPI-Platform.php");

//Check to see if we have started the session already.
if(!isset($_SESSION)) {session_start();}

$token = $_SESSION['internalOauthToken'];

$id = $_GET['id'];	

$soapURL = getSoapURLFromPlatform();


try{

	$client = new ExactTargetSoapClient('etframework.wsdl', array('trace'=>1));
	
	$client->__setLocation($soapURL);
	

	/* Set username and password here when passing an AuthToken, username and password are required but should be set to "*" */
	$client->username = '*';
	$client->password = '*';
	$client->authtoken = $token;

	$rr = new ExactTarget_RetrieveRequest();
	$rr->ObjectType = 'Subscriber';

	//Set the properties to return
	$props = array( "ID", "EmailAddress", "SubscriberKey", "Status", "CreatedDate");
	$rr->Properties = $props;

	//Setup account filtering, to look for a given account MID
	$filterPart = new ExactTarget_SimpleFilterPart();
	$filterPart->Property = 'ID';
	$filterPart->SimpleOperator = ExactTarget_SimpleOperators::equals;
	$filterPart->Value = $id;

	$filterPart = new SoapVar($filterPart, SOAP_ENC_OBJECT,'SimpleFilterPart', "http://exacttarget.com/wsdl/partnerAPI");
	$rr->Filter = $filterPart;

	//Setup and execute request
	$rrm = new ExactTarget_RetrieveRequestMsg();
	$rrm->RetrieveRequest = $rr;

	$results = $client->Retrieve($rrm);
	
	$output = array();
	if (property_exists($results, "Results")){
		if (is_array($results->Results)){		
			foreach($results->Results as $sub) 
			{		
				$output = $results->Results;
			} 		
		} else {
				$output = array();
				$output[] = $results->Results;		
		}
	}
	
	$Subcontainer->subscribers = $output;
	// Print the results as JSON so that they can be consumed using an ajax post
	print_r (json_encode($Subcontainer));			
} 
catch (SoapFault $e) 
{
	print_r($e);
	print_r(array());
}	


?>