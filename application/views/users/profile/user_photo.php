 <?php $this->load->view('users/includes/header'); ?>
<div class="container main bg-main">
<?php include_once 'include/top_menu.php'; ?>

<div class="container user">
  <div class="row">
    <div class="col-md-3">
<?php include 'include/left_menu.php'; ?>
    </div><!-- col -->
 <div class="col-md-9">
    	<h3>Photo</h3><hr>
    	<div class="profile-area">
    	<div class="row">
    	<div class="col-md-6 text-center">
        <h5 >Uplaod Photo</h5><hr>
         <form action="<?= base_url(); ?>profile/upload_user_image" method="POST"  enctype="multipart/form-data">
          <input type="hidden" value="<?= $user['id']; ?>" name="id">
             <div class="form-group">
                 <div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;-webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  -ms-border-radius: 100%;
  -o-border-radius: 100%;
  border-radius: 100%;">
    <img src="<?= base_url().'uploads/'.$user['profile_img']; ?>" alt="...">
  </div>
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-default btn-file" style="left:5%;"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="userfile"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

  </div>
  <button type="submit" name="userImage" value="true">Upload</button>
</div>
             </div><!-- form-group -->
             <div class="form-group">
               <p class="formate">jpg, png, gif</p>
             </div><!-- form-group -->
         </form>   
        </div>	
        <div class="col-md-6 text-center">
            <h5>Example of good photo</h5><hr>
            <img src="<?= base_url().'uploads/'.$user['profile_img']; ?>" alt="not found" class="img-responsive good-img center-block">
            <br>
              <div class="well text-left">
                  <ul>
                      <li>High Quality</li>
                      <li>Front Of Camera</li>
                      <li>You alone</li>
                  </ul>
              </div>
        </div>
    			
    		
    	</div><!-- row -->
    </div><!-- profile-area -->

    </div><!-- col -->
	</div><!-- row -->
</div><!-- container -->
<div class="support">
  <?php $this->load->view('users/includes/footer'); ?>