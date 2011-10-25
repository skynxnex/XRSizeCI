<div id="content" class="corners">
	<?php
	echo anchor('message/create_message', 'Skicka meddelande');
	foreach($messages as $message){
		echo '<div class="message">',
			 '<span class="read_'.$message['read'].'"> </span>',
			 '<p>Ämne: <a href="message/read_message/2">' . $message['subject'] . '</a></p>',
			 '<p>Från: ' . $message['from_user_id'] . '</p>',
			 '<p>Skickat ' . $message['ts'] . '</p>',			 
			'</div>';
	}	
	?>
</div>
