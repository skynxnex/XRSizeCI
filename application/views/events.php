<?php
	$list = '<div id="content" class="span6">';
	switch ($this->uri->segment(3)) {
		case 'listlast':
			$list .= '<h2>Senaste träningarna!</h2>';
		break;
	}
	if(isset($pages)) { 
		$list .= $pages; 
	}
		
	foreach($events as $event) {
		$name = '';		
		$list .= '
			<div class="event">
				<div class="date">
					<p class="calendar">'.$event['day'].'<em>'.monthName($event['month']).'</em></p>'.$name.'
					<p class="year"><strong>'.$event['year'].'</strong></p>
				</div>
				<div class="data">
					<h4>'.$event['time'].'min '.strtolower($event['ename']).'</h4>
					<p><strong>Kommentar:</strong> '.$event['comment'].'</p>
					<p><strong>Andras kommentarer:</strong> (Kommer senare)</p>
				</div>
				';
		if($event['user_id'] == $this->session->userdata('id') ) {
			$list .= '<div class="well">
				<a href="'.base_url().'event/edit/'.$event['id'].'"><button class="btn" >Ändra</button></a>
				<a href="'.base_url().'event/delete/'.$event['id'].'"><button class="btn clickable" >Ta bort</button></a>
				</div>';
		}
		$list .= '<div class="infodevider"></div></div>
					';
	}
	echo $list;
	if(isset($pages)) { echo $pages; }
	echo '</div>';
