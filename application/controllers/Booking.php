<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Booking extends MY_Checklogged {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Er_users');
    }

    public function user_booked_rides() {
    	$con['conditions'] = array(
                    'er_ride_booking.user_id' => $this->session->userdata('userId')
                );
             $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, count(er_ride_booking.ride_offer_id) as booking, er_users.*';
             $con['groupBy'] = array('er_ride_offer.id');
             $con['innerJoin'] = array(array(
                'table' => 'er_users',
                'condition' =>'er_users.id = er_ride_offer.user_id',
                'joinType' => 'left'
                ),array(
                'table' => 'er_ride_booking',
                'condition' =>'er_ride_booking.ride_offer_id = er_ride_offer.id',
                'joinType' => 'left'
                ));
        $data['rides']  = $this->Er_users->getRows($con, 'er_ride_offer');
        $this->load->view('users/profile/user_booked_rides', $data);
    }
}