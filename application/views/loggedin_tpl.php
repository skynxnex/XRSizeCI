<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>XRsize.me -- Din träningspepp i vardagen!</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dark.css" />
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.css" />
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery-ui.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<script src="js/jquery.ui.datepicker.validation.js" type="text/javascript"></script>
	<script src="js/jquery-confirm.js" type="text/javascript"></script>
	<script src="js/jquery.elastic.js" type="text/javascript"></script>
	<script src="js/error_mess.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
</head>

<body>
	<div id="wrapper">
		
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
		
		<div id="rightmenu" class="corners">
			<div id="peppheader"><h4>Peppbloggen</h4><p class="small">Senaste 10</p></div>
			<div id="eventblogg">
				<ul>
					<?php 
						// foreach($peppblog as $entry) {	
							// $name = $this->q->getName($entry['user_id']);
							// $returnvalue .= '<li><p>'.$entry['text'].'</p><p class="small">av '.$name.' den '.$entry['date'].'</p></li>';
							// $returnvalue .= '<hr width="95%" size="3"> ';
						// }
					?>
				</ul>
			</div>
			<div id="addblogg">
				<form action="" method="post">
					<fieldset>
						<label for="text">Skriv i bloggen:</label>
						<textarea rows="2" cols="1" name="text" id="blogginput" class="elasticinput"></textarea>
						<input name="blogg" type="submit" class="button buttonsmall elasticinput" value="Skicka" />
					</fieldset>
				</form>
			</div> // end addblogg
		<div id="footer" class="corners"><p>Copyright Pontus & Linda Alm</p></div>
	</div> <!-- end wrapper -->
</body>

</html>
