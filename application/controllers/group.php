<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function show() {
		if(loggedin()) {
			$this->session->set_userdata('menu', 'group_menu');
			$this->load->model('user_model');
			$this->user_model->update_current_group();
			$data['content'] = 'empty_content';
			$this->load->view('template', $data);	
		}
	}
	
	public function members() {
		if(loggedin()) {
			$this->session->set_userdata('menu', 'group_menu');
			$this->load->model('user_model');
			$data['content'] = 'empty_content';
			$this->load->view('template', $data);	
		}
	}
	
	public function goals() {
		if(loggedin()) {
			$this->session->set_userdata('menu', 'group_menu');
			$this->load->model('user_model');
			$data['content'] = 'empty_content';
			$this->load->view('template', $data);	
		}
	}
	
	public function challenges() {
		if(loggedin()) {
			$this->session->set_userdata('menu', 'group_menu');
			$this->load->model('user_model');
			$data['content'] = 'empty_content';
			$this->load->view('template', $data);	
		}
	}
	
	public function create() {
		if(loggedin() ) {
			if($this->input->post()) {
				$this->form_validation->set_message('required', '<div class="alert alert-error">%s kan inte vara tomt!</div>');
				$this->form_validation->set_rules('name', 'Namn', 'required');
				$this->form_validation->set_rules('tag', 'Tagg', 'required');
				if ($this->form_validation->run() == FALSE) {
    				$data['content'] = 'create_group';
    				$this->load->view('template', $data);
    			} else {
    				$this->load->model('group_model');
					$result = $this->group_model->create_group();
					if($result) {
						$data['success_mess'] = "Gruppen är skapad! Du kan välja gruppen från övre menyn.";
						$data['content'] = "success";
						$this->load->view('template', $data);
					} else {
						$data['error_mess'] = "Gruppen kunde inte skapas. Antingen finns gruppnamnet eller taggen redan. Om problemet kvarstår, kontakta siteadmin";
						$data['content'] = "error";
						$this->load->view('template', $data);
					}
				}
			} else {
				$data['content'] = 'create_group';
				$this->load->view('template', $data);
			}
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}

	public function admin() {
		if(loggedin()) {
			if(group_admin()) {
				$this->session->set_userdata('menu', 'group_menu');
				$this->load->model('user_model');
				$data['content'] = 'empty_content';
				$this->load->view('template', $data);	
			}
		}
	}
	
}

/* End of file -filename- */
/* Location: ./application/controllers/group.php */
