<?php

	class User_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}
		
		function getlogin($name = null) {
			$query = $this->db->get_where('user', array('user_name' => $name));
			return $query->result_array();
		}
		
		function getUserInfo() {
			$query = $this->db->get_where('user', array('id' => $this->session->userdata('id')));
			return $query->row();
		}
		
		function getUserGroupId() {
			$this->db->select('group_id');
			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get('user');
			return $query->row();
		}

		function updateUser($data, $id) {
			$this->db->where('id', $id);
			$result = $result = $this->db->update('user', $data);
			return $result;
		}

		function updatePassword($pass, $id) {
			$data = array('pass' => sha1($pass));
			$this->db->where('id', $id);
			$result = $result = $this->db->update('user', $data);
			return $result;
		}
	}
