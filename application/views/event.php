<?php
	if($action != 'new'){
		print_r( $event );
	}
?>
<div id="content" class="span6">
	<div id="addevent">
		<form id="adde" class="well" action="<?php echo base_url(); ?>event/add_or_update" method="post">
			<?php
				if($action == 'edit') {
					echo '<h3>Ändra träningstillfälle</h3>';
				} else {
					echo '<h3>Lägg till träningstillfälle</h3>';
				}
			?>
			<fieldset>
		<div id="trainpic" class="pull-right"><img src="<?php echo base_url(); ?>images/training.png" alt="" /></div>
				<p>Datum:</p>
		<div id="datepicker"></div>
				<select id="year" class="select" name="year">
					<?php 
					if($action == 'edit') {
						if($event['year'] == 2011 || date('Y') == 2011) {
							echo '<option selected="selected" value="2011">2011</option>';
						}
					} else {
						echo '<option value="2011">2011</option>';
					}
					if($action == 'edit') {
						if($event['year'] == 2012 || date('Y') == 2012) {
							echo '<option selected="selected" value="2012">2012</option>';
						}
					} else {
						if(date('Y') == 2012) {
							echo '<option selected="selected" value="2012">2012</option>';
						} else {
							echo '<option value="2012">2012</option>';
						}
					}
					if($action == 'edit') {
						if($event['year'] == 2013 || date('Y') == 2013) {
							echo '<option selected="selected" value="2013">2013</option>';
						}
					} else {
						echo '<option value="2013">2013</option>';
					}
						?>

				</select>
				<select id="month" class="select" name="month">
					<?php if($event['month'] == 1) { echo '<option selected="selected" value="01">januari</option>'; } else { echo '<option value="01">januari</option>'; } 
					if($event['month'] == 2) { echo '<option selected="selected" value="02">februari</option>'; } else { echo '<option value="02">februari</option>'; }
					if($event['month'] == 3) { echo '<option selected="selected" value="03">mars</option>'; } else { echo '<option value="03">mars</option>'; }
					if($event['month'] == 4) { echo '<option selected="selected" value="04">april</option>'; } else { echo '<option value="04">april</option>'; }
					if($event['month'] == 5) { echo '<option selected="selected" value="05">maj</option>'; } else { echo '<option value="05">maj</option>'; }
					if($event['month'] == 6) { echo '<option selected="selected" value="06">juni</option>'; } else { echo '<option value="06">juni</option>'; }
					if($event['month'] == 7) { echo '<option selected="selected" value="07">juli</option>'; } else { echo '<option value="07">juli</option>'; }
					if($event['month'] == 8) { echo '<option selected="selected" value="08">augusti</option>'; } else { echo '<option value="08">augusti</option>'; }
					if($event['month'] == 9) { echo '<option selected="selected" value="09">september</option>'; } else { echo '<option value="09">september</option>'; }
					if($event['month'] == 10) { echo '<option selected="selected" value="10">oktober</option>'; } else { echo '<option value="10">oktober</option>'; }
					if($event['month'] == 11) { echo '<option selected="selected" value="11">november</option>'; } else { echo '<option value="11">november</option>'; }
					if($event['month'] == 12) { echo '<option selected="selected" value="12">december</option>'; } else { echo '<option value="12">december</option>'; }
					?>
				</select>
				<select id="day" class="select" name="day">
					<?php 
						for($i=1; $i<=31;$i++) {
							if($action == 'edit') { 
								if($event['day'] == $i) { 
									echo "<option selected='selected' value='".$i."'>".$i."</option>";
								} else {
									echo "<option value='".$i."'>".$i."</option>";
								}
							} else {
								echo "<option value='".$i."'>".$i."</option>";
							}
						} 
					?>
				</select>
				<input id="id" class="hidden" name="id" type="text" <?php if($action == 'edit') { echo 'value="'.$event['id'].'"'; } ?> />
				<p>Antal minuter:
				<div id="output_time"></div>
				<div id="slider"></div>
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
