<?php include_once('includes/header.php'); ?>
<?php include_once('includes/slider.php'); ?>


<section id="top-form">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="search-form-heading">
                <h1>A shared trip is a better trip</h1><span class="car-icon"><i class="fa fa-car"></i></span>
                <span class="car-back"></span>
                <p>Carpool in good company.</p>
            </div><!-- searc-form-heading -->
        </div><!-- col -->
    </div><!-- row -->
    <div class="row">
        <form action="<?php echo base_url(); ?>users/search" method="GET">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o form-icon fa-2x"></i></div>
                        <input type="text" name="from_location" class="form-control input-lg form-input-change" id="from_location" placeholder="Leaving from">
                    </div>
                </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon change-addon"><i class="fa fa-circle-o form-icon fa-2x"></i></div>
                        <input name="to_location" type="text" class="form-control input-lg form-input-change" id="to_location" placeholder="Going to">
                    </div>
                </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group only-date">
                        <div class="input-group-addon change-addon "><i class="fa fa-calendar form-icon fa-2x"></i></div>
                        <input type="text" name="date" class="form-control input-lg form-input-change" id="exampleInputAmount" placeholder="Date">
                    </div>
                </div><!-- form-group -->
            </div><!-- col -->
            <div class="col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block btn-lg top-form-btn"><i class="fa fa-search"></i> Find a ride</button>
                </div><!-- form-group -->
            </div><!-- col -->
        </form><!-- close form -->
    </div><!-- row -->
</div><!-- close container -->
</section><!-- close top-form -->

<?php include_once('includes/from_to_prices.php'); ?>
<section id="about-fazal-web">
    <div class="container">
        <h2>3 things you'll love about BlaBlaCar</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="about-website-icon">
                <div class="about-website-icon">
                    <div class="about-icon">
                        <i class="fa fa-address-card-o fa-4x" aria-hidden="true"></i>

                    </div><!-- about-icon -->
                    <div class="about-heading">
                        <h4>You're in control</h4>
                    </div><!-- about-heading -->
                    <div class="about-body">
                        <p>Verified member profiles and ratings mean you know exactly who you're travelling with. </p>
                    </div><!-- about-body -->
                </div>
                </div><!-- about-website-icon -->
            </div><!-- col -->
            <div class="col-md-4">
                    <div class="about-website-icon">
                <div class="about-website-icon">
                    <div class="about-icon">
                        <i class="fa fa-address-book-o fa-4x"></i>
                    </div><!-- about-icon -->
                    <div class="about-heading">
                        <h4>You're in control</h4>
                    </div><!-- about-heading -->
                    <div class="about-body">
                        <p>Verified member profiles and ratings mean you know exactly who you're travelling with. </p>
                    </div><!-- about-body -->
                </div>
                </div><!-- about-website-icon -->
            </div><!-- col -->
            <div class="col-md-4">
                    <div class="about-website-icon">
                <div class="about-website-icon">
                    <div class="about-icon">
                        <i class="fa fa-map-marker fa-4x"></i>
                    </div><!-- about-icon -->
                    <div class="about-heading">
                        <h4>You're in control</h4>
                    </div><!-- about-heading -->
                    <div class="about-body">
                        <p>Verified member profiles and ratings mean you know exactly who you're travelling with. </p>
                    </div><!-- about-body -->
                </div>
                </div><!-- about-website-icon -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- close container -->
</section><!-- close about-fazal-web -->
<?php include_once('includes/how_it_works.php'); ?>

<section id="carpooling">
    <div class="container">
        <h2>Carpooling with BlaBlaCar</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="carpooling-img">
                    <img src="<?php echo base_url(); ?>assets/images/car1.jpeg" alt="Not Found" class="img-responsive">
                </div><!-- carpooling-img-->
                <div class="carpooling-body">
                    <strong>Let's define sharing economy</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis praesentium eligendi laborum odio iste culpa dignissimos, ipsam necessitatibus explicabo nostrum quod non soluta, accusantium earum. Perferendis hic laudantium excepturi animi. <a href="">Read More</a></p>
                </div><!-- carpooling-body -->
            </div><!-- col -->
            <div class="col-md-4">
                <div class="carpooling-img">
                    <img src="<?php echo base_url(); ?>assets/images/car2.jpg" alt="Not Found" class="img-responsive">
                </div><!-- carpooling-img-->
                <div class="carpooling-body">
                    <strong>Let's define sharing economy</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis praesentium eligendi laborum odio iste culpa dignissimos, ipsam necessitatibus explicabo nostrum quod non soluta, accusantium earum. Perferendis hic laudantium excepturi animi. <a href="">Read More</a></p>
                </div><!-- carpooling-body -->
            </div>
            <div class="col-md-4">
                <div class="carpooling-img">
                    <img src="<?php echo base_url(); ?>assets/images/car3.jpeg" alt="Not Found" class="img-responsive">
                </div><!-- carpooling-img-->
                <div class="carpooling-body">
                    <strong>Let's define sharing economy</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis praesentium eligendi laborum odio iste culpa dignissimos, ipsam necessitatibus explicabo nostrum quod non soluta, accusantium earum. Perferendis hic laudantium excepturi animi. <a href="">Read More</a></p>
                </div><!-- carpooling-body -->
            </div>
        </div><!-- row -->
    </div><!-- container -->
</section><!-- carpooling -->
<?php include_once('includes/footer.php'); ?>