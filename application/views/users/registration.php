<?php include_once('includes/header.php'); ?>

<div class="container" style="margin-top:50px;background-color: white;padding-top:30px;padding-left: 30px;padding-right: 30px;">
    <div class="row">
        <div class="col-md-8 text-center">
            <h3 >Not yet a member? Sign up for free! </h3>
            <div class="signup-form">
                    <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                    <h4 class="form-h4-heading">In just 2 seconds </h4>
                    <a href="" class="btn btn-primary signup-btn btn-block"><i class="fa fa-facebook-official"></i> <span>Contact with Facebook</span></a>
                    <p>For a more trusted profile, enable access to friends list. This ONLY displays number of friends. </p>
                    <div class="line">
                        <div class="line-head"> or </div>
                    </div><!-- line-head -->
                    <h4 class="form-h4-heading">In just 2 seconds </h4>
    <form action="<?php echo  base_url(); ?>users/registration" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
          <?php echo form_error('name','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
          <?php echo form_error('email','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password" required="">
          <?php echo form_error('password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="conf_password" placeholder="Confirm password" required="">
          <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
        </div>
        <div class="form-group">
            <?php
            if(!empty($user['gender']) && $user['gender'] == 'Female'){
                $fcheck = 'checked="checked"';
                $mcheck = '';
            }else{
                $mcheck = 'checked="checked"';
                $fcheck = '';
            }
            ?>
            <div class="radio">
                <label>
                <input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
                Male
                </label>
            </div>
            <div class="radio">
                <label>
                  <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
                  Female
                </label>
            </div>
        </div>
            <div class="form-group">
                        <input type="submit" name="regisSubmit" value="Signup With My Email" class="btn btn-block btn-success submit-signup">
          </div><!-- form-group -->
         </form>
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
            <div class="line-draw"></div>
            <div class="safty">
                <h3>Trust && Safty</h3>
                <img src="<?php echo base_url(); ?>assets/images/safe.jpg" alt="not found" class="img-responsive center-block img-thumbnail">
                </div><!-- safty -->
            </div><!-- col -->
    </div>
    <div class="more-support">
<?php include_once('includes/footer.php'); ?>