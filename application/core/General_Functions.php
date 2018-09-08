<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class General_Functions extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('er_users');
    }

	  public function get_rides() {
		 $con['conditions'] = array('status' => 1);
		 $rides = $this->er_users->getRows($con, 'er_ride_offer');
		 $rides = $rides ? $rides : array();
		 return $rides;
	  }


	  
}