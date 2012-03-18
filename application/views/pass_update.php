<div id="content" class="span6">
	<h2>Byte av lösenord</h2>
	<?php
		// echo validation_errors();
	?>
	<form id="changepass" method="post" class="well" action="<?php echo base_url(); ?>user/pass">
		<fieldset>
			<label for="pass1">Gammalt lösenord:</label>
			<input type="password" value="<?php echo set_value('pass1'); ?>" id="pass1" name="pass1" class="span4"/>
			<?php echo form_error('matches'); ?>
			<?php echo form_error('pass1'); ?>
			<label for="pass2">Nytt lösenord:</label>
			<input type="password" value="<?php echo set_value('pass2'); ?>" id="pass2" name="pass2" class="span4"/>
			<?php echo form_error('pass2'); ?>
			<label for="pass2again">Upprepa nytt lösenord:</label>
			<input type="password" value="<?php echo set_value('pass2again'); ?>" id="pass2again" name="pass2again" class="span4"/>
			<?php echo form_error('pass2again'); ?>
		</fieldset>
		<button class="btn" type="submit">Uppdatera</button>
	</form>
</div>
