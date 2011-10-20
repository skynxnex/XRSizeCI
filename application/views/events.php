<?php
$list = '<div id="content" class="corners"><h2>Senaste träningarna!</h2>'; if(isset($pages)) { echo $pages; }

foreach($events as $event) {
	$splitdate = splitDate($event['date']);
	$list .= '
		<div class="event">
			<h3>Av '.$event['uname'].'</h3>
			<p class="calendar">'.$splitdate['day'].'<em>'.monthName($splitdate['month']).'</em></p>
			<p>Träningstid: '.$event['time'].'min.</p>
			<p>Träningstyp: '.$event['ename'].'</p>
			<p>Egen Kommentar: '.$event['comment'].'</p>';
	if($event['uid'] == $_SESSION['id'] ) {
		$list .= '<p>
			<a href="event/edit/'.$event['id'].'"><button class="button buttonsmall" >Ändra</button></a>
			<a href="event/delete/'.$event['id'].'"><button class="button clickable buttonsmall" >Ta bort</button></a>
			</p>';
	}
	$list .= '</div>
				<br /><hr style="float:left;" width="100%" size="3" /><br />';
}
echo $list;
if(isset($pages)) { echo $pages; }
echo '</div>';
