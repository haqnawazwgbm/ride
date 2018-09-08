<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Profile extends MY_Checklogged {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('er_users');
    }

	  public function show_personal_info() {
	  	$data['user'] = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
            //load the view
            $this->load->view('users/profile/personal_info', $data);
	  }

	  public function show_personal_info_api() {
	  	$user = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
            $this->output->set_content_type('application/json')
	        ->set_output(json_encode($user));
	  }

	  public function show_user_nic() {
	  	$data['user'] = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
	  	$this->load->view('users/profile/user_nic', $data);
	  }

	   public function show_user_nic_api() {
	   	$con['conditions'] = array(
	   		'id' => $this->session->userdata('userId')
	   	);
	   	$con['returnType'] = 'single';
	   	$con['selection'] = "er_users.nic_front_img, er_users.nic_back_img";
	  	$user = $this->er_users->getRows($con, 'er_users');
	  	$user['nic_front_img'] = base_url() . 'uploads/' . $user['nic_front_img'];
	  	$user['nic_back_img'] = base_url() . 'uploads/' . $user['nic_back_img'];
	  	$this->output->set_content_type('application/json')->set_output(json_encode($user));

	  }

	  public function show_user_license() {
	  	$data['user'] = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
	  	$this->load->view('users/profile/user_license', $data);
	  }

	  public function show_user_license_api() {
	  	$con['conditions'] = array(
	   		'id' => $this->session->userdata('userId')
	   	);
	   	$con['returnType'] = 'single';
	  	$con['selection'] = "er_users.license_front_img, er_users.license_back_img";
	  	$user = $this->er_users->getRows($con, 'er_users');
	  	$user['license_front_img'] = base_url() . 'uploads/' . $user['license_front_img'];
	  	$user['license_back_img'] = base_url() . 'uploads/' . $user['license_back_img'];
	  	$this->output->set_content_type('application/json')->set_output(json_encode($user));
	  }

	  public function show_user_photo() {
	  	$data['user'] = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
	  	$this->load->view('users/profile/user_photo', $data);
	  }

	  public function show_user_photo_api() {
	  	$con['conditions'] = array(
	   		'id' => $this->session->userdata('userId')
	   	);
	   	$con['returnType'] = 'single';
	  	$con['selection'] = "er_users.profile_img";
	  	$user = $this->er_users->getRows($con, 'er_users');
	    $user['profile_img'] = base_url() . 'uploads/' . $user['profile_img'];
	  	$this->output->set_content_type('application/json')->set_output(json_encode($user));
	  }

	  public function upload_user_image() {
	  	
	  	if ($this->input->post('userImage')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'profile_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                     $this->session->set_userdata('userImage', $upload);
	                    redirect('profile/show_user_photo');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    $data['user'] = $userData;
	                    $this->load->view('profile/user_photo', $userData);
	          }
	      } else {
	     			 	$this->session->set_flashdata('danger', array('message' => $this->upload->display_errors()));
	                    redirect('profile/show_user_photo');
	      }
	       
	    }      	
	            	
	  }

	  public function upload_user_image_api() {
	  	
	  	if ($this->input->post('userImage')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'profile_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                	$response = array(
	                		'status' => 1,
	                		'message' => 'Your profile was updated successfully.'
	                	);
	                    
	                }else{
	                	$response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	          }
	      } else {

	     			 	$response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	      }
	      $this->output->set_content_type('application/json')->set_output(json_encode($response));
	       
	    }      	
	            	
	  }

	

	  public function upload_user_front_nic() {
	  	if ($this->input->post('userFrontNic')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'nic_front_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                    redirect('profile/show_user_nic');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    $data['user'] = $userData;
	                    $this->load->view('profile/user_nic', $userData);
	          }
	      } else {
	     			 	$this->session->set_flashdata('danger', array('message' => $this->upload->display_errors()));
	                    redirect('profile/show_user_nic');
	      }
	       
	    }      	
	            	
	  }

	    public function upload_user_front_nic_api() {
	  	if ($this->input->post('userFrontNic')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'nic_front_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Your profile was updated successfully.'
	                	);
	                }else{
	                	$response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	          }
	      } else {
	     			 	$response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	      }
	       
	    }   
	    $this->output->set_content_type('application/json')->set_output(json_encode($response));   	
	            	
	  }

	  public function upload_user_back_nic() {
	  	
	  	if ($this->input->post('userBackNic')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'nic_back_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                    redirect('profile/show_user_nic');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    $data['user'] = $userData;
	                    $this->load->view('profile/user_nic', $userData);
	          }
	      } else {
	     			 	$this->session->set_flashdata('danger', array('message' => $this->upload->display_errors()));
	                    redirect('profile/show_user_nic');
	      }
	       
	    }      	
	            	
	  }

	  public function upload_user_back_nic_api() {
	  	
	  	if ($this->input->post('userBackNic')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'nic_back_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Your profile was updated successfully.'
	                	);
	                }else{
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	          }
	      } else {
	     			 	$response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	      }
	       
	    }      	
	    $this->output->set_content_type('application/json')->set_output(json_encode($response));
	            	
	  }
 	/* upload user license start from here. 
 	*
 	*/
 		public function upload_user_front_license() {
	  	if ($this->input->post('userFrontLicense')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'license_front_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                    redirect('profile/show_user_license');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    $data['user'] = $userData;
	                    $this->load->view('profile/user_license', $userData);
	          }
	      } else {
	     			 	$this->session->set_flashdata('danger', array('message' => $this->upload->display_errors()));
	                    redirect('profile/show_user_license');
	      }
	       
	    }      	
	            	
	  }

	  	public function upload_user_front_license_api() {
	  	if ($this->input->post('userFrontLicense')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'license_front_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Your profile was updated successfully.'
	                	);
	                }else{
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	          }
	      } else {
	     			 	 $response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	      }
	       
	    }      	
	    $this->output->set_content_type('application/json')->set_output(json_encode($response));
	            	
	  }
	  public function upload_user_back_license() {
	  	
	  	if ($this->input->post('userBackLicense')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'license_back_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                    redirect('profile/show_user_license');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    $data['user'] = $userData;
	                    $this->load->view('profile/user_license', $userData);
	          }
	      } else {
	     			 	$this->session->set_flashdata('danger', array('message' => $this->upload->display_errors()));
	                    redirect('profile/show_user_license');
	      }
	       
	    }      	
	            	
	  }

	  public function upload_user_back_license_api() {
	  	
	  	if ($this->input->post('userBackLicense')) {
	  	$upload = $this->do_upload();

	     if ($upload) {

	     	$id = $this->input->post('id');
	     	$userData = array(
	     		'license_back_img' => $upload,
	     		'id' 	=> $id
	     	);
	       

	        $condition = array('id' => $id);
	        $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                     $response = array(
	                		'status' => 1,
	                		'message' => 'Your profile was updated successfully.'
	                	);
	                }else{
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	          }
	      } else {
	     			 	$response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	      }
	       
	    }      	
	    $this->output->set_content_type('application/json')->set_output(json_encode($response));
	            	
	  }

	  public function show_user_contact() {
	  	$data['user'] = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
	  	$this->load->view('users/profile/user_contacts', $data);
	  }

	  public function show_user_contact_api() {
	  	$user = $this->er_users->getRows(array('id'=>$this->session->userdata('userId')), 'er_users');
	  	$this->output->set_content_type('application/json')->set_output(json_encode($user));
	  }

	  public function update_user_contact() {
	  		if ($this->input->post('userContact')) {
	            $this->form_validation->set_rules('address', 'Address', 'required');
	            $this->form_validation->set_rules('city', 'City', 'required');
	            $this->form_validation->set_rules('province', 'Province', 'required');
	            $this->form_validation->set_rules('mobile_no', 'Contact number', 'required');

	            $userData = array(
	            	'id' => $this->input->post('id'),
	                'address' => strip_tags($this->input->post('address')),
	                'city' => strip_tags($this->input->post('city')),
	                'province' => strip_tags($this->input->post('province')),
	                'mobile_no' => strip_tags($this->input->post('mobile_no'))
	            );

	            $condition = array('id' => $this->input->post('id'));

	            if ($this->form_validation->run() == true) {
	            

	                $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                    redirect('profile/show_user_contact');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    redirect('profile/show_user_contact');
	                }
	            } else {
	            	$data['user'] = $userData;
			        //load the view
			        $this->load->view('users/profile/user_contacts', $data);
	            }

	  	}
	  }

	  public function update_user_contact_api() {
	  		if ($this->input->post('userContact')) {
	            $this->form_validation->set_rules('address', 'Address', 'required');
	            $this->form_validation->set_rules('city', 'City', 'required');
	            $this->form_validation->set_rules('province', 'Province', 'required');
	            $this->form_validation->set_rules('mobile_no', 'Contact number', 'required');

	            $userData = array(
	            	'id' => $this->input->post('id'),
	                'address' => strip_tags($this->input->post('address')),
	                'city' => strip_tags($this->input->post('city')),
	                'province' => strip_tags($this->input->post('province')),
	                'mobile_no' => strip_tags($this->input->post('mobile_no'))
	            );

	            $condition = array('id' => $this->input->post('id'));

	            if ($this->form_validation->run() == true) {
	            

	                $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                     $response = array(
	                		'status' => 1,
	                		'message' => 'Your profile was updated successfully.'
	                	);
	                }else{
	                	 $response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	                }
	            } else {
	            	 $response = array(
	                		'status' => 1,
	                		'message' => 'Something went wrong. Please try again.'
	                	);
	            }

	  	}
	  	$this->output->set_content_type('application/json')->set_output(json_encode($user));
	  }

	  public function update_personal_info() {
	  	if ($this->input->post('userProfile')) {
	            $this->form_validation->set_rules('name', 'Name', 'required');
	            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	            $this->form_validation->set_rules('date_of_birth', 'Date of birth', 'required');

	            $userData = array(
	            	'id' => $this->input->post('id'),
	                'name' => strip_tags($this->input->post('name')),
	                'email' => strip_tags($this->input->post('email')),
	                'date_of_birth' => strip_tags($this->input->post('date_of_birth')),
	                'gender' => $this->input->post('gender'),
	                'cnic_no' => $this->input->post('cnic_no'),
	                'address' => $this->input->post('address'),
	                'mother_name' => $this->input->post('mother_name'),
	                'mobile_no' => strip_tags($this->input->post('mobile_no')),
	                'biography' => strip_tags($this->input->post('biography')),
	                'status' => 1
	            );

	            $condition = array('id' => $this->input->post('id'));

	            if ($this->form_validation->run() == true) {
	            

	                $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_flashdata('success', array('message' => 'Your profile was updated successfully.'));
	                    redirect('profile/show_personal_info');
	                }else{
	                    $this->session->set_flashdata('danger', array('message' => 'Something went wrong. Please try again.'));
	                    redirect('profile/show_personal_info');
	                }
	            } else {
	            	$data['user'] = $userData;
			        //load the view
			        $this->load->view('users/profile/personal_info', $data);
	            }

	  	}
	  }


	  public function update() {
	  	if ($this->input->post('userProfile')) {
	            $this->form_validation->set_rules('name', 'Name', 'required');
	            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	            $this->form_validation->set_rules('mobile_no', 'Mobile number', 'required');
	            $this->form_validation->set_rules('cnic_no', 'CNIC', 'required');
	            $this->form_validation->set_rules('mother_name', 'Mother name', 'required');

	            $userData = array(
	            	'id' => $this->input->post('user_id'),
	                'name' => strip_tags($this->input->post('name')),
	                'email' => strip_tags($this->input->post('email')),
	                'gender' => $this->input->post('gender'),
	                'cnic_no' => $this->input->post('cnic_no'),
	                'address' => $this->input->post('address'),
	                'mother_name' => $this->input->post('mother_name'),
	                'mobile_no' => strip_tags($this->input->post('mobile_no')),
	                'status' => 1
	            );

	            $condition = array('id' => $this->input->post('user_id'));

	            if ($this->form_validation->run() == true) {
	            	$upload = $this->do_upload();
	            	
	            	if ($upload) {
	            		$userData['profile_img'] = $upload;
	            		$this->session->set_userdata('userImage', $upload);
	            	}

	            	

	                $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $this->session->set_userdata('success_msg', 'Your profile was updated successfully.');
	                    redirect('profile/show');
	                }else{
	                    $data['error_msg'] = 'Some problems occured, please try again.';
	                }
	            }
	            $data['user'] = $userData;
		        //load the view
		        $this->load->view('users/profile', $data);
	  	}
	  }

	  public function update_personal_info_api() {
	  	if ($this->input->post('userProfile')) {
	            $this->form_validation->set_rules('name', 'Name', 'required');
	            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	            $this->form_validation->set_rules('mobile_no', 'Mobile number', 'required');
	            $this->form_validation->set_rules('cnic_no', 'CNIC', 'required');
	            $this->form_validation->set_rules('mother_name', 'Mother name', 'required');

	            $userData = array(
	            	'id' => $this->input->post('user_id'),
	                'name' => strip_tags($this->input->post('name')),
	                'email' => strip_tags($this->input->post('email')),
	                'gender' => $this->input->post('gender'),
	                'cnic_no' => $this->input->post('cnic_no'),
	                'address' => $this->input->post('address'),
	                'mother_name' => $this->input->post('mother_name'),
	                'mobile_no' => strip_tags($this->input->post('mobile_no')),
	                'status' => 1
	            );

	            $condition = array('id' => $this->input->post('user_id'));

	            if ($this->form_validation->run() == true) {
	            	$upload = $this->do_upload();
	            	
	            	if ($upload) {
	            		$userData['profile_img'] = $upload;
	            		$this->session->set_userdata('userImage', $upload);
	            	}

	            	

	                $update = $this->er_users->update($userData, $condition, 'er_users');
	                if($update){
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Your profile was updated successfully.'
	                	);
	                }else{
	                    $response = array(
	                		'status' => 1,
	                		'message' => 'Somethiing went wrong. Please try again.'
	                	);
	                }
	            }
	             $response = array(
	                		'status' => 1,
	                		'message' => 'Somethiing went wrong. Please try again.'
	               );
	             $this->output->set_content_type('application/json')->set_output(json_encode($response));
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