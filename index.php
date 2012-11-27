<?php

require_once 'config.php';  
?>

<html lang="en">
	<head>
		<title>SubscriberSearch - PHP</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="/css/styles.css" />
        <link rel="shortcut icon" href="/img/fuel-icon.gif">
        <script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.0.6/require.min.js"></script>
        <script src="/js/app-config.js"></script>
        <script src="//use.edgefonts.net/ubuntu-condensed.js"></script>
        
		<link rel="stylesheet" href="/css/index.css"/>
		
    </head>
	<body>
		
		<div class="container-fluid" id="primary">
			<div style="padding: 20px;">
				<?php
					session_start();							
									
					//Check to make sure the user is logged in based on if the session variables for tokens are set		
					if (isset($_SESSION['encodedJWT'])){	
						$encodedJWT = $_SESSION['encodedJWT'];
						$decodedJWT = $_SESSION['decodedJWT'];
						echo '<p><strong>Encoded JWT:</strong><div style="word-wrap: break-word; margin-bottom: 30px;"> ' . $encodedJWT . '</div>';				
						echo '<p><strong>Decoded JWT:</strong><div style="width: 80%;"><code><pre> ' . indent(json_encode($decodedJWT)) . '</pre></code></div></p>';				
						
					} else {
						echo 'JWT Not Provided.';
					}										
				?>	
			</div>
		</div>			
    </body>
</html>


<?php
// This function is only needed so when the JWT is output it is formatted to make it more readable
function indent($json) {
	
	$result = '';
	$pos = 0;
	$strLen = strlen($json);
	$indentStr = ' ';
	$newLine = "\n";
	$prevChar = '';
	$outOfQuotes = true;
	
	for($i = 0; $i <= $strLen; $i++) {
		
		$char = substr($json, $i, 1);
		
		if($char == '"' && $prevChar != '\\') {
			$outOfQuotes = !$outOfQuotes;
		}
		
		else if(($char == '}' || $char == ']') && $outOfQuotes) {
			$result .= $newLine;
			$pos --;
			for ($j=0; $j<$pos; $j++) {
				$result .= $indentStr;
			}
		}
		$result .= $char;
		
		if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
			$result .= $newLine;
			if ($char == '{' || $char == '[') {
				$pos ++;
			}
			for ($j = 0; $j < $pos; $j++) {
				$result .= $indentStr;
			}
		}
		$prevChar = $char;
	}
	
	return $result;
}
			
			
?>	