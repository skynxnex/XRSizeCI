﻿<?php

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
			$query = $this->db->get_where('user', array('id' => $_SESSION['id']));
			return $query->row();
		}
		
		function getUserGroupId() {
			$this->db->select('group_id');
			$this->db->where('id', $_SESSION['id']);
			$query = $this->db->get('user');
			return $query->row();
		}
		function getGroupUsers($group_id){
			$this->db->select('id, user_name');
			$this->db->where('group_id', $group_id);
			$query = $this->db->get('user');
			return $query->result_array();
		}
	}
