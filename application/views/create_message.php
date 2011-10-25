<div id="content" class="corners">
	<div id="message">
		<form id="createmessage" action="<?php echo base_url(); ?>message/save_message" method="post">
			<h3>Skapa meddelande</h3>
			<fieldset>
				<p>
					<label for="topicker">Till:</label>
					<select id="topicker" name="to_user_id">
						<?php						
						foreach($persons as $person){
							echo '<option value="' . $person['id'] . '">' . $person['user_name'] . '</option>';
						}					
						?>						
					</select>
				</p>
				<p>					
					<label for="subject">Ämne:</label>
					<input id="subject" class="required" type="text" name="subject" />
				</p>
				<p>					
					<label for="content2">Text:</label>
					<textarea id="content2" class="elasticinput required" name="content" rows="5" cols="100"></textarea>
				</p>				
				<p>
					<input class="button" type="submit" value="Skicka" />
				</p>
				<p>
					<!-- Vi hårdkodar in id 1, byt ut mot sessions id när login funkar -->
					<input type="hidden" name="from_user_id" value="1" />
					<input type="hidden" name="read" value="0" />
				</p>
			</fieldset>
		</form>
	</div>
</div>
