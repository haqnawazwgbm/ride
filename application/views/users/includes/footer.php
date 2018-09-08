<?php include 'larg_footer.php'; ?>
<?php include 'small_footer.php'; ?>
</div><!-- suppport -->
</div><!-- close container -->
    <script>
          function initMap() {
            var latitude1 = 39.46;
            var longitude1 = -0.36;
            var latitude2 = 40.40;
            var longitude2 = -3.68;
            var distance;
            
            var from_location = document.getElementById('from_location');
            var to_location = document.getElementById('to_location');
            var fromautocomplete = new google.maps.places.Autocomplete(from_location);
            var toautocomplete = new google.maps.places.Autocomplete(to_location);

            // Get from lat and lang 
             google.maps.event.addListener(fromautocomplete, 'place_changed', function () {
                var place = fromautocomplete.getPlace();
                latitude1 = place.geometry.location.lat();
                longitude1 = place.geometry.location.lng();
                        //alert("This function is working!");
                    //alert(place.name);
                   // alert(place.address_components[0].long_name);
                });

            // get to to lat and lang
             google.maps.event.addListener(toautocomplete, 'place_changed', function () {
                var place = toautocomplete.getPlace();
                latitude2 = place.geometry.location.lat();
                longitude2 = place.geometry.location.lng();
                
                   /*distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(latitude1, longitude1), new google.maps.LatLng(latitude2, longitude2)) / 1000; 
                   distance = distance.toFixed(2);*/

                   

                    var service = new google.maps.DistanceMatrixService();
                      service.getDistanceMatrix({
                        origins: [from_location.value],
                        destinations: [to_location.value],
                        travelMode: google.maps.TravelMode.DRIVING,
                        unitSystem: google.maps.UnitSystem.METRIC,
                        avoidHighways: false,
                        avoidTolls: false
                    }, function (response, status) {
                        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                            var distance = response.rows[0].elements[0].distance.text;
                            var duration = response.rows[0].elements[0].duration.text;
                            $('#distance').val(distance);
                            $('#arrival_time').val(duration);
                            $('.green-icon').next('strong').html(from_location.value);
                            $('.red-icon').next('strong').html(to_location.value);
                 
                        } else {
                            alert("Unable to find the distance via road.");
                        }
                    });

                });

                
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Ho735UhQQ3pDmXBaSC_FSnja26nsqoE&libraries=geometry,places&callback=initMap"
        async defer></script>
</body>
</html>