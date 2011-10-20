<div id="topmenu" class="corners">
			<div id="topmenuitems">
				<ul>
					<li><a href="<?php echo base_url(); ?>news">Nyheter</a></li>
					<?php if (loggedin()) { 
						echo '<li><a href="'.base_url().'event/listlast">Senaste</a></li>';
					}
					?>
					<li><a href="<?php echo base_url(); ?>about">Om</a></li>
				</ul>
			</div>
			<div id="slogan">
				<span><i>Din träningspepp i vardagen!</i></span>
			</div>
		</div>
