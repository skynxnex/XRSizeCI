<div id="content" class="span6">
	<div id="create_user_content">
		<h2>Skapa ny användare</h2>
		<?php echo validation_errors(); ?>
		<form id="create_user" method="post" class="form-vertical well" action="<?php echo base_url(); ?>user/create">
			<label for="name">Namn:</label>
			<input id="name" name="name" class="required span4" type="text" />
			<fieldset id="fieldset_username" class="control-group">
				<label for="user_name">Användarnamn:</label>
				<input id="user_name" name="user_name" class="required span4" type="text" />
			</fieldset>
				
			<span id="namecheck" class="pull-right"></span>
			<fieldset id="fieldset_email" class="control-group">
				<label for="email">Epost:</label>
				<input id="email" name="email" class="required span4" type="text" />
			</fieldset>
			<label for="pass">Lösenord:</label>
			<input id="pass" name="pass" class="required span4" type="password" />
			<label for="pass2">Verifiera lösnord:</label>
			<input id="pass2" name="pass2" class="required span4" type="password" />
			<!-- <p>Fyll i fältet nedan</p> -->
			<div id="captcha">
				<?php //echo $cap; ?>
			</div>
			<div class="box">
				<button class="btn btn-primary" name="create" type="submit" value="create">Skapa använare</button>
			</div>
		</form>
	</div>
</div>