<?php $url =  $this->uri->segment_array();
 ?>
<ul class="nav nav-tabs dashboard-nav">
  <li role="presentation" class="<?php if($url[2]=="show_personal_info"){echo 'active';}?>"><a href="<?= base_url(); ?>profile/show_personal_info">Profile</a></li>
  <li role="presentation" class="<?php if($url[2]=="user_rides"){echo 'active';}?>"><a href="<?= base_url(); ?>rideoffer/user_rides">Rides offered</a></li>
  <li role="presentation" class="<?php if($url[2]=="user_booked_rides"){echo 'active';}?>"><a href="<?= base_url(); ?>booking/user_booked_rides">Bookings</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
  <li role="presentation"><a href="#">Rides alert</a></li>
</ul>