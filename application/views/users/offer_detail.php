<?php include_once('includes/header.php'); ?>
  <div class="container main bg-main">  
<?php include_once('includes/search.php'); ?>
<?php

    $CI =& get_instance(); 
?>
<div class="row">
<div class="col-md-3">
      <div class="car-owner">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <strong>Car Owner</strong>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <img src="<?php echo base_url().'uploads/'.$rides['profile_img']; ?>" alt="Not found" class="img-responsive owner-img center-block">
                        <strong><?php echo $rides['name']; ?></strong>
                        <p><?php echo (date('Y') - date('Y',strtotime($rides['date_of_birth']))); ?> years old </p>
                        <?php if ($rides['nic_front_img'] && $rides['nic_back_img']) { ?>
                        <p><i class="fa fa-check-square"></i> Govt. ID verified</p><hr>
                        <?php } else { ?>
                        <p><i class="fa fa-square"></i> Govt. ID verified</p><hr>
                        <?php } ?>
                       <!--  <div class="verify">
                        <p><i class="fa fa-check-square-o"></i> <strong> Email address verified  </strong></p>
                        <p><i class="fa fa-check-square-o"></i> <strong> 778 Facebook friends </strong></p>
                        <p><i class="fa fa-check-square-o"></i> <strong> 1 LinkedIn connection </strong></p>
                        <p><i class="fa fa-check-square-o"></i> <strong> Agreement accepted </strong></p>
                        </div>
                        <hr> -->
                        <div class="car">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="<?php echo base_url().'uploads/'.$rides['car_image']; ?>" alt="not found" class="img-responsive">
                                </div><!-- col -->
                                <div class="col-md-8">
                                    
                                    <p>Car: <?php echo $rides['car_name']; ?></p>
                                    <p>Model: <?php echo $rides['car_model']; ?></p>
                                    <p>Color: <?php echo $rides['car_color']; ?></p>
                                </div><!-- col -->
                                
                            </div><!-- row -->
                        </div><!-- car -->
                     

                    </div><!-- panel-body -->
                </div><!-- panel-default -->
            </div><!-- col -->
        </div><!-- row -->
        </div><!-- car-owner -->
</div>


    <div class="col-md-6">
        <div class="journey-details">
            <div class="col-md-12">
                <p class="city-going text-center"><?php $from_location = explode(',', $rides['from_location']); echo $from_location[0]; ?><i class="fa fa-long-arrow-right "></i> <?php $to_location = explode(',', $rides['to_location']); echo $to_location[0]; ?></p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="all-details">Departure point</span>
                </div><!-- col -->
                <div class="col-md-8">
                    <span class="all-details-more"><i class="fa fa-circle-o green-icon"></i> <a href=""><?php echo $rides['pick_point']; ?></a></span>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row">
                <div class="col-md-4">
                    <span class="all-details">Drop-off point</span>
                </div><!-- col -->
                <div class="col-md-8">
                    <span class="all-details-more"><i class="fa fa-circle-o red-icon"></i> <a href=""><?php echo $rides['drop_point']; ?></a></span>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row">
                <div class="col-md-4">
                    <span class="all-details">
                 Departure date
                  </span>
                </div><!-- col -->
                <div class="col-md-8">
                    <span class="all-details-more"><i class="fa fa-calendar"></i> <strong><?php echo $rides['date']; ?> <span id="date-s">(estimated time of passage)</span></strong></span>
                </div><!-- col -->
            </div><!-- row -->


            <div class="row">
                <div class="col-md-4">
                    <span class="all-details">
                 Pickup Time
                  </span>
                </div><!-- col -->
                 <div class="col-md-8">
                    <span class="all-details-more"><i class="fa fa-clock-o"></i> <strong><?php echo date('h:i A', strtotime($rides['pickup_time'])); ?> <span id="date-s"></span></strong></span>
                </div><!-- col -->
            </div><!-- row -->

            <div class="row">
                <div class="col-md-4">
                    <span class="all-details">
                 Arrival Time
                  </span>
                </div><!-- col -->
                <div class="col-md-8">
                    <span class="all-details-more"><i class="fa fa-clock-o"></i> <strong><?php 

                    
                    echo $rides['arrival_time']; ?> <span id="date-s"></span></strong></span>
                </div><!-- col -->
            </div><!-- row -->

            <div class="row">
                <div class="col-md-4">
                    <span class="all-details">
                 Wait Time
                  </span>
                </div><!-- col -->
                 <div class="col-md-8">
                    <span class="all-details-more"><i class="fa fa-clock-o"></i> <strong><?php echo $rides['wait_time']; ?> <span id="date-s"></span></strong></span>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-short">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo base_url().'uploads/'.$rides['profile_img']; ?>" alt="Not found" class="img-responsive short-img">
                            </div><!-- col -->
                            <div class="col-md-9">
                                <strong><?php echo $rides['name']; ?></strong>
                                <p><?= $rides['biography']; ?></p>
                                <a href="#" contact="<?= $rides['mobile_no']; ?>" class="owner-contact btn btn-primary"><i class="fa fa-comments-o"></i> Contact the car owner</a>
                            </div><!-- col -->
                        </div><!-- row -->
                    </div><!-- profile-short -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- journey-details -->
    </div><!-- col-->

    <div class="col-md-3 right-section">
        <div class="row">
            <div class="col-md-6">
                <div class="section1">
                    <strong><?php echo $rides['charges_per_seat']; ?> <span id="currency">PKR</span></strong>
                    <p>per co-traveller</p>
                </div><!-- section1 -->
            </div><!-- col -->
            <div class="col-md-6">
                <div class="section2">
                    <strong><?= $available_seats = $rides['max_seats']-$rides['booking']; ?></strong>
                    <p>available seat</p>
                </div><!-- section2 -->
            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-md-12">
            <form action="<?php echo base_url(); ?>rideoffer/register" method="post">
                <div class="booking text-center">
                    <div class="form-group">
                        <i class="fa fa-bolt fa-2x"></i>  Your booking will be approved automatically
                    </div><!-- form-group -->
                    <div class="form-group">
                        <select name="number_of_seats" class="form-control">
                            <?php
                                 for ($i = 1; $i <= $available_seats; $i++) {
                            ?>
                                <option value="<?= $i; ?>"><?= $i; ?> seat</option>
                            <?php
                                 } 
                            ?>


                        </select>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="checkbox" id="term-conditions" name=""> I have read and accept the T&Cs and certify I am over 18 years old. 
                    </div><!-- form-group -->
                    <input type="hidden" class="book" name="ride_offer_id" value="<?php echo $rides['ride_offer_id']; ?>">
                    <input type="hidden" name="decision" value="<?php echo lcfirst($book); ?>">
                    <div class="form-group">
                        <input type="submit" disabled  name="registerRideOffer" value="<?php echo $book; ?> " class="btn btn-success btn-lg btn-block btn-book">
                    </div>
                </div><!-- booking -->
            </form>
            </div><!-- col -->
        </div><!-- row -->
      
    </div><!-- col -->
</div><!-- row -->
<div class="support">
<?php include_once('includes/footer.php'); ?>