 <div class="list-group dashboard-list">

  <a href="<?= base_url(); ?>profile/show_personal_info" class="list-group-item <?php if($url[2]=="show_personal_info"){echo 'active';}?>">Personal Information</a>
  <a  href="<?= base_url(); ?>profile/show_user_photo" class="list-group-item <?php if($url[2]=="show_user_photo"){echo 'active';}?>">Photo</a>
  <a href="<?= base_url(); ?>verifications/show_user_verifications" class="list-group-item <?php if($url[2]=="show_user_verifications"){echo 'active';}?>">Verfication</a>
  <a href="<?= base_url(); ?>preferences/show_user_preferences" class="list-group-item <?php if($url[2]=="show_user_preferences"){echo 'active';}?>">Preferences</a>
  <a href="<?= base_url(); ?>car/show_car" class="list-group-item <?php if($url[2]=="show_car"){echo 'active';}?>">Car</a>
  <a href="<?= base_url(); ?>profile/show_user_contact" class="list-group-item <?php if($url[2]=="show_user_contact"){echo 'active';}?>">Postal Address</a>
  <a href="<?= base_url(); ?>profile/show_user_nic" class="list-group-item <?php if($url[2]=="show_user_nic"){echo 'active';}?>">NIC Card</a>
  <a href="<?= base_url(); ?>profile/show_user_license" class="list-group-item <?php if($url[2]=="show_user_license"){echo 'active';}?>">License Card</a>
</div>