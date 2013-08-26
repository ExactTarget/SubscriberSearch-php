<?php

require_once 'config.php';  
require_once 'FuelAPI-Platform.php';  
require_once 'vendor/Savant3.php';

$tpl = new Savant3();

$appName = "OEM Sample App";
$appDescription = "Simple PHP app focused on implementing the Fuel Editor";

// Configure Data and Assign to Vars for use in Templating

// Display the index.tpl.php template with the above data running
$tpl->display( 'templates/index.tpl.php' );
?>
