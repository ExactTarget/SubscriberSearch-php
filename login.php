<?php

require_once 'JWT.php';  // install from https://github.com/luciferous/jwt
require_once 'config.php';  

session_start(); 


try {
	if (isset($_REQUEST['jwt'])){
	$encodedJWT = $_REQUEST['jwt'];		

	// Decode the JWT since we will need it in order to redirect to the main application page
	$decodedJWT = JWT::decode($encodedJWT, $appsecret);
	
	// Store the encoded JWT as a session variable so we can use it later
	$_SESSION['encodedJWT'] = $encodedJWT;
	
	// Store the decoded JWT as a session variable so we can use it later
	$_SESSION['decodedJWT'] = $decodedJWT;

	//Redirect the user to the url defined in the JWT
	header( 'Location: '.$decodedJWT->request->application->redirectUrl) ;
	} else {
		print_r('JWT Value not provided.');
	}
} 

catch (DomainException $e) {
	print_r('Unable to sign in using SSO: DomainException');
}

catch (UnexpectedValueException $e) {
	print_r('Unable to sign in using SSO: UnexpectedValueException');
}

catch (Exception $e) {
	print_r('Unable to sign in using SSO: Unknown Error');
}

?>
