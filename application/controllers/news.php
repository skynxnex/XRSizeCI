<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	* 
	*/
	
	public function index() {
		$this->load->model('News_model');
		$data['news'] = $this->News_model->get_news();
		$data['content'] = 'news';
		$this->load->view('template', $data);
		$this->console->log('this will show an error in firebug', 'error', FALSE);
	}
	
}
