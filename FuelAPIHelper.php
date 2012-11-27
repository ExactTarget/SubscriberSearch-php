<?php


function restGet($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPGET, true);
	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$outputJSON = curl_exec($ch);
	
	if(!curl_errno($ch)) {
		curl_close($ch);
		return $outputJSON;
	} else {
		curl_close($ch);
		return false;
	}
}

function restPost($url, $content) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);	
	$headers = array("Content-Type: application/json");
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $content);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$outputJSON = curl_exec($ch);
			
	if(!curl_errno($ch)) {
		curl_close($ch);
		return $outputJSON;
	} else {
		curl_close($ch);
		return false;
	}
}

?>