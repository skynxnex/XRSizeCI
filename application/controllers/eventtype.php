<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventtype extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}	

	public function index() {
		$data['content'] = 'empty_content';
		$this->load->view('template', $data);
	}
}



/* End of file user.php */
/* Location: ./application/controllers/dashboard.php */

