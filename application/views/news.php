<div id="content" class="corners">
	<?php
	foreach($news as $item) {
		$url = base_url().'images/'.$item['picture'];
		echo '<div class="info">
			<h3>'.$item['header'].'</h3>
			
			<div class="infopic"><img src="'.$url.'" alt="" /></div>
			<div class="infocontent">
				<p>'.$item['content'].'</p>
				<p class="small">Av '.$item['name'].' '.$item['date'].'</p>
			</div>
		</div>
		<div class="infodevider"></div>';
		
	} 
	?>
</div>
