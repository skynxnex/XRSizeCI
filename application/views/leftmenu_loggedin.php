<div id="leftmenu" class="corners">
			<div id="login">
				<p>Inloggad som:<br /><?php echo $_SESSION['name'] ?></p>
				<form id="logout" method="post" action="<?php echo base_url(); ?>user/login">
					<input class="button" name="logout" type="submit" value="Logga ut" />
				</form>
			</div>
			<div id="ul" class="menu coloredmenu corners">
				<ul>
					<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Person-black.png" alt="Profil" /><a href="<?php echo base_url(); ?>user/profile">Min profil</a></li>
					<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Heart.png" alt="Träningar" /><a href="<?php echo base_url(); ?>event/listing">Mina träningar</a></li>
					<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Heart-add.png" alt="Lägga till träningar" /><a href="<?php echo base_url(); ?>event/add">Lägga till träning</a></li>
					<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Person.png" alt="Statistik" /><a href="<?php echo base_url(); ?>stats/stats">Egen statistik</a></li>
					<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Person-group.png" alt="Grupp statistik" /><a href="<?php echo base_url(); ?>stats/group">Vänners Statistik</a></li>
					<li><img src="<?php echo base_url(); ?>images/eleganticons/images/List.png" alt="Träningsformer" /><a href="<?php echo base_url(); ?>eventtype">Träningsformer</a></li>
					<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Paper.png" alt="Allmän statistik" /><a href="<?php echo base_url(); ?>stats/allstats">Allmän statistik</a></li>
					<li><img src="<?php echo base_url(); ?>images/star.png" alt="Stjärnligan" /><a href="<?php echo base_url(); ?>stats/stars">Stjärnligan</a></li>
				</ul>
			</div>
		</div>
