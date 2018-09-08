<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Rideoffer extends MY_Checklogged {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Er_users');
    }

    /*
    * home function from here
    */
    public function home() {
    	$data['rides'] = $this->Er_users->getRows(array(), 'er_ride_offer');
    	$this->load->view('users/home', $data);
    }

    /*
    * detail function from here
    */
    public function detail($id) {
        $con['selection'] = 'er_ride_offer.*, er_ride_offer.id as ride_offer_id, er_users.*, sum(er_ride_booking.number_of_seats) as booking';
    	$con['conditions'] = array(
                    'er_ride_offer.id' => $id,
                    'er_ride_offer.status' => '1'
                );
        $con['returnType'] = 'single';
    	$con['innerJoin'] = array(array(
                'table' => 'er_users',
                'condition' =>'er_users.id = er_ride_offer.user_id',
                'joinType' => 'inner'
                ),array(
                'table' => 'er_ride_booking',
                'condition' =>'er_ride_booking.ride_offer_id = er_ride_offer.id',
                'joinType' => 'left'
                ));
    	//$con['selection'] = 'er_ride_offer.*, er_users.*, er_users.name as user_name';
    	$rides = $this->Er_users->getRows($con, 'er_ride_offer');
    	$data['rides'] = $rides;
    	$con2['conditions'] = array(
    			'ride_offer_id' => $id, 
    			'user_id' => $this->session->userdata('userId'),
    			'status' => '1'
    		);
    	$exitedRow = $this->Er_users->getRows($con2, 'er_ride_booking');
    	if ($exitedRow) {
    		$data['record_exited'] = 'disabled';
    		$data['book'] = 'Unbook';
    	} else {
    		$data['record_exited'] = '';
    		$data['book'] = 'Book';
    	}
    	$this->load->view('users/offer_detail', $data);
    }

    public function user_rides() {
    	 $con['conditions'] = array(
                    'er_ride_offer.user_id' => $this->session->userdata('userId')
                );
             $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, er_users.*';
             $con['groupBy'] = array('er_ride_offer.id');
             $con['innerJoin'] = array(array(
                'table' => 'er_users',
                'condition' =>'er_users.id = er_ride_offer.user_id',
                'joinType' => 'left'
                ));
        $data['rides']  = $this->Er_users->getRows($con, 'er_ride_offer');
        $this->load->view('users/profile/user_rides', $data); 
    }


	  public function post() {
	  	if ($this->input->post('rideOffer')) {
	            $this->form_validation->set_rules('from_location', 'From location', 'required');
                $this->form_validation->set_rules('to_location', 'To location', 'required');
	            $this->form_validation->set_rules('charges_per_seat', 'charges per seat', 'required');
	            $this->form_validation->set_rules('pick_point', 'Pick point', 'required');
	            $this->form_validation->set_rules('drop_point', 'Drop point', 'required');
                $this->form_validation->set_rules('date', 'Date', 'required');
                $this->form_validation->set_rules('time', 'time', 'required');
	            $this->form_validation->set_rules('wait_time', 'wait time', 'required');
	            $this->form_validation->set_rules('max_seats', 'Max Seats', 'required');
	            $data = array(
	            	'user_id' => $this->session->userdata('userId'),
	                'from_location' => strip_tags($this->input->post('from_location')),
                    'to_location' => strip_tags($this->input->post('to_location')),
	                'arrival_time' => strip_tags($this->input->post('arrival_time')),
	                'pick_point' => strip_tags($this->input->post('pick_point')),
	                'drop_point' => strip_tags($this->input->post('drop_point')),
                    'date' => strip_tags($this->input->post('date')),
                    'time' => strip_tags($this->input->post('time')),
	                'wait_time' => strip_tags($this->input->post('wait_time')),
	                'max_seats' => strip_tags($this->input->post('max_seats')),
	                'charges_per_seat' => strip_tags($this->input->post('charges_per_seat')),
	                'ac_availability' => strip_tags($this->input->post('ac_availability')),
	                'heater_availability' => strip_tags($this->input->post('heater_availability')),
	                'description' => strip_tags($this->input->post('description')),
	                'status' => 1
	            );

	            if ($this->form_validation->run() == true) {

	                $insert = $this->Er_users->insert($data, 'er_ride_offer');
	                if($insert){
	                    $this->session->set_flashdata('success', array('message' => 'Your offer created successfully.'));
	                    redirect('rideoffer/home');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Some problems occured, please try again.'));
	                }
	            }
	            $data['data'] = $data;
		        //load the view
		        $this->load->view('users/create_offer', $data);
	  	} else {
	  		$this->load->view('users/create_offer');
	  	}
	  }

       public function post_api() {
        if ($this->input->post('rideOffer')) {
                $this->form_validation->set_rules('from_location', 'From location', 'required');
                $this->form_validation->set_rules('to_location', 'To location', 'required');
                $this->form_validation->set_rules('charges_per_seat', 'charges per seat', 'required');
                $this->form_validation->set_rules('pick_point', 'Pick point', 'required');
                $this->form_validation->set_rules('drop_point', 'Drop point', 'required');
                $this->form_validation->set_rules('date', 'Date', 'required');
                $this->form_validation->set_rules('time', 'time', 'required');
                $this->form_validation->set_rules('wait_time', 'wait time', 'required');
                $this->form_validation->set_rules('max_seats', 'Max Seats', 'required');

                $data = array(
                    'user_id' => $this->session->userdata('userId'),
                    'from_location' => strip_tags($this->input->post('from_location')),
                    'to_location' => strip_tags($this->input->post('to_location')),
                    'arrival_time' => strip_tags($this->input->post('arrival_time')),
                    'pick_point' => strip_tags($this->input->post('pick_point')),
                    'drop_point' => strip_tags($this->input->post('drop_point')),
                    'date' => strip_tags($this->input->post('date')),
                    'time' => strip_tags($this->input->post('time')),
                    'wait_time' => strip_tags($this->input->post('wait_time')),
                    'max_seats' => strip_tags($this->input->post('max_seats')),
                    'charges_per_seat' => strip_tags($this->input->post('charges_per_seat')),
                    'ac_availability' => strip_tags($this->input->post('ac_availability')),
                    'heater_availability' => strip_tags($this->input->post('heater_availability')),
                    'description' => strip_tags($this->input->post('description')),
                    'status' => 1
                );

                if ($this->form_validation->run() == true) {

                    $insert = $this->Er_users->insert($data, 'er_ride_offer');
                    if($insert){
                        $response = array(
                            'status' => 1,
                            'message' => 'Your offer created successfully.'
                        );

                    }else{
                        $response = array(
                            'status' => 1,
                            'message' => 'Some problems occured, please try again.'
                        );

                    }
                }
               echo json_encode($response); 
               exit;
        } else {
            $response = array(
                'status' => 1,
                'message' => 'Some problems occured, please try again.'
            );
            echo json_encode($response); 
               exit;
        }
      }

	  public function register() {
	  	if ($this->input->post('registerRideOffer')) {
            $ride_offer_id = $this->input->post('ride_offer_id');
	  		$decision = $this->input->post('decision');
            $number_of_seats = $this->input->post('number_of_seats');
	  		$data = array(
	            	'ride_offer_id' => $ride_offer_id,
	            	'user_id' => $this->session->userdata('userId'),
                    'number_of_seats' => $number_of_seats,
	                'status' => 1
	            );
            if ($decision == 'book') {
	  		   $insert = $this->Er_users->insert($data, 'er_ride_booking');
	            if($insert){
	                $this->session->set_flashdata('success', array('message' => 'Your registered successfully.'));
	                   redirect('rideoffer/detail/'.$ride_offer_id);
	             }else{
	             	$this->session->set_flashdata('danger', array('message' => 'Some problems occured, please try again.'));
	             }
             } else {
                //dlete
                $conditions = array(
                    'ride_offer_id' => $ride_offer_id,
                    'user_id' => $this->session->userdata('userId'),
                    'status' => 1
                );
                $this->Er_users->delete($conditions, 'er_ride_booking');
                $this->session->set_flashdata('success', array('message' => 'You Unregistered successfully.'));
                       redirect('rideoffer/detail/'.$ride_offer_id);
             }

	  	} else {
	  		$this->load->view('users/offer_detail');
	  	}
	  }

      public function register_api() {
        if ($this->input->post('registerRideOffer')) {
            $ride_offer_id = $this->input->post('ride_offer_id');
            $decision = $this->input->post('decision');
            $number_of_seats = $this->input->post('number_of_seats');
            $data = array(
                    'ride_offer_id' => $ride_offer_id,
                    'user_id' => $this->session->userdata('userId'),
                    'number_of_seats' => $number_of_seats,
                    'status' => 1
                );
            if ($decision == 'book') {
               $insert = $this->Er_users->insert($data, 'er_ride_booking');
                if($insert){
                       $response = array(
                            'status' => 1,
                            'message' => 'Your registered successfully.'
                       );
                 }else{
                    $response = array(
                            'status' => 0,
                            'message' => 'Some problems occured, please try again.'
                       );
                 }
             } else {
                //dlete
                $conditions = array(
                    'ride_offer_id' => $ride_offer_id,
                    'user_id' => $this->session->userdata('userId'),
                    'status' => 1
                );
                $this->Er_users->delete($conditions, 'er_ride_booking');
                $response = array(
                            'status' => 1,
                            'message' => 'You Unregistered successfully.'
                       );
             }
             echo json_encode($response); exit;

        } 
      }

	    public function do_upload()
        {
                $config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1068;
                $config['encrypt_name']         = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('car_image'))
                {
                        $data['error_msg'] = array('error' => $this->upload->display_errors());
                        $this->load->view('users/create_offer', $data);
                }
                else
                {
	                 return $this->upload->data('file_name');
                }
        }
}