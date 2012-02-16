<div id="topmenu" class="row"> 
	<div class="navbar">
		<div id="topmenuitems" class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">XRSize.me</a>
				<ul class="nav">
					<li <?php if(check_active_nav("news", "")) { echo 'class="active"'; } ?>><a href="<?php echo base_url(); ?>news">Nyheter</a></li>
					<?php if (loggedin()) { 
						echo '<li><a href="'.base_url().'event/listlast">Senaste</a></li>';
					}
					?>
					<li><a href="<?php echo base_url(); ?>about">Om</a></li>
				</ul>
				<form class="navbar-search pull-right">
	    			<input type="text" class="search-query" placeholder="Sök i siten här">
	    		</form>
			</div>
		</div>
	</div>
	<div id="slogan" class="alert alert-info">
		<span><i>Din träningspepp i vardagen!</i></span>
	</div>
</div>
