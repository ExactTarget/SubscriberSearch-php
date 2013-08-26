<!DOCTYPE html>
<html class="fuelux" lang="en"> <!-- FuelUX attribute -->
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->eprint( $this->title); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="http://fuelcdn.com/fuelux-imh/2.3/css/fuelux.css" rel="stylesheet" />  <!-- FuelUX CDN link to core css -->

    <style>
        html,
        body {  
            padding: 10px 15px;
            height: 90%;      /* The html and body elements cannot have any padding or margin. */
        }

        #wrap {
            min-height: 100%;
            height: auto !important;
            height: 100%;
            /* Negative indent footer by it's height */
            margin: 0 auto -60px;
        }

        #push,
        #footer {
            height: 60px;
            
            padding: 35px 0 36px;
            border-top: 1px solid #e5e5e5;
            background-color: #f9f9f9;
        }
        #footer {        
            background-color: #f9f9f9;
        }

        @media (max-width: 767px) {
            #footer {
                margin-left: -20px;
                margin-right: -20px;
                padding-left: 20px;
                padding-right: 20px;
            }
        } 
    </style>
    
    <script>        
        var token = '<?php echo $this->eprint( $this->token ); ?>';              
        localStorage.setItem("token", token);
        console.log(token);
    </script>
    
    <!--<link href="//internalcdn.xexacttargetapps.com/fuelux-editor/nightlies/0.1.5-wip/latest/css/fuelux-editor.min.css" rel="stylesheet" />-->
    <link href="//internalcdn.xexacttargetapps.com/fuelux-editor/nightlies/0.1.7-wip/6-24-2013/css/fuelux-editor.min.css" rel="stylesheet" data-type="fuelux-editor"/>

    <!-- requirejs -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.5/require.min.js"></script>
    
    <link href="http://fuelcdn.com/fuelux-imh/2.3/css/fuelux-responsive.css" rel="stylesheet" /> <!-- FuelUX CDN link to responsive css --> 
    <link href="/css/main.css" rel="stylesheet" />
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
  <body data-spy="scroll" data-target=".subnav" data-offset="50">           
      
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
    <script src="http://fuelcdn.com/fuelux-imh/2.3/loader.min.js" type="text/javascript"></script> <!-- FuelUX CDN link to its javascript library -->       
    
    <div id="wrap">
