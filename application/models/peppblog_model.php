<?php

	class Peppblog_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}
		
		function get_last_blogs($groupid) {
			$query = $this->db->query('SELECT user.id, user.name, blogg.id, blogg.text, blogg.date, blogg.user_id
						FROM `group`, user, blogg
						WHERE user.group_id = group.id
						AND blogg.user_id = user.id
						AND group.id ='.$groupid.'
						ORDER BY date DESC LIMIT 10');
			$result = $query->result_array();
			return $result;
		}
	}
