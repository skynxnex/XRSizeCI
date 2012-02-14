
<div id="content" class="span6">
	<div id="stats">
		<div id="statspic"><img src="<?php echo base_url(); ?>images/statistik.png" alt="" /></div>
			<div id="weekdata" class="well">
				<?php foreach($stats as $week) {
					echo '<p>Poäng för vecka <a href="'.base_url().'event/week/'.$week['id'].'/'.$week['week'].'">'.$week['week'].'</a> är '.$week['points'].' av totalt 180.</p>';
				}
				?>
			</div>
		</div>
	</div>
</div>	
