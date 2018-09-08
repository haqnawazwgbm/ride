<?php
    $CI =& get_instance();
    $rides = $CI->get_rides();
?>
<section id="available">
    <div class="container">
        <h1>Thousands of rides available every day. Where do you want to go?
</h1>
<div class="row">
    <?php $i = 0; foreach ($rides as $ride) : if ($i == 6) { $i = 0; break; }  ?>
    <div class="col-md-4">
        <a href="<?= base_url() . 'Rideoffer/detail/' . $ride['id']; ?>">
            <div class="price-rate">
                <span id="from-city"><?= $ride['from_location']; ?></span>
                <span id="going-city"><?= $ride['to_location']; ?></span>
                <span id="city-rate">Price From
                <strong><?= $ride['charges_per_seat']; ?></strong>
                </span>

            </div>
        </a>
    </div><!-- col -->
<?php $i++; endforeach; ?>

</div><!-- row -->
    </div><!-- close container -->
</section><!-- close available -->