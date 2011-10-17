<?php

	class Events_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}
		
		public function get_last_events() {
			$query = $this->db->query('
				SELECT event.id, event.user_id as uid, event.date, event.time,event.comment, user.name AS uname, eventtype.name AS ename
				FROM event, user, eventtype
				WHERE event.user_id = user.id
				AND event.eventtype_id = eventtype.id
				AND user.group_id = 1
				ORDER BY event.date DESC
				LIMIT 5');
			$result = $query->result_array();
			return $result;
		}
		
		public function get_all_events_by_user() {
		
		}
	}
