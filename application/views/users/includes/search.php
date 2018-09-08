<div class="search-bar">
    <div class="row">
        <form action="<?php echo base_url(); ?>users/search_from_to" method="GET">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon change-addon">
                            <i class="fa fa-map-marker form-icon green-icon">
                            </i>
                        </div>
                        <input class="form-control form-input-change" id="from_location" name="from_location" placeholder="Leaving from" type="text">
                        
                    </div>
                </div>
                <!-- form-group -->
            </div>
            <!-- col -->
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon change-addon">
                            <i class="fa fa-map-marker form-icon red-icon">
                            </i>
                        </div>
                        <input class="form-control form-input-change" id="to_location" name="to_location" placeholder="Going to" type="text">
                        </input>
                    </div>
                </div>
                <!-- form-group -->
            </div>
            <!-- col -->
            <div class="col-md-3">
                <div class="form-group">
                    <button class="btn btn-success search-car-btn" type="submit">
                        Find
                    </button>
                </div>
                <!-- form-group -->
            </div>
            <!-- col -->
        </form>
        <!-- close form -->
    </div>
    <!-- row -->
</div>
<!-- close search-bar -->
