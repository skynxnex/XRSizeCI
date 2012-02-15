<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats extends CI_Controller {

	/**
	* 
	*/
	
	public function index() {
		if(loggedin()){
			$this->load->model('Stats_model');
			$data['stats'] = $this->Stats_model->get_user_stats();
			$data['content'] = 'mystats';
			$this->load->view('template', $data);
		} else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna se den delen.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}

	public function group() {
		if(loggedin()) {
			$data['content'] = 'empty_content';
			$this->load->view('template', $data);
		} else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna se den delen.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}

	public function allstats() {
		if(loggedin()) {
			$data['content'] = 'empty_content';
			$this->load->view('template', $data);
		}else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna se den delen.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}

	public function stars() {
		if(loggedin()) {
			$data['content'] = 'empty_content';
			$this->load->view('template', $data);
		} else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna se den delen.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}
	
}
