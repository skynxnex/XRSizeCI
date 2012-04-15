<div id="content" class="span6">
		<h2>Nytt mål</h2>
	<div class="row" id="newgoal">
		<div id="dates">
			<div class="span3">
				<p>Från:</p>
				<div id="fromdate"></div>
			</div>
			<div class="span3">
				<p>Till:</p>
				<div id="todate"></div>
			</div>
		</div>
		<div class="infodevider"></div>
		<div class="controls" id="goaltype">
			<label class="checkbox" >
				<input id="hourschoose" type="checkbox" />
				Träningstid:
			</label>
			<div id="hours">
				<p>Antal timmar</p>
				<input type="text" />
			</div>
				
			<label class="checkbox" >
				<input id="timeschoose" class="checkbox" type="checkbox" />
				Träningstillfällen
			</label>
			<div id="times">
				<p>Antal träningstillfällen</p>
				<input type="text" />
			</div>
		</div>
		<div class="infodevider"></div>
		<div>
			<h2>Utmaning?</h2>
			
			<div class="controls">
				<label class="radio">
				<input id="yes" type="radio" value="yes" name="optionsRadios">
				Ja
				</label>
				<label class="radio">
				<input id="no" type="radio" checked="" value="no" name="optionsRadios">
				Nej
				</label>
				<div id="name_group">
					<p>Namn eller grupp</p>
					<input type="text" />
				</div>
			</div>
			<div class="divider"></div>
			<div class="box">
				<button class="btn" name="new_goal" type="submit" value="new_goal">Lägg till nytt mål</button>
			</div>
			<div class="divider"></div>
		</div>
	</div>
	<form class="hidden">
		<input type="text" id="start" name="start" />
		<input type="text" id="stop" name="stop" />
	</form>
</div>
