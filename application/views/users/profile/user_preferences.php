  <?php $this->load->view('users/includes/header'); ?>
<div class="container main bg-main">
<?php include_once 'include/top_menu.php'; ?>

<div class="container user">
  <div class="row">
    <div class="col-md-3">
<?php include 'include/left_menu.php'; ?>
</div>

<div class="col-md-9">
        <h3>Choose Preferences</h3><hr>
        <div class="profile-area">
        <div class="row">
            
                <div class="col-md-8 col-md-offset-2">
                    <form action="">

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-3">
                                <label for="">Chattiness</label>
                            </div>
                            <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok1"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok2"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok3"> <label for="thing"></label> 
                        </div>
                    </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-3">
                                <label for="">Smoking:</label>
                            </div>
                            <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok1"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok2"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok3"> <label for="thing"></label> 
                        </div>
                    </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-3">
                                <label for="">Pets:</label>
                            </div>
                            <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok1"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok2"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok3"> <label for="thing"></label> 
                        </div>
                    </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-3">
                                <label for="">Music:</label>
                            </div>
                            <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok1"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok2"> <label for="thing"></label> 
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="smok" class="check" value="smok3"> <label for="thing"></label> 
                        </div>
                    </div>
                        </div><!-- form-group -->
                        
                
        <div class="form-group">
                            <div class="row">
                            <div class="col-md-3">
                              
                            </div>
                            <div class="col-md-8">
                            <input type="submit" name="car-name" class="btn btn-default" value="Save">
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