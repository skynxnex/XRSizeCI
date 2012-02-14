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
				$data['action'] = 'new';
				$this->load->model('Events_model');
				$data['eventtypes'] = $this->Events_model->get_eventtypes();
				$this->load->view('template', $data);
			}
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}
	
	public function edit() {
		$data['content'] = 'event';
		$data['action'] = 'edit';
		$this->load->model('Events_model');
		$data['eventtypes'] = $this->Events_model->get_eventtypes();
		$data['event'] = $this->Events_model->get_event();
		$this->load->view('template', $data);
	}
	
	public function listlast() {
		if(loggedin() ) {
			$this->load->model('Events_model');
			$data['events'] = $this->Events_model->get_last_events();
			$data['content'] = 'events';
			$this->load->view('template', $data);
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}
	public function listing() {
		if(loggedin() ) {
			$ppage = 5;
			$start = 0;
			$config['uri_segment'] = 4;
			$config['num_links'] = 5;
			$this->load->model('Events_model');
			$config['base_url'] = base_url().'event/listing/page/';
			$config['total_rows'] = count($this->Events_model->get_events_by_user($this->session->userdata('id')));
			$config['per_page'] = $ppage;

			$config['full_tag_open'] = '<div class="pagination"><ul>';
			$config['full_tag_close'] = '</div></ul>';

			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';

			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';

			$this->pagination->initialize($config);
			if($this->uri->segment(4) != '') {
				$start = $this->uri->segment(4);
			}
			$data['events'] = $this->Events_model->get_events_by_user($this->session->userdata('id'), $start, $ppage);
			$data['content'] = 'events';
			$data['pages'] = $this->pagination->create_links();

			$this->load->view('template', $data);
			
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}
	
	public function week() {
		$this->load->model('events_model');
		$data['events'] = $this->events_model->get_events_from_week();
		$data['content'] = 'events';
		$this->load->view('template', $data);
	}
	
	private function fixweekdb() {
		$this->load->model('events_model');
		$this->events_model->fix_week();
	}
	
}


/* End of file user.php */
/* Location: ./application/controllers/event.php */
