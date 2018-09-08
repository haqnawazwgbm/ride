<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Car extends MY_Checklogged {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('er_users');
    }

	  public function show_car() {
	  	$data['user'] = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
            //load the view
            $this->load->view('users/profile/user_car', $data);
	  }

	  public function update_car() {
	  	if ($this->input->post('submitCar')) {
	            $this->form_validation->set_rules('car_name', 'Car name', 'required');
	            $this->form_validation->set_rules('car_model', 'Car model', 'required');
	            $this->form_validation->set_rules('car_number', 'Car number', 'required');
	            $this->form_validation->set_rules('car_color', 'Car color', 'required');

	            $userData = array(
	            	'id' => $this->input->post('id'),
	                'car_name' => strip_tags($this->input->post('car_name')),
	                'car_model' => strip_tags($this->input->post('car_model')),
	                'car_number' => strip_tags($this->input->post('car_number')),
	                'car_color' => strip_tags($this->input->post('car_color')),
	                'status' => 1
	            );	

	            $condition = array('id' => $this->input->post('id'));

	            if ($this->form_validation->run() == true) {
	            	$upload = $this->do_upload();
	            	
	            	if ($upload) {
	            		$userData['car_image'] = $upload;
	            	} else {
	            		$this->session->set_flashdata('danger', array('message' => $this->upload->display_errors()));
	                    redirect('car/show_car');
	            	}
	            

	                $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                    redirect('car/show_car');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    redirect('car/show_car');
	                }
	            } else {
	            	$data['user'] = $userData;
			        //load the view
			        $this->load->view('users/profile/user_car', $data);
	            }

	  	}
	  	
	  	
	  }

	     public function do_upload()
        {
                $config['upload_path']          = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/";
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 3000;
                $config['max_width']            = 1024;
                $config['max_height']           = 1068;
                $config['encrypt_name']			= TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                	return false;

                }
                else
                {
	                 return $this->upload->data('file_name');
                }
        }

	
}