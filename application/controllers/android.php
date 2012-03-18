<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Android extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}	

	public function index() {
		if($this->input->post()) {
			
		}
		$this->load->model('events_model');
		$result = $this->events_model->getLastEvent();
		echo json_encode($result);
	}
	
}



/* End of file android.php */
/* Location: ./application/controllers/android.php */

