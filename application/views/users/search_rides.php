<?php include_once('includes/header.php'); ?>
<div class="container main bg-main">	
<?php include_once('includes/search.php'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="row">
		</div><!-- row -->
		<?php $notFoundMsg = '';
		 if (isset ($rides) && ! empty($rides)) {
			 foreach($rides as $ride):
			 	if ($ride['name'] == '' && $ride['from_location'] == '' && $ride['to_location'] == '') {
			 		$notFoundMsg = '<h2>Record not found.</h2>';
			 		continue;
			 	}
			 	$remaining_seats = $ride['max_seats']-$ride['booking'];
			  ?>
		<div class="row profiles">
			<div class="col-md-3">
				<div class="user-img">
					<img src="<?php echo base_url().'uploads/'.$ride['profile_img']; ?>" alt="Not Found" class="img-responsive img-circle">
					<span class="user-name"><?php echo $ride['name']; ?></span>
					<span class="user-old">Age: <?php echo (date('Y') - date('Y',strtotime($ride['date_of_birth']))); ?></span>
					<span class="connect-on-facebook">
						<i class="fa fa-facebook-official"></i> 5667 friends
					</span>
				</div>
			</div><!-- col -->
			<div class="col-md-9 right-bdr">
				<div class="more-details">
					<div class="row">
						<div class="col-md-8">
							<p class="day"><?php echo $ride['date']; ?></p>
							<p class="city-going"><?php $from_location = explode(',', $ride['from_location']); echo $from_location[0];?><i class="fa fa-long-arrow-right "></i> <?php $to_location = explode(',', $ride['to_location']); echo $to_location[0]; ?></p>
							<p class="city-going text-center"><a href="<?php echo base_url().'rideoffer/detail/'.$ride['ride_offer_id']; ?>">Show Detail</a></p>
						</div><!-- col-->
						<div class="col-md-4">
							<p class="user-price"><?php echo $ride['charges_per_seat'].' PKR'; ?></p>
							<p>Per-co-traveller</p>
						</div><!-- col -->
					</div><!-- row -->

					<div class="row">
						<div class="col-md-8">
							<p class="circle-head"><i class="fa fa-circle-o green-icon"></i> <span>From <?php echo $ride['from_location']; ?></span></p>
						</div><!-- col-->
						<div class="col-md-4">
							<p class="sets-left"><span id="digits"><?php echo $remaining_seats; ?></span> seats left</p>
							
						</div><!-- col -->
					</div><!-- row -->

					<div class="row">
						<div class="col-md-8">
							<p class="circle-head"><i class="fa fa-circle-o red-icon"></i><span> To <?php echo $ride['to_location']; ?></span></p>
						</div><!-- col-->
						<div class="col-md-4">
							<p class="sets-left">
							<i class="fa fa-user-circle-o fa-2x"></i>
							<i class="fa fa-universal-access fa-2x"></i>
							</p>
							
						</div><!-- col -->
					</div><!-- row -->
				</div>
			</div><!-- col -->
		</div><!-- row -->
	<?php endforeach;

		}else {
			$notFoundMsg = '<h2>Record not found.</h2>';
			}
			echo $notFoundMsg;
			 ?>


	</div><!-- col -->
</div><!-- row -->
<div class="support">
<?php include_once('includes/footer.php'); ?>