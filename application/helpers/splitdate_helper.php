<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('heading')) {
	function loggedin() {
		if(isset($_SESSION['user']) && $_SESSION['user'] == 1) {
			return true;
		}
		return false;
	}
}
