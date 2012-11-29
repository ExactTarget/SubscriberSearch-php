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
		
		<link href="/vendor/fuelux/css/fuelux.css" rel="stylesheet" />
		<link href="/vendor/fuelux/css/fuelux-responsive.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js" type="text/javascript"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
		<script src="/vendor/fuelux/sample/datasource.js" type="text/javascript"></script>
		<script src="/vendor/fuelux/loader.js" type="text/javascript"></script>

		
		<script  type="text/javascript">
						
			$(document).ready(function() {
				
				var dataSource = new SubscriberSearchDataSource({
					columns: [{
						property: 'EmailAddress',
						label: 'Email Address',
						sortable: true
						}, {
						property: 'SubscriberKey',
						label: 'Subscriber Key',
						sortable: true
					},
					{
						property: 'ViewDetails',
						label: '',
						sortable: true
					}, 
					{
						property: 'Status',
						label: 'Status',
						sortable: true
					}
					],
					delay: 250
				});
				
				
				$('#subscriberGrid').datagrid({
					dataSource: dataSource,
					renderData: true
				});
											
				
				$('.viewDetails').live('click', function(){
					var $url = "/soap-SubDetails.php?id=" + this.id;
					$.ajax({url: $url, 				
						
						complete:function(result){													
							var sub = JSON.parse(result.responseText).subscribers[0];
							$('#subscriberDetails').html('<dl> <dt>Email</dt> <dd>'+sub.EmailAddress+'</dd> <dt>Subscriber Key</dt> <dd>'+sub.SubscriberKey+'</dd> <dt>Created</dt> <dd>'+sub.CreatedDate+'</dd> <dt>Status</dt></dl><div id="statusCombo" class="input-append dropdown combobox" style="width: 80%; margin-top: 0;"> <input class="span2" style="width: 50%;" id="statusValue" type="text" value="'+sub.Status+'"><button class="btn" data-toggle="dropdown"><i class="caret"></i></button> <ul class="dropdown-menu"> <li><a href="#">Active</a></li> <li><a href="#">Unsubscribed</a></li> </ul><button class="btn btn-primary pull-right saveStatus" id="'+sub.ID+'">Update Status</button></div>');					
						}		
					});						

					return false;
				});
				
				$('.saveStatus').live('click', function(){
					var $url = "/soap-SubUpdate.php?id=" + this.id + "&status=" + $('#statusValue').combobox().val() ;
					$.ajax({url: $url, 				
						
						complete:function(result){
							// Once the update is complete, refresh the grid
							var $gridsearch = jQuery('#subscriberGrid').find('.search');
							var search = $gridsearch.find('input').val();
							$gridsearch.trigger('searched', "_RELOAD");
						}		
					});						
				 
					return false;
				});
				
			});	
		</script>
        
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
		<div class="span9"><table id="subscriberGrid" class="table table-bordered datagrid" >
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
				<tfoot>
					<tr>
						<th>
							<div class="datagrid-footer-left" style="display:none;">
								<div class="grid-controls">
									<span><span class="grid-start"></span> - <span class="grid-end"></span> of
									<span class="grid-count"></span></span>
									<select class="grid-pagesize">
										<option>10</option>
										<option>20</option>
										<option>50</option>
										<option>100</option>
									</select>
									<span>Per Page</span>
								</div>
							</div>
							<div class="datagrid-footer-right" style="display:none;">
								<div class="grid-pager">
									<button class="btn grid-prevpage">
										<i class="icon-chevron-left"></i>
									</button>
									<span>Page</span>
									<div class="input-append dropdown combobox">
										<input class="span1" type="text">
										<button class="btn" data-toggle="dropdown">
											<i class="caret"></i>
										</button>
										<ul class="dropdown-menu"></ul>
									</div>
									<span>of <span class="grid-pages"></span></span>
									<button class="btn grid-nextpage">
										<i class="icon-chevron-right"></i>
									</button>
								</div>
							</div>
						</th>
					</tr>
				</tfoot>
			</table>
		</div>
		</div>
	</div>

	
    
	
</body>
</html>
