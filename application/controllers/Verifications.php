<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Verifications extends MY_Checklogged {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('er_users');
    }

	  public function show_user_verifications() {

            $this->load->view('users/profile/user_verifications');
	  }

	  
}