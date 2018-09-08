<nav class="navbar navbar-default  navbar-change" role="navigation">
	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>home/home"><b>Double Savaree</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			</ul>
			<?php if (!$this->session->userdata('isUserLoggedIn')) {

			?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url(); ?>users/registration" class="account-btn">Sign up</a></li>
				<li><a href="#" class="account-btn already-have-account">Log in</a></li>
			</ul>
			<?php } else { ?>
				<div class="pull-right">
		        <ul class="nav navbar-nav">
		            <li><p class="navbar-btn"><a href="<?php echo base_url(); ?>rideoffer/post" class="navbar-offer btn btn-success"><i class="fa fa-plus-circle"></i> Offer a ride</a></p></li>
		  
		           
		            <li clsass="dropdown">
			          <a href="#" class="dropdown-toggle account-btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dashboard <span class="caret account-btn"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="<?= base_url(); ?>profile/show_personal_info">Profile</a></li>
			            <li><a href="<?= base_url(); ?>verifications/show_user_verifications">Verfication</a></li>
			            <li><a href="<?= base_url(); ?>profile/show_personal_info">Setting</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
			          </ul>
			        </li>
		        </ul>     
				</div>

			<?php 	} ?>		
			
		
		</div><!-- /.navbar-collapse -->
	</div>
</nav><!-- close navbar -->
<div class="col-lg-12">
	 <?php 
	 	$success = $this->session->flashdata('success');
	 	$warning = $this->session->flashdata('warning');
	 	$danger = $this->session->flashdata('danger');
	 	if ($success) {
	 		echo '<div class="alert alert-success alert-dismissable">
	 		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success!</strong>'.$success['message'].'
			</div>';

	 	} elseif ($warning) {
	 		echo '<div class="alert alert-warning alert-dismissable">
	 		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Failed!</strong>'.$warning['message'].	'
			</div>';

	 	} elseif ($danger) {
	 		echo '<div class="alert alert-danger alert-dismissable">
	 		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Failed!</strong>'.$danger['message'].	'
			</div>'; 
	 	}
		?>
	</div>