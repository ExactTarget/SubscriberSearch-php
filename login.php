<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/libs.php';

session_start(); 

try {
	if (isset($_REQUEST['jwt'])){
		$encodedJWT = $_REQUEST['jwt'];		
		
		// Decode the JWT into a PHP object using the app secret from the config file
		$decodedJWT = JWT::decode($encodedJWT, $encodedJWT, false);
		
		// OAuth Token can be used to access Fuel API Family REST services 
		$_SESSION['oauthToken'] = $decodedJWT->request->user->oauthToken;
		// Internal OAuthToken can be used to access the ExactTarget Email SOAP API service
		$_SESSION['internalOauthToken'] = $decodedJWT->request->user->internalOauthToken;
		// Keep the Expiration Date for the token in a session
		$_SESSION['exp'] = $decodedJWT->exp;
		// Keep the Refresh Token in a session
		$_SESSION['refreshToken'] = $decodedJWT->request->user->refreshToken;			
		
		//Redirect the user to the url defined in the JWT
		header( 'Location: '.$decodedJWT->request->application->redirectUrl) ;
	} else {
		//Print out an error in case no JWT value was passed
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
