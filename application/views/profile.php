<div id="content" class="span6">
	<div id="profile">
		<h2>Din profil</h2>
		<div class="profilepic"><img src="<?php echo base_url(); ?>images/<?php echo $info->profile_img ?>" alt="" /></div>
		<div class="infocontent"><p>Ditt användarnamn är: <?php echo $info->user_name; ?></p><p>Ditt namn är: <?php echo $info->name; ?></p><p>Din epost är: <?php echo $info->email; ?></p>
			<a href="<?php echo base_url(); ?>user/edit"><button class="btn">Ändra i profil</button></a>
			<a href="<?php echo base_url(); ?>user/pass"><button class="btn" >Byta lösenord</button></a>
		</div>
	</div>
</div>
