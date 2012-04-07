<?php

	class Group_model extends CI_Model {
		
		function __construct() {
		    parent::__construct();
		    $this->load->database();
		}
		
		function getUserGroupNames() {
			$this->db->select('group.name');
			$this->db->from('group');
			$this->db->join('user_group', 'group.id = user_group.group_id');
			$this->db->join('user', 'user_group.user_id = user.id');
			$this->db->where('user.id', $this->session->userdata('id'));
			$result = $this->db->get();
			return $result->result();
		}
		
		function create_group() {
			if(!$this->name_exist()) {
				if(!$this->tag_exist()) {
					$data = array(
						'name'		=> str_replace(' ', '_', strtolower($this->input->post('name'))),
						'tag'		=> strtoupper($this->input->post('tag')),
						'desc'		=> $this->input->post('desc'),
						'owner_id'	=> $this->session->userdata('id')
					);
					$result = $this->db->insert('group', $data);
					$group_id = $this->db->insert_id();
					if($result) {
						$this->create_connection($this->session->userdata('id'), $group_id);
					}
					return $result;
				}
			}
			return false;
		}
		
		function name_exist() {
			$result = $this->db->get_where('group', array('name' => str_replace(' ', '_', strtolower($this->input->post('name')))));
			if($result->row()) {
				return true;
			}
			return false;
		}
		
		function tag_exist() {
			$result = $this->db->get_where('group', array('tag' => strtoupper($this->input->post('tag'))));
			if($result->row()) {
				return true;
			}
			return false;
		}
		
		function create_connection($user_id, $group_id) {
			$data = array(
				'user_id' 		=> $user_id,
				'group_id'		=> $group_id,
				'confirmed'		=> 1
			);
			$this->db->insert('user_group', $data);
		}
		
		function get_group_name() {
			$this->db->select('group.name');
			$this->db->from('group');
			$this->db->join('user', 'user.group_id = group.id');
			$this->db->where('user.id ='.$this->session->userdata('id'));
			$result = $this->db->get();
			return $result->row()->name;
		}
	}