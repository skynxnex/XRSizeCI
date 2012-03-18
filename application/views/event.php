<div id="content" class="span6">
	<div id="addevent">
		<div id="trainpic"><img src="<?php echo base_url(); ?>images/training.png" alt="" /></div>
		<form id="adde" class="well" action="<?php echo base_url(); ?>event/add_or_update" method="post">
			<h3>Lägg till träningstillfälle</h3>
			<?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
			<fieldset>
				<p>Datum:</p>
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
					<option value="1">januari</option>
					<option value="2">februari</option>
					<option value="3">mars</option>
					<option value="4">april</option>
					<option value="5">maj</option>
					<option value="6">juni</option>
					<option value="7">juli</option>
					<option value="8">augusti</option>
					<option value="9">september</option>
					<option value="10">oktober</option>
					<option value="11">november</option>
					<option value="12">december</option>
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
