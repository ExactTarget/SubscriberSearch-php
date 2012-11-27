<?php

require_once 'config.php';  
require_once 'FuelAPI-Platform.php';  
?>

<html lang="en" class="fuelux">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="Node-Backbone-FuelUX based App">
        <title>Subscriber Search - PHP Version</title>
        <link rel="stylesheet" href="/css/styles.css" />
        <link rel="stylesheet" href="/vendor/fuelux/css/fuelux.min.css" />
        <link rel="stylesheet" href="/vendor/fuelux/css/fuelux-responsive.min.css" />
        <link rel="shortcut icon" href="/img/fuel-icon.gif">
        <script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.0.6/require.min.js"></script>
        <script src="/vendor/fuelux/all.min.js"></script>
        <script src="/js/app-config.js"></script>
        <script src="//use.edgefonts.net/ubuntu-condensed.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.1/jquery.min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.1/bootstrap.min.js" type="text/javascript"></script>		
		<script src="//cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min" type="text/javascript.js"></script>
        
<link rel="stylesheet" href="/css/index.css"/>

    </head>
<body>
	<div id="app-nav" class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a href="/" class="brand">PHP Version</a>
			</div>
		</div>
	</div>
	<div id="primary" class="container-fluid"><div class="row-fluid">
		<div id="subscriberDetailsContainer" class="span3"><div class="well">
			<h1>Subscriber Details</h1>
			<p id="detailsMsg" class="text-info">Please search for subscribers, then click the "View Details" button for a subscriber from the grid.</p>
			<div id="subscriberDetails"></div>
			</div>
		</div>
		<div id="subscriberGridContainer" class="span9"><table class="table table-bordered datagrid" id="subscriberGrid">
			<thead>
				<tr>
					<th colspan="4">
						<span class="datagrid-header-title">Subscriber Listings</span>
						<div class="datagrid-header-left">
						</div>
						<div class="datagrid-header-right">
							<div class="input-append search" id="subscriberSearch">
								<input type="text" placeholder="Search for subscribers" class="input-medium"><button class="btn"><i class="icon-search"></i></button>
							</div>
						</div>
					</th>
				</tr>
			<tr><th class="sortable" data-property="emailAddress">Email Address</th><th class="sortable" data-property="fullName">Full Name</th><th data-property="viewDetails"></th><th class="sortable" data-property="status">Status</th></tr></thead><tbody><tr><td colspan="4" style="text-align:center;padding:20px;"><div style="width:50%;margin:auto;" class="progress progress-striped active"><div style="width:100%;" class="bar"></div></div></td></tr></tbody>
			
			<tfoot>
				<tr>
					<th colspan="4">
						<div style="display: none;" class="datagrid-footer-left">
							<div class="grid-controls">
								<span><span class="grid-start"></span> - <span class="grid-end"></span> of <span class="grid-count"></span></span>
								<select class="grid-pagesize"><option>10</option><option>20</option><option>50</option><option>100</option></select>
								<span>Per Page</span>
							</div>
						</div>
						<div style="display:none;" class="datagrid-footer-right">
							<div class="grid-pager">
								<button class="btn grid-prevpage"><i class="icon-chevron-left"></i></button>
								<span>Page</span>
								<div class="input-append dropdown combobox">
									<input type="text" class="span1"><button data-toggle="dropdown" class="btn"><i class="caret"></i></button>
									<ul class="dropdown-menu"></ul>
								</div>
								<span>of <span class="grid-pages"></span></span>
								<button class="btn grid-nextpage"><i class="icon-chevron-right"></i></button>
							</div>
						</div>
					</th>
				</tr>
			</tfoot>
			</table>
		</div>
		</div>
	</div>

	<script src="/js/base.js"></script>
	
    
	
</body>
</html>
