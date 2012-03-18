<div id="content" class="span6">
	<div id="create_user_content">
		<h2>Skapa ny användare</h2>
		<?php echo validation_errors(); ?>
		<form id="create_user" method="post" class="form-vertical well" action="<?php echo base_url(); ?>user/create">
			<label for="name">Namn:</label>
			<input id="name" name="name" class="required span4" type="text" />
			<label for="name">Användarnamn:</label>
			<input id="uname" name="uname" class="required span4" type="text" />
			<label for="name">Epost:</label>
			<input id="email" name="email" class="required span4" type="text" />
			<label for="name">Lösenord:</label>
			<input id="pass" name="pass" class="required span4" type="password" />
			<label for="name">Verifiera lösnord:</label>
			<input id="pass2" name="pass2" class="required span4" type="password" />
			<p>Fyll i fältet nedan</p>
			<div id="captcha">
				<?php echo $cap; ?>
			</div>
			<div class="box">
				<button class="btn btn-primary" name="create" type="submit" value="create">Skapa använare</button>
			</div>
		</form>
	</div>
</div>