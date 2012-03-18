
	<div id="rightmenu" class="span3">
		<div id="peppheader"><h3>Peppbloggen</h3><h6>Senaste 10</h6></div>
		<div id="eventblogg">
			<table class="table table-striped">
				<tbody>
				<?php 
					echo $this->peppblogg->generate_peppblog();
				?>
				</tbody>
			</table>
		</div>
		<div id="addblogg" class="well">
			<form action="<?php echo base_url(); ?>peppblog/save" method="post">
				<fieldset>
					<label for="text">Skriv i bloggen:</label>
					<textarea rows="2" cols="1" name="text" id="blogginput" class="elasticinput"></textarea>
					<input name="blogg" type="submit" class="btn" value="Skicka" />
				</fieldset>
			</form>
		</div> <!-- end addblogg  -->
	</div> <!-- end rightmenu -->
