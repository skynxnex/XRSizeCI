<div id="content" class="span6">
	<h4>Debugging</h4>
	<?php 
		echo "Cookie set: ";
		echo $this->session->userdata('cookie'); 
		echo '<br />';
		echo "User agent: ";
		echo $this->session->userdata('user_agent');
		echo '<br />';
		echo "Ip-adress: ";
		echo $this->session->userdata('ip_address');
		echo '<br />';
		echo "last activity: ";
		echo $this->session->userdata('last_activity');
		echo '<br />';
		echo "Id: ";
		echo $this->session->userdata('id');
		echo '<br />';
		echo "Cookie username: ";
		echo $this->input->cookie('username');
		echo '<br />';
		echo "Cookie pass: ";
		echo $this->input->cookie('password');
		echo '<br />';
		echo "Admin :";
		echo $this->session->userdata('id');
	?>
</div>