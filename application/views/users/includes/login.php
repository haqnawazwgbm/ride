<div class="drop-login-form">
            <div class="form-group">
            	<a href="#" class="btn btn-primary btn-block signup-btn"><i class="fa fa-facebook-official"></i> <span>Connect With Facebook</span></a>
            	<div class="login-divider">
            		<div class="or-login">or</div>
            	</div><!-- login-divider -->
            </div>
            <div class="text-center text-danger "></div>
            	<form action="" method="post" id="idForm">
            		<div class="form-group has-feedback">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="" value="">
                        <?php echo form_error('email','<span class="help-block">','</span>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password" placeholder="Password" required="">
                      <?php echo form_error('password','<span class="help-block">','</span>'); ?>
                    </div>
            		<div class="form-group">
            			<input type="checkbox">  Remember me 
            		</div>
                        <input type="hidden" name="loginSubmit" value="Submit">
            		<div class="form-group">
            			<input type="submit" id="loginSubmit" class="btn btn-success btn-block" value="Submit">
            		</div>
                  </form>
            		<div class="form-group">
            			<a href="">I've forgotten my password</a>
            		</div>
            		<div class="form-group">
            			<div><strong>Not a member yet?</strong></div>
            			<a href="<?php echo base_url(); ?>users/registration">Sign-up in 30 seconds</a>
            		</div>
            	
            </div><!-- drop-login-form -->
<script>
      $(document).ready(function() {
            $("#idForm").submit(function(e) {


    var url = "<?php echo base_url(); ?>users/login"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#idForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
               if (data) {
                  $('.text-danger').addClass('text-success').removeClass('text-danger').html('Login success. Redirecting');
                  window.location.reload();
               } else {
                  $('.text-danger').html('Invalid login. Please try again.');
               } // show response from the php script.
           }
         });
 e.preventDefault(); // avoid to execute the actual submit of the form.
    
});
      })
</script>