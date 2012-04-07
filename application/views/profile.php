<div id="content" class="span6">
	<div id="profile">
		<h2>Din profil</h2>
		<div class="profilepic"><img src="http://www.gravatar.com/avatar/<?php echo $this->session->userdata('gravatar'); ?>?d=mm" alt="" /></div>
		<div class="infocontent">
			<p>
				<span class="span2">Användarnamn: </span> 
				<?php echo $info->user_name; ?></p>
			<p>
				<span class="span2">Namn: </span>
				<?php echo $info->name; ?>
			</p>
			<p>
				<span class="span2">Epost: </span>
				<?php echo $info->email; ?>
			</p>
			<div class="well">
				<a href="<?php echo base_url(); ?>user/edit"><button class="btn">Ändra i profil</button></a>
				<a href="<?php echo base_url(); ?>user/pass"><button class="btn" >Byta lösenord</button></a>
			</div>
		<p>För att ändra profilbild så görs det på <a href="http://www.gravatar.com">www.gravatar.com</a></p>
		</div>
	</div>
</div>
