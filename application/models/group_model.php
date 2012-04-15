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
		
		function get_group_members() {
			$group_id = $this->get_current_group_id();
			$this->db->select('user.name, user.email, user.id');
			$this->db->from('user');
			$this->db->join('user_group', 'user_group.user_id = user.id');
			$this->db->where('user_group.confirmed', 1);
			$this->db->where('user_group.group_id', $group_id);
			$this->db->order_by('name');
			$result = $this->db->get();
			return $result->result();
		}
		
		function get_current_group_id() {
			$this->db->select('group_id');
			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get('user');
			$user = $query->row();
			return $user->group_id;
		}
		
		function get_group_admins() {
			$group_id = $this->get_current_group_id();
			$this->db->select('user_id');
			$result = $this->db->get_where('group_admin', array('group_id' => $group_id));
			return $result->result();
		}
		
		function get_group_owner() {
			$group_id = $this->get_current_group_id();
			$this->db->select('owner_id');
			$result = $this->db->get_where('group', array('id' => $group_id));
			return $result->row()->owner_id;
		}
	}