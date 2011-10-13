		<div id="rightmenu" class="corners">
			<div id="peppheader"><h4>Peppbloggen</h4><p class="small">Senaste 10</p></div>
			<div id="eventblogg">
				<ul>
					<?php 
						// foreach($peppblog as $entry) {	
							// $name = $this->q->getName($entry['user_id']);
							// $returnvalue .= '<li><p>'.$entry['text'].'</p><p class="small">av '.$name.' den '.$entry['date'].'</p></li>';
							// $returnvalue .= '<hr width="95%" size="3"> ';
						// }
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
		<div id="footer" class="corners"><p>Copyright Pontus & Linda Alm</p></div>
	</div> <!-- end wrapper -->
</body>

</html>
