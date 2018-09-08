<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Home extends MY_Checklogged {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('er_users');
    }

	  public function home() {
		  	 $this->load->view('users/home');
	  }

	  public function profile() {
	  	$data['user'] = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
            //load the view
            $this->load->view('users/profile', $data);
	  }
	  
}