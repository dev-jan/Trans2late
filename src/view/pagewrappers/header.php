<!DOCTYPE html>
<html>
<head>
	<title>Trans2late</title>
	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Jan Bucher" />
	
	<link href="<?php echo WEBROOT;?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo WEBROOT;?>assets/css/global.css" rel="stylesheet" />
	
	<script src="<?php echo WEBROOT;?>assets/js/jquery.min.js"></script>
	<script src="<?php echo WEBROOT;?>assets/js/bootstrap.min.js"></script>
		
</head>
<body>
<div id="header" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div id="header-wrapper">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	    	<span class="sr-only">Toggle navigation</span>
	    	<span class="icon-bar"></span>
	    	<span class="icon-bar"></span>
	    	<span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="<?php echo WEBROOT;?>">Trans2Late</a>
	    <div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
	      		<li class="active"><a href="<?php echo WEBROOT;?>">Main</a></li>
	      		
	      		<li class="dropdown">
		        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Projects <b class="caret"></b></a>
			        <ul class="dropdown-menu" id="menuProjectsDropdown" role="menu" aria-labelledby="dLabel">
			        	<li><a href="<?php echo WEBROOT;?>project/time2work">Time2Work</a></li>
			        	<li><a href="<?php echo WEBROOT;?>project/endlessweb">EndlessWeb</a></li>
			        </ul>
		      	</li>
	      		
	      		<li class="dropdown">
		        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Administration <b class="caret"></b></a>
			        <ul class="dropdown-menu" id="menuAdminDropdown" role="menu" aria-labelledby="dLabel">
			        	<li><a href="<?php echo WEBROOT;?>useradministration">Users</a></li>
			        	<li><a href="<?php echo WEBROOT;?>groupadministration">Groups</a></li>
			        	<li><a href="<?php echo WEBROOT;?>projectadministration">Projects</a></li>
			        	<li class="divider"></li>
			        	<li><a href="<?php echo WEBROOT;?>settings">Settings</a></li>
			        </ul>
		      	</li>
	      		
	      	</ul>
			
		 	<ul class="nav navbar-nav navbar-right">
		      	<li class="dropdown">
		        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $nameOfUser;?><b class="caret topleftdropdown"></b></a>
			        <ul class="dropdown-menu" id="menuUserDropdown" role="menu" aria-labelledby="dLabel">
			        	<li><a href="<?php echo WEBROOT;?>login/logout">Logout</a></li>
			        </ul>
		      	</li>
		    </ul>
		</div>
	</div>
</div>
<div id="main">