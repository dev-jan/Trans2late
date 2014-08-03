<!DOCTYPE html>
<html>
<head>
	<title>Trans2late Login</title>
	
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Jan Bucher" />
	
	<link href="<?php echo WEBROOT;?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo WEBROOT;?>assets/css/global.css" rel="stylesheet" />
	<style type="text/css">
	 body {
	 	background-image: url('<?php echo WEBROOT;?>assets/images/loginBG.png');
	 }
	</style>
	
	
	<script src="<?php echo WEBROOT;?>assets/js/jquery.min.js"></script>
	<script src="<?php echo WEBROOT;?>assets/js/bootstrap.min.js"></script>
	
</head>
<body style="margin-top: 40px;">
	<div class="container" style="margin: auto; position: absolute: top: 50%;">
		<form action="login/check" method="post" class="form-signin" role="form" style="max-width: 250px; margin-left: auto; margin-right: auto; margin: ">
	        <h2 class="form-signin-heading" style="color: #CDCDCD">Login...</h2>
	        <input name="username" type="text" class="form-control" placeholder="Username..." required autofocus>
	        <input name="password" type="password" class="form-control" placeholder="Password..." style="margin-top: 10px;" required>
	        <label class="checkbox" style="color: #CDCDCD">
	          <input type="checkbox" value="remember-me" > Remember me
	        </label>
	        <?php if (isset($error)) {?>
	        	<span style="color:red;">Error: Login incorrect</span>
	        <?php }?>
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
	</div>