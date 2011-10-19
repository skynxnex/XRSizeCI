<div id="content" class="corners">
	<div id="addevent">
		<div id="trainpic"><img src="<?php echo base_url(); ?>images/training.png" alt="" /></div>
		<form id="adde" action="<?php echo base_url(); ?>event/add" method="post">
			<h3>Lägg till träningstillfälle</h3>
			<fieldset>
				<label for="datepicker">Datum:</label>
				<p><input id="datepicker" class="dpDate required" type="text" name="date" /></p>
				<p>Antal minuter:
					<p><select id="time" name="time">
						<option value="30">30</option>
						<option value="45">45</option>
						<option value="60">60</option>
						<option value="75">75</option>
						<option value="90">90</option>
					</select></p>
				</p>';
				<label for="type">Träningstyp:</label>
				<p><select id="type" name="eventtype_id">
				<?php foreach($eventtypes as $eventtype) {
					echo '<option value="'.$eventtype['id'].'">'.$eventtype['name'].'</option>';
				}							
				?>
				</select><p>
				<p>Eller lägg till egen:</p><input id="neweventtype" name="neweventtype" />
				<p>Kommentar:</p><textarea class="elasticinput" rows="2" cols="40" id="comment"name="comment"></textarea>
				<p><input class="button" name="addevent" type="submit" value="Skicka" /></p>
			</fieldset>
		</form>
	</div>
</div>
