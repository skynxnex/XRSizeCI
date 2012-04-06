<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	* 
	*/
	
	function __construct() {
		parent::__construct();
	}
	
	public function login() {
		if( $this->input->post('login') ) {
			$this->_dologin();
		}elseif( $this->input->post('logout') ) {
			$this->dologout();
		}elseif($this->session->userdata('cookie') == 1) {
			redirect(base_url().'event/listlast', 'refresh');
		}else  {
			$data['content'] = 'login';
			$this->load->view('template', $data);
		}

	}

	public function remoteLogin(){
		if($this->input->post()){
			$name = $this->input->post('name');
			$pass = $this->input->post('pass');
			echo json_encode($this->_validate_data($name, $pass));
		}
	}
	
	public function profile() {
		if(loggedin() ) {
			$data['content'] = 'profile';
			$this->load->model('User_model');
			$data['info'] = $this->User_model->getUserinfo();
			$data['gravatar_info'] = md5( strtolower( trim($data['info']->email)));
			$this->load->view('template', $data);
		} else {
			redirect(base_url().'news/', 'refresh');
		}
	}

	public function create() {
		$publickey = "6LeG7c4SAAAAANFursctJ4VGDHVYiOsWcHSXww0g";
		if($this->input->post()) {
			
		    $privatekey = '6LeG7c4SAAAAAMFk8Qqb_UrQ97ZRUZn1h--RW9EA';
		    // $resp = recaptcha_check_answer ($privatekey,
                // $_SERVER["REMOTE_ADDR"],
                // $this->input->post("recaptcha_challenge_field"),
                // $this->input->post("recaptcha_response_field"));

            // if ($resp->is_valid) {
    			$this->form_validation->set_message('required', '<div class="alert alert-error">%s kan inte vara tomt!</div>');
    			$this->form_validation->set_message('matches', '<div class="alert alert-error">Lösenorden är inte likadana</div>');
    			$this->form_validation->set_message('valid_email', '<div class="alert alert-error">Inte en korrekt epost adress</div>');
    			// $this->form_validation->set_rules('uname', 'Username', 'callback_username_check');
    			$this->form_validation->set_rules('user_name', 'Användarnamn', 'required');
    			$this->form_validation->set_rules('name', 'Namn', 'required');
    			$this->form_validation->set_rules('email', 'Epost', 'required|valid_email');
    			$this->form_validation->set_rules('pass', 'Lösenord', 'required');
    			$this->form_validation->set_rules('pass2', 'Lösenord igen','required|matches[pass]');
    			if ($this->form_validation->run() == FALSE) {
    				$data['content'] = 'create_user';
    				$this->load->view('template', $data);
    			} else {
    				$this->load->model('user_model');
					$result = $this->user_model->createUser();
					if($result) {
						$data['success_mess'] = "Användaren är skapad! Klicka på logga in för att börja använda tjänsterna!";
						$data['content'] = "success";
						$this->load->view('template', $data);
					} else {
						$data['error_mess'] = "Användarnamnet finns redan!";
						$data['content'] = "error";
						$this->load->view('template', $data);
					}
    			}
            // } else {
                // // $this->my_form_validation->set_error('Captcha', 'Det blev något fel med %s ');                // $data = array();
                // $data['cap'] = recaptcha_get_html($publickey);
                // $data['content'] = 'create_user';
                // $this->load->view('template', $data);
            // }
		} else {
			$data = array();
			// $data['cap'] = recaptcha_get_html($publickey);
			$data['content'] = 'create_user';
			$this->load->view('template', $data);
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
		$name = $this->input->post('uname');
		$pass = sha1($this->input->post('pass'));
		
		if ($this->_validate_form() == FALSE) {
			$data['content'] = 'login';
			$this->load->view('template', $data);
		} else {
			if($this->_validate_data($name, $pass)){
				$this->_cookie_check();
			}else {
				$this->session->set_userdata('login', 'fail');	
			}
			redirect(base_url().'dashboard', 'refresh');
		}
	}

	private function _validate_form() {
		$this->form_validation->set_message('required', '<div class="alert alert-error">%s kan inte vara tom!</div>');
		$this->form_validation->set_rules('uname', 'Användarnamn', 'required');
		$this->form_validation->set_rules('pass', 'Lösenord', 'required');
		return $this->form_validation->run();
	}

	private function _validate_data($name, $pass) {
		$success = false;
		$this->load->model('User_model');
		$results = $this->User_model->getlogin($name);
		if($results) {
			foreach($results as $result) {
				if($name == $result['user_name']) {
					$checkpass = $result['pass'];
					if($pass == $checkpass) {
						$success = true;
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
					}
				}
			}
		}
		return $success;
	}

	private function _cookie_check() {
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
	}
	
	private function dologout() {
		$this->session->sess_destroy();
		delete_cookie('username');
		delete_cookie('password');
		redirect(base_url().'news', 'refresh');
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

	public function username_check() {
		// Check in db if there is a username already
		if($this->input->post()) {
			$this->load->model('user_model');
			$result = $this->user_model->username_check();
				if($this->input->is_ajax_request()) {
					echo json_encode(array("returnvalue" => $result));
				} else {
					return $response;
				}
		}
	}
	
	public function email_check() {
		// Check in db if there is a email already
		if($this->input->post()) {
			$this->load->model('user_model');
			$result = $this->user_model->email_check();
				if($this->input->is_ajax_request()) {
					echo json_encode(array("returnvalue" => $result));
				} else {
					return $response;
				}
		}
	}
}



/* End of file user.php */
/* Location: ./application/controllers/user.php */
