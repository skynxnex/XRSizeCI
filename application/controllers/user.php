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
			// redirect(base_url().'news/', 'refresh');
		}
	}
	
	public function editProfile() {
		
	}
	
	private function _doLogin() {
		$name = stripslashes($this->input->post('uname'));
		$pass = stripslashes($this->input->post('pass'));
		
		// $this->load->helper(array('url'));
		/*
		$this->load->library('form_validation');

		$this->form_validation->set_rules($name, 'användarnamn', 'required');
		$this->form_validation->set_rules($pass, 'lösenord', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->faillogin();
		}
		*/
		$this->load->model('User_model');
		$results = $this->User_model->getlogin($name);
		
		$success = false;
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
					/*
					$_SESSION['user'] = 1;
					$_SESSION['id'] = $result['id'];
					$_SESSION['name'] = $result['user_name'];
					*/
					if($result['admin'] == 100) {
						$_SESSION['admin'] = 1;
					}
					$success = true;
					
					if($this->input->post('rememberme')) {
						setcookie('username', $name, time()+60*60*24*365);
						setcookie('password', sha1($pass), time()+60*60*24*365);
						$_SESSION['cookie'] = 1;
						// redirect(base_url().'event/listlast', 'refresh');
					}
					redirect(base_url().'event/listlast/', 'refresh');
				}
			}
		}
		}
		if (!$success) {
			$this->session->set_userdata(array("user" => 2));
			// redirect(base_url().'', 'refresh');
		}
	redirect(base_url().'', 'refresh');
	}
	
	private function dologout() {
		$this->session->sess_destroy();
		setcookie('username');
		setcookie('password');
		redirect(base_url().'', 'refresh');
	}
	
	private function faillogin() {
		echo 'blaha!';
		$this->load->view('login_fail');
		// $data['content'] = 'login_fail';
		// $this->load->view('template', $data);
	}
}



/* End of file user.php */
/* Location: ./application/controllers/user.php */
