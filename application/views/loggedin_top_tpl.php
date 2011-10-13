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
		<div id="leftmenu" class="corners">
			<div id="login">
				<p>Inloggad som:<br /> '.$name.'</p>
				<form id="logout" method="post" action="">
					<input class="button" name="logout" type="submit" value="Logga ut" />
				</form>
			</div>
			<div id="ul" class="menu coloredmenu corners">
				<ul>
					<li><img src="'.WEB_ROOT.'css/images/eleganticons/images/Person-black.png" alt="Profil" /><a href="'.WEB_ROOT.'user/profile">Min profil</a></li>
					<li><img src="'.WEB_ROOT.'css/images/eleganticons/images/Heart.png" alt="Träningar" /><a href="'.WEB_ROOT.'event/events">Mina träningar</a></li>
					<li><img src="'.WEB_ROOT.'css/images/eleganticons/images/Heart-add.png" alt="Lägga till träningar" /><a href="'.WEB_ROOT.'event/add">Lägga till träning</a></li>
					<li><img src="'.WEB_ROOT.'css/images/eleganticons/images/Person.png" alt="Statistik" /><a href="'.WEB_ROOT.'stats/stats">Egen statistik</a></li>
					<li><img src="'.WEB_ROOT.'css/images/eleganticons/images/Person-group.png" alt="Grupp statistik" /><a href="'.WEB_ROOT.'stats/group">Vänners Statistik</a></li>
					<li><img src="'.WEB_ROOT.'css/images/eleganticons/images/List.png" alt="Träningsformer" /><a href="'.WEB_ROOT.'eventtype">Träningsformer</a></li>
					<li><img src="'.WEB_ROOT.'css/images/eleganticons/images/Paper.png" alt="Allmän statistik" /><a href="'.WEB_ROOT.'stats/allstats">Allmän statistik</a></li>
					<li><img src="'.WEB_ROOT.'css/images/star.png" alt="Stjärnligan" /><a href="'.WEB_ROOT.'stats/stars">Stjärnligan</a></li>
					'.$admin.'
				</ul>
			</div>
		</div>
