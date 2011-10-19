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
		$month = $atoms['1'];
		// $month = str_replace('0', '', $atoms[1]);
		$day = $atoms[2];
		return array('year' => $year, 'month' => $month, 'day' => $day);
	}
	
	function monthName($month) {
		$months = array(
			'01' 	=> 'Januari',
			'02' 	=> 'Februari',
			'03' 	=> 'Mars',
			'04'	=> 'April',
			'05'	=> 'Maj',
			'06'	=> 'Juni',
			'07'	=> 'Juli',
			'08'	=> 'Augusti',
			'09'	=> 'September',
			'10'	=> 'Oktober',
			'11'	=> 'November',
			'12'	=> 'December'
		);
		return $months[$month];
	}
	
	function trim_post_data($post) {
		foreach($post() as $field => $value) {
			$value = stripslashes($value);
		}
		return $post;
	}
	
	function get_last_inserted_id() {
		return $this->db->insert_id();
	}
}
