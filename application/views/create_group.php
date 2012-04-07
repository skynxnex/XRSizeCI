<div id="content" class="span6">
	<h2>Skapa grupp</h2>
	<?php
		echo validation_errors();
	?>
	<div id"creategroup">
		<form id="group_create" class="form-vertical well" action="<?php echo base_url(); ?>group/create" method="post">
			<div class="box">
				<label for="name">Gruppnamn:</label>
				<input id="name" class="required" type="text" name="name" />
			</div>
			<div class="box">
				<label for="tag">Tagg:</label>
				<input id="tag" class="required" type="text" name="tag" />
			</div>
			<div class="box">
				<label for="desc">Beskrivning:</label>
				<textarea class="span4" id="desc" type="text" name="desc" /></textarea>
			</div>
			
			<div class="divider"></div>
			<div class="box">
				<button class="btn btn-primary" name="login" type="submit" value="login">Skapa grupp</button>
			</div>
			<div class="divider"></div>
		</form>
	</div>
</div>
