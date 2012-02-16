<?php

	$this->load->view('top');
	$this->load->view('banner');
	$this->load->view('top_menu');
	$this->load->view('row_start');

	if(loggedin()) {
		$this->load->view('leftmenu_loggedin');
	}else {
		$this->load->view('leftmenu_login');
	}
	
	$this->load->view($content);
	
	if(loggedin()) {
		$this->load->view('rightmenu_loggedin');
	} else {
		$this->load->view('rightmenu_login');
	}
	
	$this->load->view('row_end');
	$this->load->view('footer');
	$this->load->view('bottom');
