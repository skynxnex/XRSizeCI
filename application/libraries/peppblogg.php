<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peppblogg {
	
	public function generate_peppblog() {
		$_SESSION['url'] = current_url();
		$CI =& get_instance();
		$blog = '';
		
		$CI->load->model('User_model');
		$groupId = $CI->User_model->getUserGroupId();
				
		$CI->load->model('Peppblog_model');
		$results = $CI->Peppblog_model->get_last_blogs($groupId->group_id);
		
		foreach($results as $entry) {	
			$name = $entry['name'];
			$blog .= '<li><p>'.$entry['text'].'</p><p class="small">av '.$name.' den '.$entry['date'].'</p></li>';
			$blog .= '<hr width="95%" size="3"> ';
		}
		return $blog;
	}

}
