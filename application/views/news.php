<div id="content" class="span6">
	<?php
		foreach($news as $item) {
			$url = base_url().'images/'.$item['picture'];
			echo '<div class="info">
				<h3>'.$item['header'].'</h3>
				<div class="infopic"><img src="'.$url.'" alt="'.$item['picture'].'" /></div>
				<div class="infocontent">
					'.$item['content'].'
					<p class="small">Av '.$item['user_name'].' '.$item['date'].'</p>
				</div>
			</div>
			<div class="infodevider"></div>';
		} 
	?>
</div>
