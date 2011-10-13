<?php

	class User_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}
		
		function getlogin($name) {
			$query = $this->db->get_where('user', array('user_name' => $name));
			return $query->result_array();
		}
		
		function getUserInfo() {
			$query = $this->db->get_where('user', array('id' => $_SESSION['id']));
			return $query->row();
		}
	}
