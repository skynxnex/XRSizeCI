<div id="content" class="span6">
	<div id="addevent">
		<div id="trainpic"><img src="<?php echo base_url(); ?>images/training.png" alt="" /></div>
		<form id="adde" class="well" action="<?php echo base_url(); ?>event/add" method="post">
			<h3>Lägg till träningstillfälle</h3>
			<fieldset>
				<label for="datepicker">Datum:</label>
				<p><input id="datepicker" class="dpDate required" type="text" name="date" <?php if($action == 'edit') { echo 'value="'.$event['date'].'"';} ?> /></p>
				<p>Antal minuter:
					<p><select id="time" name="time">
						<option <?php if($action == 'edit') { if($event['time'] == 30) { echo 'selected="selected"'; } } ?> value="30">30</option>
						<option <?php if($action == 'edit') { if($event['time'] == 45) { echo 'selected="selected"'; } } ?> value="45">45</option>
						<option <?php if($action == 'edit') { if($event['time'] == 60) { echo 'selected="selected"'; } } ?> value="60">60</option>
						<option <?php if($action == 'edit') { if($event['time'] == 75) { echo 'selected="selected"'; } } ?> value="75">75</option>
						<option <?php if($action == 'edit') { if($event['time'] == 90) { echo 'selected="selected"'; } } ?> value="90">90</option>
					</select></p>
				</p>
				<label for="type">Träningstyp:</label>
				<p><select id="type" name="eventtype_id">
				<?php foreach($eventtypes as $eventtype) {
					$selected = "";
					if($event['eventtype_id'] == $eventtype['id']) {
						$selected = 'selected="selected"';
					}
					echo '<option '.$selected.' value="'.$eventtype['id'].'">'.$eventtype['name'].'</option>';
				}							
				?>
				</select><p>
				<p>Eller lägg till egen:</p><input class="span5" id="neweventtype" name="neweventtype" />
				<p>Kommentar:</p><textarea class="elasticinput span5" rows="4" cols="60" id="comment"name="comment"><?php if($action == 'edit') { echo $event['comment']; } ?></textarea>
				<p><input class="btn" name="addevent" type="submit" value="Skicka" /></p>
			</fieldset>
		</form>
	</div>
</div>
