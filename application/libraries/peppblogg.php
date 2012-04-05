<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peppblogg {
	
	public function generate_peppblog() {
		$_SESSION['url'] = current_url();
		$CI =& get_instance();
		$blog = '';
		
		$CI->load->model('User_model');
		$groupId = $CI->User_model->getUserGroupId();
		if($groupId) {
			$CI->load->model('Peppblog_model');
			$results = $CI->Peppblog_model->get_last_blogs($groupId->group_id);
			
			foreach($results as $entry) {	
				$name = $entry['name'];
				$blog .= '<div class="peppbox"><p>'.$entry['text'].'</p><p class="small">av '.$name.' den '.$entry['date'].'</p></div>';
				// $blog .= '<tr><td><p>'.$entry['text'].'</p><p class="small">av '.$name.' den '.$entry['date'].'</p></td></tr>';
			}
		} else {
			$blog .= '<p>Du är inte medlem i någon grupp ännu!</p>';
		}
		return $blog;
	}

}
