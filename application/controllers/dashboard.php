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
		}
	}

	private function splitDate($date) {
		$atoms = explode('-',$date);
		$year = $atoms[0];
		$month = str_replace('0', '', $atoms[1]);
		$day = $atoms[2];
		return array('year' => $year, 'month' => $month, 'day' => $day);
	}
}



/* End of file user.php */
/* Location: ./application/controllers/dashboard.php */

