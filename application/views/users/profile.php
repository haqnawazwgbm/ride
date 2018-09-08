<?php include_once('includes/header.php'); ?>
         <div class="container" style="margin-top:50px;background-color: white;padding-top:30px;padding-left: 30px;padding-right: 30px;">
    <div class="row">
        <div class="col-md-8 text-center">
            <h3 >User profile </h3>
            <div class="signup-form">
                    <div class="row">
                    <div class="col-md-9 col-md-offset-3">
                    
                    <h4 class="form-h4-heading">Update user profile </h4>
                                <div class="col-lg-4 pull-left">
                                    <img width="150" src="<?php echo base_url().'uploads/'.$this->session->userdata('userImage'); ?>" id="user_img">
                                </div>
                                <div class="col-lg-8 pull-right">
                                     <form role="form" action="<?php echo base_url().'profile/update'; ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" name="name" value="<?php echo $user['name']; ?>">
                                                    <?php echo form_error('name','<span class="help-block">','</span>'); ?>
                                                </div>
                                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input class="form-control" value="<?php echo $user['mobile_no']; ?>" name="mobile_no" placeholder="Your mobile number">
                                                    <?php echo form_error('mobile_no','<span class="help-block">','</span>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Radio Buttons</label>
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
                                                    <label>Email</label>
                                                    <input class="form-control" name="email" placeholder="Your mobile number" value="<?php echo $user['email']; ?>">
                                                    <?php echo form_error('email','<span class="help-block">','</span>'); ?>
                                                </div>
                                                 <div class="form-group">
                                                    <label>CNIC</label>
                                                    <input class="form-control" value="<?php echo $user['cnic_no']; ?>" name="cnic_no" placeholder="Your CNIC number">
                                                    <?php echo form_error('cnic_no','<span class="help-block">','</span>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Profile Image</label>
                                                    <input type="file" name="userfile" id="select_file" size="30">
                                                </div>
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input class="form-control" value="<?php echo $user['address']; ?>" name="address" placeholder="Your address">
                                                    <?php echo form_error('address','<span class="help-block">','</span>'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Mother Name</label>
                                                    <input class="form-control" value="<?php echo $user['mother_name']; ?>" name="mother_name" placeholder="Your mother name">
                                                    <?php echo form_error('mother_name','<span class="help-block">','</span>'); ?>
                                                </div>
                                                
                                               
                                                <button type="submit" name="userProfile" value="yes" class="btn btn-default">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button>
                                            </form>
                                        </div>
            </div><!-- col -->
            </div><!-- row -->
            </div><!-- signup-form -->
        </div><!-- col -->
   
        <div class="col-md-4 text-center">
                <div class="facebook-like-box">
                    
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwebtipstricks&tabs=timeline&width=300&height=300&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=true&appId" width="300" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </div><!-- facebook-like-box -->
            </div><!-- col -->
                
            
            <div class="col-md-4 text-center">
            
            
            </div><!-- col -->
    </div>
    <div class="more-support">

<script>
    $(document).ready(function(){
       

        var inp = document.getElementById('select_file');
        inp.addEventListener('change', function(e){
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(){
                document.getElementById('user_img').src = this.result;
                };
            reader.readAsDataURL(file);
            },false);

    })
    
</script>

  
<?php include_once('includes/footer.php'); ?>