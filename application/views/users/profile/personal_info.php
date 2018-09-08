
<?php $this->load->view('users/includes/header'); ?>
<div class="container main bg-main">
<?php include_once 'include/top_menu.php'; ?>

<div class="container user">
	<div class="row">
    <div class="col-md-3">
<?php include 'include/left_menu.php'; ?>
    </div><!-- col -->
    <div class="col-md-9">
    	<h3>Personal Information</h3><hr>
    	<div class="profile-area">
    	<div class="row">
    		
    			<div class="col-md-6 col-md-offset-3">
    				<form action="<?= base_url(); ?>profile/update_personal_info" method="POST">
    					<div class="form-group">
    						<input type="text" name="name" value="<?= $user['name']; ?>" class="form-control" placeholder="Name..">
                            <?php echo form_error('name','<span class="text-danger">','</span>'); ?>
    					</div><!-- form-group -->
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <div class="form-group">
                            <input type="email" name="email" name="email" value="<?= $user['email']; ?>" class="form-control" placeholder="Email..">
                            <?php echo form_error('email','<span class="text-danger">','</span>'); ?>
                        </div><!-- form-group -->
    					
    					<div class='input-group birth-date'>
                             <div class="input-group-addon change-addon "><i class="fa fa-calendar form-icon fa-1x"></i></div>
                                 <input type="text" class="form-control" placeholder="Date of birth" name="date_of_birth" value="<?= $user['date_of_birth']; ?>">
                                 <?php echo form_error('date_of_birth','<span class="text-danger">','</span>'); ?>
                                 
                         </div>

                         <div class="form-group"></div>
    			
    			         <div class="form-group">
                            <label>Gender</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" id="optionsRadios1" value="male" <?php echo($user['gender']=='male' ? 'checked' : ''); ?>>Male
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" id="optionsRadios2" value="female" <?php echo($user['gender']=='female' ? 'checked' : ''); ?>>Female
                                                        </label>
                                                    </div>
                                                    
                             </div>
                        <div class="form-group">
                            <input type="text" name="cnic" value="<?= $user['cnic_no']; ?>" class="form-control" placeholder="CNIC..">
                            <?php echo form_error('cnic_no','<span class="text-danger">','</span>'); ?>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <input type="text" name="address" value="<?= $user['address']; ?>" class="form-control" placeholder="Address..">
                            <?php echo form_error('address','<span class="text-danger">','</span>'); ?>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <input type="text" name="mother_name" value="<?= $user['mother_name']; ?>" class="form-control" placeholder="Mother name..">
                            <?php echo form_error('mother_name','<span class="text-danger">','</span>'); ?>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <input type="text" name="mobile_no" value="<?= $user['mobile_no']; ?>" class="form-control" placeholder="Mobile number..">
                            <?php echo form_error('mobile_no','<span class="text-danger">','</span>'); ?>
                        </div><!-- form-group -->
    	
    	<div class="form-group">
    		<textarea name="biography" class="form-control" cols="30" rows="10" placeholder="Bio Graphy"><?= $user['biography']; ?></textarea>
    	</div><!-- form-group -->
    	<div class="form-group">
    		<input type="submit" name="userProfile" value="Save" class="btn btn-default ">
    	</div><!-- form-group -->

    				</form>
    			</div><!-- col -->
    		
    	</div><!-- row -->
    </div><!-- profile-area -->

    </div><!-- col -->
	</div><!-- row -->
</div><!-- container -->
<div class="support">
    <?php $this->load->view('users/includes/footer'); ?>
