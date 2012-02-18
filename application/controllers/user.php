<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	* 
	*/
	
	function __construct() {
		parent::__construct();
	}
	 
	public function index() {
		
	}
	
	public function login() {
		if( $this->input->post('login') ) {
			$this->_dologin();
		}elseif( $this->input->post('logout') ) {
			$this->dologout();
		}elseif($this->session->userdata('cookie') == 1) {
			redirect(base_url().'event/listlast', 'refresh');
		}else  {
			redirect(base_url().'news/', 'refresh');
		}
	}
	
	public function profile() {
		if(loggedin() ) {
			$data['content'] = 'profile';
			$this->load->model('User_model');
			$data['info'] = $this->User_model->getUserinfo();
			$this->load->view('template', $data);
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}
	
	public function edit() {
		if(loggedin()) {
			if($this->input->post()){
				$this->load->model('User_model');
				$result = $this->User_model->updateUser($this->input->post(), $this->session->userdata('id'));
				if($result){
					$data['success_mess'] = "Du har nu uppdaterat din profil.";
					$data['content'] = "success";
					$this->load->view('template', $data);
				}else{
					$data['error_mess'] = "Något gick fel när du skulle uppdatera din profil.";
					$data['content'] = "error";
					$this->load->view('template', $data);
				}
			}else{
				$data['content'] = 'edit_profile';
				$this->load->model('User_model');
				$data['info'] = $this->User_model->getUserinfo();
				$this->load->view('template', $data);
			}
		} else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna se din profil.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}
	
	private function _doLogin() {
		$success = false;
		$name = stripslashes($this->input->post('uname'));
		$pass = stripslashes($this->input->post('pass'));
		
		$this->form_validation->set_message('required', '<div class="alert alert-error">%s kan inte vara tom!</div>');
		$this->form_validation->set_rules('uname', 'Användarnamn', 'required');
		$this->form_validation->set_rules('pass', 'Lösenord', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->model('News_model');
			$data['news'] = $this->News_model->get_news();
			$data['content'] = 'news';
			$this->load->view('template', $data);
		} else {
			$this->load->model('User_model');
			$results = $this->User_model->getlogin($name);
			if($results) {
				foreach($results as $result) {
					if($name == $result['user_name']) {
						$checkpass = $result['pass'];
						if(sha1($pass) == $checkpass) {
							$sessiondata = array(
									"user" 	=> 1,
									"id"	=> $result['id'],
									"name"	=> $result['name'],
									"uname"	=> $result['user_name']
								);
							$this->session->set_userdata($sessiondata);
							if($result['admin'] == 100) {
								$this->session->set_userdata(array('admin' => 1));
							}
							$success = true;
							
							if($this->input->post('rememberme')) {
								$cookie = array(
										'name' 		=> 'username',
										'value' 	=> $name,
										'expire'	=> 60*60*24*365
									);
								$this->input>set_cookie($cookie);

								$cookie = array(
										'name' 		=> 'password',
										'value' 	=> sha1($pass),
										'expire'	=> 60*60*24*365
									);
								$this->input>set_cookie($cookie);
								$this->session->set_userdata('cookie', '1');
							}
							// redirect(base_url().'news/', 'refresh');
						}
					}
				}
			}else {
				$this->session->set_userdata('login', 'fail');	
			}
			redirect(base_url().'dashboard', 'refresh');
		}
	}
	
	private function dologout() {
		$this->session->sess_destroy();
		delete_cookie('username');
		delete_cookie('password');
		redirect(base_url().'', 'refresh');
	}
	
	public function pass() {
		if(loggedin()){
			if($this->input->post()){
				$this->form_validation->set_message('required', '<div class="alert alert-error">%s kan inte vara tom!</div>');
				$this->form_validation->set_message('matches', '<div class="alert alert-error">Nytt lösenord är inte likadana</div>');
				$this->form_validation->set_rules('pass1', 'Gammalt lösenord', 'required');
				$this->form_validation->set_rules('pass2', 'Nytt lösenord','required|matches[pass2again]');
				$this->form_validation->set_rules('pass2again', 'Upprepning av nytt lösenord', 'required');
				if ($this->form_validation->run() == FALSE) {
					$data['content'] = 'pass_update';
					$this->load->view('template', $data);
				} else {
					$this->load->model('User_model');
					$user = $this->User_model->getUserInfo();
					if($user->pass == sha1($this->input->post('pass1'))){
						$result = $this->User_model->updatePassword($this->input->post('pass2'), $this->session->userdata('id'));
						if($result){
								$data['success_mess'] = "Ditt lösenord är nu uppdaterat.";
							$data['content'] = "success";
							$this->load->view('template', $data);
						} else {
							$data['error_mess'] = "Något gick fel när du skulle byta lösenord.";
							$data['content'] = "error";
							$this->load->view('template', $data);
						}
					}else {
						$data['error_mess'] = "Fel på gamla lösenordet.";
							$data['content'] = "error";
							$this->load->view('template', $data);
					}
				}
			}else {
				$data['content'] = 'pass_update';
				$this->load->view('template', $data);
			}
		}else {
			$data['error_mess'] = "Du måste vara inloggad för att kunna se ändra ditt lösenord.";
			$data['content'] = "error";
			$this->load->view('template', $data);
		}
	}
}



/* End of file user.php */
/* Location: ./application/controllers/user.php */
