<?php

	class News_model extends CI_Model {
		
		function __construct() {
		    // Call the Model constructor
		    parent::__construct();
		    $this->load->database();
		}
		
		function get_news() {
			$query = $this->db->query('	SELECT info.*, user.name, infotype.picture
										FROM info, user, infotype
										WHERE info.user_id = user.id
										AND info.infotype_id = infotype.id
										ORDER BY date DESC 
										LIMIT 5
										');
								
			// $this->db->order_by('date', 'DESC');
			// $query = $this->db->get('user');
			$result = $query->result_array();
			return $result;
		}
	}
