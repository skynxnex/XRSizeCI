<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('heading')) {

	function loggedin() {
		if(isset($_SESSION['user']) && $_SESSION['user'] == 1) {
			return true;
		}
		return false;
	}
	
	function splitDate($date) {
		$atoms = explode('-',$date);
		$year = $atoms[0];
		$month = str_replace('0', '', $atoms[1]);
		$day = $atoms[2];
		return array('year' => $year, 'month' => $month, 'day' => $day);
	}
	
	function monthName($month) {
		$months = array(
			1 	=> 'Januari',
			2 	=> 'Februari',
			3 	=> 'Mars',
			4	=> 'April',
			5	=> 'Maj',
			6	=> 'Juni',
			7	=> 'Juli',
			8	=> 'Augusti',
			9	=> 'September',
			10	=> 'Oktober',
			11	=> 'November',
			12	=> 'December'
		);
		return $months[$month];
	}
}
