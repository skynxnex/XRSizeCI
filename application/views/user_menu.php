<div class="row">
	<div id="navigation" class="span3 row">
		<ul class="nav nav-pills nav-stacked">
			<li <?php if(check_active_nav("event", "listing")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>event/listing">Träningar</a>
			</li>
			<li <?php if(check_active_nav("event", "add")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>event/add">Lägga till träning</a>
			</li>
			<li <?php if(check_active_nav("user", "goals")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>user/goals">Mål</a>
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
</div>