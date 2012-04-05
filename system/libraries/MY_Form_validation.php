<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
include('Form_validation.php');

class MY_Form_validation extends CI_Form_validation {

    function __construct($config=array()) {
        parent::__construct($config);
    }

    function set_error($field, $error) {
        // This is checked by $form_validation->error_string()
        $this->_error_array[$field] = sprintf($error, $this->_field_data[$field]['label']);
        // This is checked by $form_validation->error()
        $this->_field_data[$field]['error'] = sprintf($error, $this->_field_data[$field]['label']);
    }

}

