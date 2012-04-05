<div id="topmenu" class="row"> 
	<div class="navbar">
		<div id="topmenuitems" class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo base_url(); ?>dashboard">XRSize.me</a>
				<ul class="nav">
					<li <?php if(check_active_nav("news", "")) { echo 'class="active"'; } ?>><a href="<?php echo base_url(); ?>news">Nyheter</a></li>
					<?php if (loggedin()) { $active = "";
							if(check_active_nav("event", "listlast")) { $active = "active"; }
						echo '<li class="'.$active.'"><a href="'.base_url().'event/listlast">Senaste</a></li>';
						$active = "";
						if(check_active_nav("dashboard", "")) { $active = "active"; }
						echo '<li class="'.$active.'"><a href="'.base_url().'dashboard">Snabbval</a></li>';
					}
					?>
					<li class="<?php if(check_active_nav("about", "")) { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>about">Om</a></li>
				</ul>
				<form class="navbar-search pull-right search">
	    			<input type="text" class="search-query disabled" placeholder="Sök (funkar inte än)">
	    		</form>
			</div>
		</div>
	</div>
	<div id="slogan" class="alert alert-info">
		<span><i>Din träningspepp i vardagen!</i></span>
		<span id="miniEvent" class="pull-right"></span>
	</div>
</div>
