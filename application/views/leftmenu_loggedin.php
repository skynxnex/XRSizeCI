<div id="leftmenu" class="span3">
	<div id="login" class="well">
		<p>Inloggad som:<i> <?php echo $this->session->userdata('name'); ?></i></p>
		<form id="logout" method="post" action="<?php echo base_url(); ?>user/login">
			<button class="btn btn-warning" name="logout" type="submit" value="logout">Logga ut</button>
		</form>
	</div>
	<div id="navigation" class="span3">
		<ul class="nav nav-pills nav-stacked">
			<li <?php if(check_active_nav("user", "profile")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>user/profile">Min profil</a>
			</li>
			<li <?php if(check_active_nav("event", "listing")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>event/listing">Mina träningar</a>
			</li>
			<li <?php if(check_active_nav("event", "add")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>event/add">Lägga till träning</a>
			</li>
			<li <?php if(check_active_nav("stats", "")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>stats">Egen statistik</a>
			</li>
			<li <?php if(check_active_nav("stats", "group")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>stats/group">Vänners Statistik</a>
			</li>
			<li <?php if(check_active_nav("eventtype", "")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>eventtype">Träningsformer</a>
			</li>
			<li <?php if(check_active_nav("stats", "allstats")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>stats/allstats">Allmän statistik</a>
			</li>
			<li <?php if(check_active_nav("stats", "stars")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>stats/stars">Stjärnligan</a>
			</li>
		</ul>
	</div>
	<!--
	<div id="" class="menu coloredmenu corners">
		<ul>
			<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Person-black.png" alt="Profil" /><a href="<?php echo base_url(); ?>user/profile">Min profil</a></li>
			<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Heart.png" alt="Träningar" /><a href="<?php echo base_url(); ?>event/listing">Mina träningar</a></li>
			<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Heart-add.png" alt="Lägga till träningar" /><a href="<?php echo base_url(); ?>event/add">Lägga till träning</a></li>
			<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Person.png" alt="Statistik" /><a href="<?php echo base_url(); ?>stats">Egen statistik</a></li>
			<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Person-group.png" alt="Grupp statistik" /><a href="<?php echo base_url(); ?>stats/group">Vänners Statistik</a></li>
			<li><img src="<?php echo base_url(); ?>images/eleganticons/images/List.png" alt="Träningsformer" /><a href="<?php echo base_url(); ?>eventtype">Träningsformer</a></li>
			<li><img src="<?php echo base_url(); ?>images/eleganticons/images/Paper.png" alt="Allmän statistik" /><a href="<?php echo base_url(); ?>stats/allstats">Allmän statistik</a></li>
			<li><img src="<?php echo base_url(); ?>images/star.png" alt="Stjärnligan" /><a href="<?php echo base_url(); ?>stats/stars">Stjärnligan</a></li>
		</ul>
	</div>
	-->
</div>
