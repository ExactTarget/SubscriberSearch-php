<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/libs.php";

// Initalize the session
if(!isset($_SESSION)) {session_start();}

// OAuth Token can be used to access Fuel API Family REST services 
//$_SESSION['oauthToken'];

// Internal OAuthToken can be used to access the ExactTarget Email SOAP API service
//$_SESSION['internalOauthToken'] = $decodedJWT->request->user->internalOauthToken;

// Keep the Expiration Date for the token in a session
//$_SESSION['exp'] = $decodedJWT->exp;

// Keep the Refresh Token in a session
//$_SESSION['refreshToken'] = $decodedJWT->request->user->refreshToken;			


// TODO: REMOVE LATER, BOOTSTRAPPING AUTH FOR RUNNING LOCALLY
if( !isset($_SESSION['oauthToken']) ) {
    // Create the request to the Auth API using our config credentials
    $route = "https://auth.exacttargetapis.com/v1/requestToken?legacy=1";
    $payload = '{"clientId":"' . $clientId . '","clientSecret":"' . $clientSecret . '", "accessType":"offline"}';
    $tokenData = restPost( $route, $payload );
    // Assign values to the session
    if( $tokenData ) {
        $decodedRequest = json_decode( $tokenData );
        $_SESSION['oauthToken']         = $decodedRequest->accessToken;
        $_SESSION['exp']                = $decodedRequest->expiresIn;
        $_SESSION['internalOauthToken'] = $decodedRequest->legacyToken;
        $_SESSION['refreshToken']       = $decodedRequest->refreshToken;
    }
}

// Configuration for Savant
$savantConfig = array(
    'template_path' => array( $docroot . '/views' )
);

$savant = new Savant3( $savantConfig );

$appName = "OEM Sample App";
$appDescription = "Simple PHP app focused on implementing the Fuel Editor";
$token = $_SESSION['oauthToken'];

// Configure Data and Assign to Vars for use in Templating
$savant->title = $appName;
$savant->appDescription = $appDescription;
$savant->token = $_SESSION['oauthToken'];

// Display the index.tpl.php template with the above data running
$savant->display( "index.tpl.php" );
?>
