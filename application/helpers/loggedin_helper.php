<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('heading')) {
	function loggedin() {
		if($this->session->userdata('user') == 1) {
			return true;
		}
		return false;
	}
}
