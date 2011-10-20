<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats extends CI_Controller {

	/**
	* 
	*/
	
	public function index() {
		$this->load->model('Stats_model');
		$data['stats'] = $this->Stats_model->get_user_stats();
		$data['content'] = 'mystats';
		$this->load->view('template', $data);
	}
	
}
