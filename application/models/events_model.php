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
		
		public function get_events_by_user($id, $start = null, $limit_val = null) {
			$limit = '';
			if($start != null || $limit_val != null) {
				$limit = 'LIMIT '.$start.', '.$limit_val;
			}

			$query = $this->db->query('
				SELECT event.id, event.user_id as uid, event.date, event.time,event.comment, user.name AS uname, eventtype.name AS ename
				FROM event, user, eventtype
				WHERE event.user_id = user.id
				AND event.eventtype_id = eventtype.id
				AND user.id = '.$id.'
				ORDER BY event.date DESC '.$limit
									);
			$result = $query->result_array();
			return $result;
		}
		
		public function get_eventtypes() {
			$query = $this->db->get('eventtype');
			$result = $query->result_array();
			return $result;
		}
		
		public function save() {			
			$this->db->insert('event', $this->input->post());
		}
		
		public function new_eventtype() {
			$data = array('name' => $this->input->post('neweventtype'));
			$result = $this->db->insert('eventtype', $data);
		}
		
		public function calculate_week() {
			$week = date('W', strtotime($this->input->post('date')));
			return $week;
		}
	}
