<?php

require_once("exacttarget_soap_client.php");
require_once("config.php");

//Check to see if we have started the session already.
if(!isset($_SESSION)) {session_start();}

$token = $_SESSION['internalOauthToken'];
$subscriberID = $_REQUEST['id'];	
$subscriberStatus = $_REQUEST['status'];	

try{

	$client = new ExactTargetSoapClient('etframework.wsdl', array('trace'=>1));

	/* Set username and password here when passing an AuthToken, username and password are required but should be set to "*" */
	$client->username = '*';
	$client->password = '*';
	$client->authtoken = $token;

	$subscriber = new ExactTarget_Subscriber();
	$subscriber->ID = $subscriberID;	
	$subscriber->Status = $subscriberStatus;	
	
	$subObject = new SoapVar($subscriber, SOAP_ENC_OBJECT, 'Subscriber', "http://exacttarget.com/wsdl/partnerAPI");				
	
	$request = new ExactTarget_UpdateRequest();
	$request->Options = array();
	$request->Objects = array($subObject);
	var_dump($request);
	
	$results = $client->Update($request);
	
	var_dump($results);	
} 
catch (SoapFault $e) 
{
	print_r(false);
}	


?>