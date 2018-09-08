<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Preferences extends MY_Checklogged {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('er_users');
    }

	  public function show_user_preferences() {

            $this->load->view('users/profile/user_preferences');
	  }

	  
}