<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}	

	public function index() {
		if(loggedin() ) {
			$this->load->model('events_model');
			$data['events'] = $this->events_model->get_last_events();
			$data['content'] = 'events';
			$this->load->view('template', $data);
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}

	public function success() {
		$data['content'] = 'success';
		$this->load->view('template', $data);
	}
}



/* End of file user.php */
/* Location: ./application/controllers/dashboard.php */

