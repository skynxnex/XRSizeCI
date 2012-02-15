<?php

	class Events_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}

		public function get_event() {
			$query = $this->db->get_where('event', array('id' => $this->uri->segment(3)));
			return $query->result_array();
		}
		
		public function get_last_events() {
			$query = $this->db->query('
				SELECT event.id, event.user_id, event.date, event.time, event.comment, user.name, eventtype.name as ename
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
				SELECT event.id, event.user_id, event.date, event.time, event.comment, user.name, eventtype.name as ename
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
		
		public function calculate_week($date = null) {
			$week = '';
			if($date == null) {
				$week = date('W', strtotime($this->input->post('date')));				
			} else {
				$week = date('W', strtotime($date));
			}
			return $week;
		}
		
		public function get_events_from_week() {
			$this->db->select('event.*, eventtype.name as ename');
			$this->db->where('user_id', $this->uri->segment(3));
			$this->db->where('week', $this->uri->segment(4));
			$this->db->join('eventtype', 'event.eventtype_id = eventtype.id');
			$query = $this->db->get('event');
			$result = $query->result_array();
			return $result;
		}
		
		public function fix_week() {
			$query = $this->db->get('event');
			$results = $query->result_array();
			// print_r($result);
			foreach($results as $result) {
				if($result['week'] == 0) {
					$this->db->where('id', $result['id']);
					$data = array('week' => $this->calculate_week($result['date']));
					$this->db->update('event', $data);
						
				}
			}
		}
	}
