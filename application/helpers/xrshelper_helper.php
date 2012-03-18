<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('heading')) {

	function loggedin() {
		$CI =& get_instance();
		if($CI->session->userdata('user') == 1) {
			return true;
		} elseif($CI->input->cookie('username') != "" && $CI->input->cookie('password') != "") {
			if(cookie_login()) {
				return true;
			}
		}
		return false;
	}

	function cookie_login() {
		echo "cookie login";
		$CI =& get_instance();
		$CI->load->model('User_model');
		$results = $CI->User_model->getlogin($CI->input->cookie('username'));
		foreach($results as $result) {
			if($CI->input->cookie('username') == $result['user_name']) {
				$checkpass = $result['pass'];
				if($CI->input->cookie('password') == $checkpass) {
					$sessiondata = array(
							"user" 	=> 1,
							"id"	=> $result['id'],
							"name"	=> $result['name'],
							"uname"	=> $result['user_name']
						);
					$CI->session->set_userdata($sessiondata);
					return true;
				}
			}
		}
		return false;
	}
	
	function splitDate($date) {
		$atoms = explode('-',$date);
		$year = $atoms[0];
		$month = $atoms['1'];
		// $month = str_replace('0', '', $atoms[1]);
		$day = $atoms[2];
		return array('year' => $year, 'month' => $month, 'day' => $day);
	}
	
	function monthName($month) {
		$months = array(
			'01' 	=> 'Januari',
			'02' 	=> 'Februari',
			'03' 	=> 'Mars',
			'04'	=> 'April',
			'05'	=> 'Maj',
			'06'	=> 'Juni',
			'07'	=> 'Juli',
			'08'	=> 'Augusti',
			'09'	=> 'September',
			'10'	=> 'Oktober',
			'11'	=> 'November',
			'12'	=> 'December'
		);
		return $months[$month];
	}
	
	function trim_post_data($post) {
		foreach($post() as $field => $value) {
			$value = stripslashes($value);
		}
		return $post;
	}
	
	function get_last_inserted_id() {
		$CI =& get_instance();
		return $CI->db->insert_id();
	}

	function check_active_nav($uri1, $uri2) {
		$CI =& get_instance();
		if($uri1 == $CI->uri->segment(1) && $uri2 == $CI->uri->segment(2)) {
			return true;
		}
		return false;
	}

	/**
 * valid_date
 *
 * check if a date is valid
 *
 * @access    public
 * @param    string
 * @param    string
 * @return    boolean
 */

 function valid_date($str, $format = 'yyy/mm/dd')
 {
        switch($format)
        {

            case 'yyyy/mm/dd':
                if(preg_match("/^(19\d\d|2\d\d\d)[\/|-](0?[1-9]|1[012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/", $str,$match) && checkdate($match[2],$match[3],$match[1]))
                {
                    return TRUE;
                }
            break;
            case 'mm/dd/yyyy':
                if(preg_match("/^(0?[1-9]|1[012])[\/|-](0?[1-9]|[12][0-9]|3[01])[\/|-](19\d\d|2\d\d\d)$/", $str,$match) && checkdate($match[1],$match[2],$match[3]))
                {
                    return TRUE;
                }
            break;
            default: // 'dd/mm/yyyy'
                if(preg_match("/^(0?[1-9]|[12][0-9]|3[01])[\/|-](0?[1-9]|1[012])[\/|-](19\d\d|2\d\d\d)$/", $str,$match) && checkdate($match[2],$match[1],$match[3]))
                {
                return TRUE;
                }
            break;

        }
        return FALSE;
 }
}
