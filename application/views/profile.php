<div id="content" class="span6">
	<div id="profile">
		<h2>Din profil</h2>
		<div class="profilepic"><img src="<?php echo base_url(); ?>images/<?php echo $info->profile_img ?>" alt="" /></div>
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
		</div>
	</div>
</div>
