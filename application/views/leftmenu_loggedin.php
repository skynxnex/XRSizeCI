
<div id="login" class="well row">
	<div class="profilepic">
		<img src="http://www.gravatar.com/avatar/<?php echo $this->session->userdata('gravatar'); ?>?d=mm" alt="" />
	</div>
	<div class="btn-group">
		<button class="btn"><?php echo $this->session->userdata('name'); ?></button>
	    <button class="btn dropdown-toggle" data-toggle="dropdown">
	    	<span class="caret"></span>
	    </button>
	    <ul class="dropdown-menu">
	    	<li><a href="<?php echo base_url(); ?>user">Min meny</a></li>
	    	<li></i><a href="<?php echo base_url(); ?>user/profile">Profil</a></li>
	    	<li class="divider"></li>
	    	<li><a href="<?php echo base_url(); ?>user/doLogout">Logga ut</a></li>
	    </ul>
	</div>
</div>
