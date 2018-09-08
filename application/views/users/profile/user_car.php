 <?php $this->load->view('users/includes/header'); ?>
<div class="container main bg-main">
<?php include_once 'include/top_menu.php'; ?>

<div class="container user">
  <div class="row">
    <div class="col-md-3">
<?php include 'include/left_menu.php'; ?>
    </div><!-- col -->
 <div class="col-md-9">
    	<h3>Add Car Information</h3><hr>
    	<div class="profile-area">
    	<div class="row">
    		
    			<div class="col-md-8 col-md-offset-2">
    				<form action="<?= base_url(); ?>car/update_car" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">

    					<div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Car Name</label>
                            </div>
                            <div class="col-md-8">
    						<input type="text" name="car_name" value="<?= $user['car_name']; ?>" class="form-control" placeholder="Car Name">
                            <?php echo form_error('car_name','<span class="text-danger">','</span>'); ?>
                        </div>
                    </div>
    					</div><!-- form-group -->

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Car Modal</label>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name="car_model" class="form-control" placeholder="Car Modal" value="<?= $user['car_model']; ?>">
                            <?php echo form_error('car_model','<span class="text-danger">','</span>'); ?>
                        </div>
                    </div>
                        </div><!-- form-group -->
                     
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Car Number</label>
                            </div>
                            <div class="col-md-8">
                            <input type="text" name="car_number" class="form-control" value="<?= $user['car_number']; ?>" placeholder="Car Number">
                            <?php echo form_error('car_number','<span class="text-danger">','</span>'); ?>
                        </div>
                    </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Car Color</label>
                            </div>
                            <div class="col-md-8">
                            <div id="wColorPicker" class="hoverBox"></div>
<input id="wColorPicker_input" type="text" name="car_color" value="<?= $user['car_color']; ?>"/>
<?php echo form_error('car_color','<span class="text-danger">','</span>'); ?>

                        </div>

                    </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="">Car Image</label>
                            </div>
                            <div class="col-md-8">
                             <div class="form-group">
                                     <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;-webkit-border-radius: 100%;
                      -moz-border-radius: 100%;
                      -ms-border-radius: 100%;
                      -o-border-radius: 100%;
                      border-radius: 100%;">
                        <img src="<?= base_url().'uploads/'.@$user['car_image']; ?>" alt="...">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                      <div>
                        <span class="btn btn-default btn-file" style="left:5%;"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="userfile"></span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        

                      </div>
                      <button type="submit" name="userImage" value="true">Upload</button>
                    </div>

                                 </div><!-- form-group -->
                        </div>
                    </div>
                        </div><!-- form-group -->
    					
    					
    			
    	<div class="form-group">
                            <div class="row">
                            <div class="col-md-4">
                              
                            </div>
                            <div class="col-md-8">
                            <input type="submit" name="submitCar" class="btn btn-default" value="Save">
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