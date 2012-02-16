<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event extends CI_Controller {

	/**
	* 
	*/
	
	function __construct() {
		parent::__construct();
	}

	public function index() {
		if(loggedin() ) {
			$data['content'] = 'event';
			$data['action'] = 'new';
			$this->load->model('Events_model');
			$data['eventtypes'] = $this->Events_model->get_eventtypes();
			$this->load->view('template', $data);
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}

	public function delete() {
		if(loggedin()){
			$this->load->model('Events_model');
			$event = $this->Events_model->get_event();
			if($event[0]['user_id'] == $this->session->userdata('id')) {
				$this->Events_model->delete_event($event[0]['id'], 'event');
				$data['success_mess'] = "Du har nu tagit bort ditt träningstillfälle.";
				$data['content'] = "success";
				$this->load->view('template', $data);
			} else {
				$data['error_mess'] = "Du har inte behörighet att ta bort den.";
				$data['content'] = "error";
				$this->load->view('template', $data);
			}
		} else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna ta bort.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}
	
	public function add_or_update() {
		if(loggedin() ) {
			if($this->input->post()) {
				$this->load->model('Events_model');
				$_POST['user_id'] = $this->session->userdata('id');
				$_POST['week'] = $this->Events_model->calculate_week();
				if($this->input->post('neweventtype') != "") {
					$result = $this->Events_model->new_eventtype();
					if($result) {
						$_POST['eventtype_id'] = get_last_inserted_id();
					}
				}
				unset($_POST['neweventtype']);
				unset($_POST['addevent']);
				$result = $this->Events_model->save_or_update();
				if($result) {
					$data['success_mess'] = "Ditt träningstillfälle är nu skapat/uppdaterad.";
					$data['content'] = "success";
					$this->load->view('template', $data);
				} else {
					$data['error_mess'] = "Något gick fel när du skulle spara ditt träningstillfälle.";
				$data['content'] = "error";
				$this->load->view('template', $data);
				}
				//redirect(base_url().'event/listing', 'refresh');
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
		if(loggedin()) {
			if($this->input->post()) {
				
			}else {
				$data['content'] = 'event';
				$data['action'] = 'edit';
				$this->load->model('Events_model');
				$data['eventtypes'] = $this->Events_model->get_eventtypes();
				$event = $this->Events_model->get_event();
				$data['event'] = $event[0];
				if($data['event']['user_id'] == $this->session->userdata('id')) {
					$this->load->view('template', $data);
				} else {
					$this->load->view('template', array('content' => 'error', 'error_mess' => "Du har inte behörighet att ändra den!"));
				}
			}	
		} else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna ändra.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
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
		if(loggedin()) {
			$this->load->model('events_model');
			$data['events'] = $this->events_model->get_events_from_week();
			$data['content'] = 'events';
			$this->load->view('template', $data);
		} else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna se den delen.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}
	
	private function fixweekdb() {
		$this->load->model('events_model');
		$this->events_model->fix_week();
	}
	
}


/* End of file user.php */
/* Location: ./application/controllers/event.php */
