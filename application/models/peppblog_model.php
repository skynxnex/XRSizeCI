<?php

	class Peppblog_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}
		
		function get_last_blogs($groupid) {
			$this->db->select('user.name, blogg.text, blogg.date, user.email');
			$this->db->from('blogg');
			$this->db->join('user', 'user.id = blogg.user_id');
			$this->db->where('blogg.group_id', $groupid);
			$this->db->limit(10);
			$this->db->order_by("date", "desc");
			$query = $this->db->get();
			$result = $query->result_array();
			return $result;
		}
		
		function save() {
			$date = date('Y-m-d H:i:s', time());
			$data = array(	'text' => $this->input->post('text'),
							'user_id' => $this->session->userdata('id'),
							'date' => $date,
							'group_id' => $this->get_current_group_id()
						);
			$this->db->insert('blogg', $data);	
		}
		
		private function get_current_group_id() {
			$this->db->select('group_id');
			$result = $this->db->get_where('user', array('id' => $this->session->userdata('id')));
			return $result->row()->group_id;
		}
	}
