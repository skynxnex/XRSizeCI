<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Debug extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}	

	public function index() {
		$data['content'] = 'debug';
		$this->load->view('template', $data);
	}

	public function info() {
		echo phpinfo();
	}
}



/* End of file debug.php */
/* Location: ./application/controllers/dashboard.php */

