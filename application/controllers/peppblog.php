<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peppblog extends CI_Controller {

	/**
	* 
	*/
	
	public function save() {
		$this->load->model('peppblog_model');
		$this->peppblog_model->save();
		redirect($this->session->userdata('url'));			
	}
	
}
