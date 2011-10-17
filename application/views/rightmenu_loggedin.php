<div id="rightmenu" class="corners">
			<div id="peppheader"><h4>Peppbloggen</h4><p class="small">Senaste 10</p></div>
			<div id="eventblogg">
				<ul>
					<?php 
						echo $this->peppblogg->generate_peppblog();
					?>
				</ul>
			</div>
			<div id="addblogg">
				<form action="" method="post">
					<fieldset>
						<label for="text">Skriv i bloggen:</label>
						<textarea rows="2" cols="1" name="text" id="blogginput" class="elasticinput"></textarea>
						<input name="blogg" type="submit" class="button buttonsmall elasticinput" value="Skicka" />
					</fieldset>
				</form>
			</div> <!-- end addblogg  -->
		</div> <!-- end rightmenu -->
