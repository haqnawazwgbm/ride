<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends General_Functions {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Er_users');
    }

    public function home() {
        $this->load->view('users/home');
    }
    
    /*
     * User account information
     */
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->Er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
            //load the view
            $this->load->view('users/home', $data);
        }else{
            redirect('users/home');
        }
    }
    
    /*
     * User login
     */
    public function login(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->Er_users->getRows($con, 'er_users');
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userImage', $checkLogin['profile_img']);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    echo true;
                }else{
                    echo false;
                }
                exit;
            }
        }
        //load the view
        $this->load->view('users/login', $data);
    }
    public function test() {
        $response = array(
                        'status' => 0,
                        'message' => "Invalid login."
                    );
        echo json_encode($response);
                exit;
    }
    /*
     * User login api
     */
    public function login_api(){
        $data = array();
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->Er_users->getRows($con, 'er_users');
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userImage', $checkLogin['profile_img']);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    $response = array(
                        'status' => 1,
                        'message' => "Login successfull."
                    );
                }else{
                    $response = array(
                        'status' => 0,
                        'message' => "Invalid login."
                    );
                }
                $this->output->set_content_type('application/json')
            ->set_output(json_encode($response));
            } else {
                $response = array(
                    'status' => 0,
                    'message' => 'Input fields are required'
                );
                 $this->output->set_content_type('application/json')
            ->set_output(json_encode($response));
            }
        }

    }

    /*
     * User registration api
     */
    public function registration_api(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
                'mobile_no' => strip_tags($this->input->post('phone')),
                'status' => 1
            );
            if($this->form_validation->run() == true){
                $insert = $this->Er_users->insert($userData,'er_users');
                if($insert){
                    $response = array(
                        'status' => 1,
                        'message' => "Your registration was successfully. Please login to your account."
                    );
                    
                }else{
                     $response = array(
                        'status' => 1,
                        'message' => "Some problems occured, please try again."
                    );
                }
                $this->output->set_content_type('application/json')
            ->set_output(json_encode($response));
            } else {
                $response = array(
                        'status' => 1,
                        'message' => "Some problems occured, please try again."
                    );
                $this->output->set_content_type('application/json')
            ->set_output(json_encode($response));
            }
        }
    }
    

    /*
     * User registration 
     */
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'gender' => $this->input->post('gender'),
                'mobile_no' => strip_tags($this->input->post('phone')),
                'status' => 1
            );
            if($this->form_validation->run() == true){
                $insert = $this->Er_users->insert($userData,'er_users');
                if($insert){
                    $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login to your account.');
                    redirect('users/login');
                }else{
                    $data['error_msg'] = 'Some problems occured, please try again.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('users/registration', $data);
    }
    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('users/login');
    }
    // User logout api
    public function logout_api(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        $response = array(
                        'status' => 1,
                        'message' => "Logout successfull."
                    );
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->Er_users->getRows($con, 'er_users');
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
    * Search ride function start from here.
    */
    public function search() {
        $date = $this->input->get('date');
        $from_location = $this->input->get('from_location');
        $to_location = $this->input->get('to_location');
        $data = array();


        if ($date != '' && $from_location != ''  && $to_location != '' ) {
            $con['like_conditions'] = array(
                    'er_ride_offer.from_location'=>$from_location,
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.date' => $date,
                    'er_ride_offer.status' => '1'
                );
             $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
        }
        elseif ($date != '' && $from_location == ''  && $to_location == '' ) {
             $con['like_conditions'] = array(
                    'er_ride_offer.date' => $date,
                    'er_ride_offer.status' => '1'
                );
             $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
    } elseif ($date == '' && $from_location != ''  && $to_location == '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.date' => date('Y-m-d'),
                    'er_ride_offer.from_location' => $from_location,
                    'er_ride_offer.status' => '1'
                );
         $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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

    } elseif ($date == '' && $from_location == ''  && $to_location != '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.date' => date('Y-m-d'),
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => '1'
                );
           $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
        $data['rides'] = $this->Er_users->getRows($con, 'er_ride_offer');
    }elseif ($date == '' && $from_location != ''  && $to_location != '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.date' => date('Y-m-d'),
                    'er_ride_offer.from_location' => $from_location,
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => '1'
                );
           $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
        $data['rides'] = $this->Er_users->getRows($con, 'er_ride_offer');
    }
        $this->load->view('users/search_rides', $data);
    }

    /*  search from location and to location function start form here.
    *
    */
    public function search_from_to() {
        $from_location = $this->input->get('from_location');
        $to_location = $this->input->get('to_location');


        if ($from_location != ''  && $to_location != '' ) {
            $con['like_conditions'] = array(
                    'er_ride_offer.from_location'=>$from_location,
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => 1
                );

            $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
            $con['groupBy'] = array('er_ride_offer.id');
             $con['innerJoin'] = array(array(
                'table' => 'er_users',
                'condition' =>'er_ride_offer.user_id = er_users.id',
                'joinType' => 'left'
                ),array(
                'table' => 'er_ride_booking',
                'condition' =>'er_ride_offer.id = er_ride_booking.ride_offer_id',
                'joinType' => 'left'
                ));

        $data['rides']  = $this->Er_users->getRows($con, 'er_ride_offer');
        }
         elseif ($from_location != ''  && $to_location == '' ) {
        $con['like_conditions'] = array(
                    'from_location' => $from_location,
                    'status' => '1'
                );
         $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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

    } elseif ($from_location == ''  && $to_location != '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => '1'
                );
         $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
         $con['groupBy'] = array('er_ride_offer.id');
             $con['innerJoin'] = array(array(
                'table' => 'er_users',
                'condition' =>'er_users.id = er_ride_offer.user_id',
                'joinType' => 'left'
                ),array(
                'table' => 'er_ride_booking',
                'condition' =>'er_ride_booking.ride_offer_id = er_ride_offer.id',
                'joinType' => 'left'
                ));;
        $data['rides']  = $this->Er_users->getRows($con, 'er_ride_offer');
    } else {
        $data = '';
    } 
        $this->load->view('users/search_rides', $data);
    }

    /*
    * Search ride function start from here.
    */
    public function search_api() {
        $date = $this->input->get('date');
        $from_location = $this->input->get('from_location');
        $to_location = $this->input->get('to_location');
        $data = array();


        if ($date != '' && $from_location != ''  && $to_location != '' ) {
            $con['like_conditions'] = array(
                    'er_ride_offer.from_location'=>$from_location,
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.date' => $date,
                    'er_ride_offer.status' => '1'
                );
             $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
        }
        elseif ($date != '' && $from_location == ''  && $to_location == '' ) {
             $con['like_conditions'] = array(
                    'er_ride_offer.date' => $date,
                    'er_ride_offer.status' => '1'
                );
             $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
    } elseif ($date == '' && $from_location != ''  && $to_location == '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.date' => date('Y-m-d'),
                    'er_ride_offer.from_location' => $from_location,
                    'er_ride_offer.status' => '1'
                );
         $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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

    } elseif ($date == '' && $from_location == ''  && $to_location != '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.date' => date('Y-m-d'),
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => '1'
                );
           $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
        $data['rides'] = $this->Er_users->getRows($con, 'er_ride_offer');
    }elseif ($date == '' && $from_location != ''  && $to_location != '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.date' => date('Y-m-d'),
                    'er_ride_offer.from_location' => $from_location,
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => '1'
                );
           $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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
       $data['rides'] = $this->Er_users->getRows($con, 'er_ride_offer');
    } else {
        $data['rides'] = array();
        
    }
     
        if (empty($data['rides'])) {
            $data = array(
                'status' => 0,
                'message' => 'Record not found.'
            );
        }
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

        /*  search from location and to location function start form here.
    *
    */
    public function search_from_to_api() {
        $from_location = $this->input->get('from_location');
        $to_location = $this->input->get('to_location');

        if ($from_location != ''  && $to_location != '' ) {
            $con['like_conditions'] = array(
                    'er_ride_offer.from_location'=>$from_location,
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => 1
                );

            $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
            $con['groupBy'] = array('er_ride_offer.id');
             $con['innerJoin'] = array(array(
                'table' => 'er_users',
                'condition' =>'er_ride_offer.user_id = er_users.id',
                'joinType' => 'left'
                ),array(
                'table' => 'er_ride_booking',
                'condition' =>'er_ride_offer.id = er_ride_booking.ride_offer_id',
                'joinType' => 'left'
                ));

        $data['rides']  = $this->Er_users->getRows($con, 'er_ride_offer');
        }
         elseif ($from_location != ''  && $to_location == '' ) {
        $con['like_conditions'] = array(
                    'from_location' => $from_location,
                    'status' => '1'
                );
         $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
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

    } elseif ($from_location == ''  && $to_location != '' ) {
        $con['like_conditions'] = array(
                    'er_ride_offer.to_location' => $to_location,
                    'er_ride_offer.status' => '1'
                );
         $con['selection'] = 'er_ride_offer.id as ride_offer_id, er_ride_offer.*, sum(er_ride_booking.number_of_seats) as booking, er_users.*';
         $con['groupBy'] = array('er_ride_offer.id');
             $con['innerJoin'] = array(array(
                'table' => 'er_users',
                'condition' =>'er_users.id = er_ride_offer.user_id',
                'joinType' => 'left'
                ),array(
                'table' => 'er_ride_booking',
                'condition' =>'er_ride_booking.ride_offer_id = er_ride_offer.id',
                'joinType' => 'left'
                ));;
        $data['rides']  = $this->Er_users->getRows($con, 'er_ride_offer');
    } else {
        $data = array();
    } 
        if (empty($data['rides'])) {
                $data = array(
                    'status' => 0,
                    'message' => 'Record not found.'
                );
            }
        $this->output->set_content_type('application/json')
            ->set_output(json_encode($data));
    }
}