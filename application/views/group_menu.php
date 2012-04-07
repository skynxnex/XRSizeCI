<div class="row">
	<div id="navigation" class="span3 row">
		<ul class="nav nav-pills nav-stacked">
			<li <?php if(check_active_nav("group", "members")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>group/members">Medlemmar</a>
			</li>
			<li <?php if(check_active_nav("group", "goals")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>group/goals">Mål</a>
			</li>
			<li <?php if(check_active_nav("group", "challenges")) { echo 'class="active"'; } ?>>
				<a href="<?php echo base_url(); ?>group/challenges">Utmaningar</a>
			</li>
			<?php 
				if(group_admin()) { ?>
					<li <?php if(check_active_nav("group", "admin")) { echo 'class="active"'; } ?>>
						<a href="<?php echo base_url(); ?>group/admin">Admin</a>
					</li>

			<?php	} ?>
		</ul>
	</div>
</div>