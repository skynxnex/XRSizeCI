<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>XRsize.me -- Din träningspepp i vardagen!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dark.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css" />
	
	<script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery-ui.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.validate.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.ui.datepicker.validation.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery-confirm.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.elastic.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/error_mess.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/script.js" type="text/javascript"></script>
</head>

<body>
	<div id="wrapper">
		<div id="banner" class="corners">
			<div id="slider">
				<ul>
					<li><h1>Nån cool info om sidan!</h1></li>
					<li><h1>Mer cool info om sidan!</h1></li>
					<li><h1>Ännu mera cool info om sidan!</h1></li>					
				</ul>		
			</div>
		</div>
		<div id="topmenu" class="corners">
			<div id="topmenuitems">
				<ul>
					<li><a href="'.WEB_ROOT.'">Hem</a></li>
					<li><a href="'.WEB_ROOT.'?action=about">Om</a></li>
				</ul>
			</div>
			<div id="slogan">
				<span><i>Din träningspepp i vardagen!</i></span>
			</div>
		</div>
		<div id="leftmenu">
			<div id="login">
				<p class="red">Falaktigt användarnamn eller lösenord</p>
				<form id="loginform" action="" method="post">
					<div class="box">
						<label for="uname">Användarnamn:</label>
						<input id="uname" class="required" type="text" name="uname" />
					</div>
					<div class="box">
						<label for="password">Lösenord:</label>
						<input id="password" type="password" name="pass" class="required" />
					</div>
					<div class="box">
						Kom ihåg mig: <input type="checkbox" name="rememberme" value="1">
					</div>
					<div class="box">
						<input class="button" name="login" type="submit" value="Logga in" />
					</div>
				</form>
			</div>
		</div>
