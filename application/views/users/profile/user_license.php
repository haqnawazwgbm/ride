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
         <h4>Upload Front License Copy</h4>
         <hr>
     
         <form action="<?= base_url(); ?>profile/upload_user_front_license" method="POST" enctype="multipart/form-data">
             <div class="form-group">
                 <div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;-webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  -ms-border-radius: 100%;
  -o-border-radius: 100%;
  border-radius: 100%;">
  <input type="hidden" value="<?= $user['id']; ?>" name="id">
    <img src="<?= base_url() . 'uploads/' . $user['license_front_img']; ?>" alt="...">
  </div>
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-default btn-file" style="left:5%;"><span class="fileinput-new">Upload License</span><span class="fileinput-exists">Change</span><input type="file" name="userfile"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
  <button type="submit" name="userFrontLicense" value="true">Upload</button>
</div>
             </div><!-- form-group -->
             <div class="form-group">
               <p class="formate">jpg, png, gif</p>
             </div><!-- form-group -->
         </form>   
       </div>

       <div class="col-md-6 text-center">
         <h4>Upload Back License Copy</h4>
         <hr>
     
         <form action="<?= base_url(); ?>profile/upload_user_back_license" method="POST" enctype="multipart/form-data">
             <div class="form-group">
                 <div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;-webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  -ms-border-radius: 100%;
  -o-border-radius: 100%;
  border-radius: 100%;">
  <input type="hidden" value="<?= $user['id']; ?>" name="id">
    <img src="<?= base_url() . 'uploads/' . $user['license_back_img']; ?>" alt="...">
  </div>
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
  <div>
    <span class="btn btn-default btn-file" style="left:5%;"><span class="fileinput-new">Upload License</span><span class="fileinput-exists">Change</span><input type="file" name="userfile"></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
  <button type="submit" name="userBackLicense" value="true">Upload</button>
</div>
             </div><!-- form-group -->
             <div class="form-group">
               <p class="formate">jpg, png, gif</p>
             </div><!-- form-group -->
         </form>   
       </div>
          
        
      </div><!-- row -->
    </div><!-- profile-area -->

    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->
<div class="support">
  <?php $this->load->view('users/includes/footer'); ?>