<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {

	/**
	* Handles messages between users
	*/

	function __construct() {
		parent::__construct();
	}
		//change id value!
	public function index(){
		$this->load->model('message_model');
		$data['messages'] = $this->message_model->get_by_user_id(1);
		$data['content'] = 'messages';
		$this->load->view('template', $data);					

	}
	
	public function create_message() {

		//get persons  in my gorup for dropdown
		$this->load->model('user_model');
		$data['persons'] = $this->user_model->getGroupUsers(1);
		$data['content'] = 'create_message.php';
		$this->load->view('template', $data);						
	}
	
	public function save_message(){
		$this->load->model('message_model');
		if($this->message_model->save_message($_POST)){
			redirect('message', 'refresh');
		}else{
			die('could not save message!');
		}
			
	}
	
	public function read_message($id){
		$this->load->model('message_model');
		$this->message_model->update($id);
		$data['message'] = $this->message_model->read_message($id);
		$data['content'] = 'read_message';
		$this->load->view('template', $data);
	}
}