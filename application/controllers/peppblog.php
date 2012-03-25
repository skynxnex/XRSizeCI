<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peppblog extends CI_Controller {

	/**
	* 
	*/
	
	public function save() {
		$this->form_validation->set_rules('text', 'Textrutan', 'required');
		$this->form_validation->set_message('required_r', '<div class="alert alert-error">%s kan inte vara tom!</div>');
		if ($this->form_validation->run() == FALSE) {
			redirect($this->session->userdata('url'));
		} else {
			$this->load->model('peppblog_model');
			$this->peppblog_model->save();
			redirect($this->session->userdata('url'));			
		}
	}
	
}
