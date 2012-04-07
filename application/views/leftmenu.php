<?php
$this->load->view('leftmenu_start');

if(loggedin()) {
	$this->load->view('leftmenu_loggedin');
	$this->load->view($this->session->userdata('menu'));
}else {
	$this->load->view('leftmenu_login');
}
$this->load->view('leftmenu_end');

?>