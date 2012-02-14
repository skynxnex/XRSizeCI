<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		if($this->input->post()) {
			$this->input->xss_clean($this->input->post());
			print_r($this->input->post());
		}
	}
	
	public function post() {
		$this->load->view('testform');
	}
}
