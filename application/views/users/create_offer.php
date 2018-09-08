<?php include_once('includes/header.php'); ?>
            <div class="container" style="margin-top:50px;background-color: white;padding-top:30px;padding-left: 30px;padding-right: 30px;">

            <div class="row">
        <div class="col-md-12">
            <h4 ><a href="signup.php">Create offer </a></h4><hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding-left: 15px;">
                            <h4>Pick-up and drop-off points</h4>
                        </div>
                        <div class="panel-body">
                    <form action="<?= base_url(); ?>rideoffer/post" method="POST">
                <div class="form-group">
                    <label for="">From Location</label>
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o green-icon form-icon fa-2x"></i></div>
                        <input type="text" name="from_location" class="form-control  form-input-change" id="from_location" placeholder="Your departure point(address, city, station)...">
                    </div>
                    <?php echo form_error('from_location','<span class="text-danger">','</span>'); ?> 
                </div><!-- form-group -->

                <div class="form-group">
                    <label for="">To Location</label>
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o green-icon form-icon fa-2x"></i></div>
                        <input type="text" name="to_location" class="form-control  form-input-change" id="to_location" placeholder="Your distination point(address, city, station)...">
                    </div>
                    <?php echo form_error('to_location','<span class="text-danger">','</span>'); ?> 
                </div><!-- form-group -->

                 <div class="form-group">
                    <label for="">Arrival Time</label>
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o green-icon form-icon fa-2x"></i></div>
                        <input readonly type="text" name="arrival_time" class="form-control  form-input-change" id="arrival_time" placeholder="Arrival time">
                    </div>
                </div><!-- form-group -->
                <div class="bg-silver">
                    <div class="form-group">
                        <div class="row">
                             <div class="col-md-6">
                             <i class="fa fa-circle-o green-icon fa-2x"></i> <strong>From</strong> <i class="fa fa-arrow-right"></i> 
                            <i class="fa fa-circle-o red-icon fa-2x"></i> <strong>To</strong>
                                 </div>
                                <div class="col-md-3 pull-right">
                            <input type="text" id="distance" name="" class="form-control" placeholder="Price" disabled="disabled" value="0">
                            </div>
                        </div>
                                    
                    </div>
                </div>


                <div class="form-group">
                    <label for="">Pickup Point</label>
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o green-icon form-icon fa-2x"></i></div>
                        <input type="text" name="pick_point" class="form-control  form-input-change" id="exampleInputAmount" placeholder="Your pick point(address, city, station)...">
                    </div>
                    <?php echo form_error('pick_point','<span class="text-danger">','</span>'); ?> 
                </div><!-- form-group -->

                <div class="form-group">
                    <label for="">Drop Point</label>
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o green-icon form-icon fa-2x"></i></div>
                        <input type="text" name="drop_point" class="form-control  form-input-change" id="exampleInputAmount" placeholder="Your drop point(address, city, station)...">
                    </div>
                    <?php echo form_error('drop_point','<span class="text-danger">','</span>'); ?> 
                </div><!-- form-group -->


                <div class="form-group">
                    <label for="">Number Of Seats</label>
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o green-icon form-icon fa-2x"></i></div>
                        <input type="number" name="max_seats" max="4" class="form-control  form-input-change" id="exampleInputAmount" placeholder="Number of seats">
                    </div>
                     <?php echo form_error('max_seats','<span class="text-danger">','</span>'); ?>
                </div><!-- form-group -->

                <div class="form-group">
                    <label for="">Charges Per Seat</label>
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o green-icon form-icon fa-2x"></i></div>
                        <input type="text" name="charges_per_seat" class="form-control  form-input-change" id="exampleInputAmount" placeholder="Charges per seat"> 
                    </div>
                    <?php echo form_error('charges_per_seat','<span class="text-danger">','</span>'); ?>
                </div><!-- form-group -->

                <div class="form-group">
                    <label for="">Date</label>
                    <div class="input-group only-date">
                        <div class="input-group-addon change-addon "><i class="fa fa-calendar form-icon fa-2x"></i></div>
                        <input type="text" name="date" class="form-control input-lg form-input-change" id="date" placeholder="Date">
                    </div>
                    <?php echo form_error('date','<span class="text-danger">','</span>'); ?> 
                </div><!-- form-group -->
                <div class="form-group">
                    <label for="">Time</label>
                    <div class="input-group only-time">
                        <div class="input-group-addon change-addon "><i class="fa fa-calendar form-icon fa-2x"></i></div>
                        <input type="text" name="time" class="form-control input-lg form-input-change" id="time" placeholder="Time">
                    </div>
                      <?php echo form_error('time','<span class="text-danger">','</span>'); ?> 
                </div><!-- form-group -->
                 <div class="form-group">
                    <label for="">Wait Time</label>
                    <div class="input-group only-time">
                        <div class="input-group-addon change-addon "><i class="fa fa-calendar form-icon fa-2x"></i></div>
                        <input type="text" name="wait_time" class="form-control input-lg form-input-change" id="wait_time" placeholder="Wait Time">
                    </div>
                      <?php echo form_error('time','<span class="text-danger">','</span>'); ?> 
                </div><!-- form-group -->
            
                <div class="form-group">
                    <h4>Stopovers <i class="fa fa-question"></i></h4>
                    <p>Now add your stopover points - offering to pick up and drop off co-travellers along the way is a sure way to fill your car.</p>
                </div><!-- form-group -->
                        <button name="rideOffer" value="true"  class="btn btn-lg btn-info pull-right" style="margin-bottom: 15px;">Submit</button>
     
                        </div>
                </form>
                    </div>
                </div><!-- col -->
            </div><!-- row -->

        </div><!-- col -->
        
                
            
            
    </div>
    <div class="more-support">

<?php include_once('includes/footer.php'); ?>