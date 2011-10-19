<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	/**
	* 
	*/
	
	function __construct() {
		parent::__construct();
	}
	
	public function add() {
		if(loggedin() ) {
			if($this->input->post()) {
				$this->load->model('Events_model');
				$_POST['user_id'] = $_SESSION['id'];
				$_POST['week'] = $this->Events_model->calculate_week();
				if($this->input->post('neweventtype') != "") {
					$result = $this->Events_model->new_eventtype();
					if($result) {
						$_POST['eventtype_id'] = get_last_inserted_id();
					}
				}
				unset($_POST['neweventtype']);
				unset($_POST['addevent']);
				$this->Events_model->save();
				redirect(base_url().'event/listing', 'refresh');
			} else {
				$data['content'] = 'event';
				$this->load->model('Events_model');
				$data['eventtypes'] = $this->Events_model->get_eventtypes();
				$this->load->view('template', $data);
			}
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}
	
	public function edit() {
		
	}
	
	public function listing() {
		if(loggedin() ) {
			$ppage = 5;
			$start = 0;
			$this->load->model('Events_model');
			$config['base_url'] = base_url().'event/listing/page/';
			$config['total_rows'] = count($this->Events_model->get_events_by_user($_SESSION['id']));
			$config['per_page'] = $ppage;
			$config['full_tag_open'] = '<p>';
			$config['full_tag_close'] = '</p>';
			$this->pagination->initialize($config);
			if($this->uri->segment(4) != '') {
				$start = $this->uri->segment(4);
			}
			$data['events'] = $this->Events_model->get_events_by_user($_SESSION['id'], $start, $ppage);
			$data['content'] = 'events';
			$data['pages'] = $this->pagination->create_links();

			$this->load->view('template', $data);
			
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}
	
}


/* End of file user.php */
/* Location: ./application/controllers/event.php */
