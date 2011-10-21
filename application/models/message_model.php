<?php

class Message_model extends CI_Model {
	
	function __construct() {
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}
	
	public function get_by_user_id($user_id){
		$query = $this->db->get_where('message', array('to_user_id' => $user_id));
		return $query->result_array();

		}
	public function save_message($message){
		if($this->db->insert('message', $message)){
			return true;
		}
		return false;
	}
	public function read_message($id){
		$this->db->where('id', $id);
		if($query = $this->db->get('message')){
			return $query->row_array();
		}
		return false;
	}
	public function update($id){
		$this->db->where('id', $id);
		if($this->db->update('message', array('read' => 1))){
			return true;
		}
		return false;
	}
}