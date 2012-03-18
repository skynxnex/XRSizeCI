<div id="content" class="span6">
	<h2>Senaste träningarna</h2>
	<div id="lastevents">
		<?php
			$output = "";
			foreach($events as $event){
				$output .= '<div id="'.$event['id'].'"class="span5 well">';
				$output .= '<p>'.$event['time'].'min '.$event['ename'].' av '.$event['name'];
				$output .= '<p>'.$event['date'].'<a href="#" class="btn pull-right btn-info">Kommentera</a></p>';
				$output .= '</div>';
				$output .= '<div class="divider"></div>';

			}
			echo $output;
		?>
	</div>
</div>
