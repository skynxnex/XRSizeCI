<div id="content" class="span6">
	<div id="profile">
		<h2>Uppdatera din profil</h2>
		<div class="profilepic"><img <?php echo 'src="../images/'.$info->profile_img.'"'; ?> alt="" /></div>
		<div class="infocontent">
			<form id="editprofile" method="post" class="well" action="<?php echo base_url(); ?>user/edit">
				<fieldset>
						<label for="user_name">Användarnamn:</label>
						<input type="text" id="user_name" class="disabled" disabled="" name="user_name" value="<?php echo $info->user_name; ?>" />
						<label for="email">E-post:</label>
						<input id="email" type="text" name="email" value="<?php echo $info->email; ?>" class="disabled" disabled=""/>
						<label for="name">Namn:</label>
						<input type="text" id="name" name="name" value="<?php echo $info->name; ?>" />
						<button class="btn" type="submit">Uppdatera</button>
				</fieldset>
			</form>
		</div>
	</div>
</div>