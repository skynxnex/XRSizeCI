<?php

	class Stats_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}
		
		public function get_user_stats() {
			$query = $this->db->get_where('weekpoints', array('id' => $_SESSION['id']));
			$result = $query->result_array();
			return $result;
		}
	}
