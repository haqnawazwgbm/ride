 <?php $this->load->view('users/includes/header'); ?>
<div class="container main bg-main">
<?php include_once 'include/top_menu.php'; ?>

<div class="container user">
  <div class="row">
    <div class="col-md-3">
<?php include 'include/left_menu.php'; ?>
    </div><!-- col -->

<div class="col-md-9">
    	<h3>Add Your Address Information</h3><hr>
    	<div class="profile-area">
    	<div class="row">
    		
    			<div class="col-md-8 col-md-offset-2">
    				<form action="<?= base_url(); ?>profile/update_user_contact" method="POST">
    					<input type="hidden" value="<?= $user['id']; ?>" name="id" />

    					<div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Address</label>
                            </div>
                            <div class="col-md-8">
    						<input type="text" name="address" value="<?= $user['address']; ?>" class="form-control" placeholder="Address...">
    						<?php echo form_error('address','<span class="text-danger">','</span>'); ?>
                        </div>
                    </div>
    					</div><!-- form-group -->

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">City</label>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name="city" value="<?= $user['city']; ?>" class="form-control" placeholder="City">
                            <?php echo form_error('city','<span class="text-danger">','</span>'); ?>
                        </div>
                    </div>
                        </div><!-- form-group -->
                     <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Province</label>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name="province" value="<?= $user['province']; ?>" class="form-control" placeholder="Province" >
                            <?php echo form_error('province','<span class="text-danger">','</span>'); ?>
                        </div>
                    </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Contact Number</label>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name="mobile_no" value="<?= $user['mobile_no']; ?>" class="form-control" placeholder="Contact Number">
                            <?php echo form_error('mobile_no','<span class="text-danger">','</span>'); ?>
                        </div>
                    </div>
                        </div><!-- form-group -->
                        
    			
    	<div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                              
                            </div>
                            <div class="col-md-8">
                            <input type="submit" name="userContact" class="btn btn-default" value="Save">
                        </div>
                    </div>
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