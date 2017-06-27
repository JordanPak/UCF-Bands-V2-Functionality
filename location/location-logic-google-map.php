<?php
/*
 *  UCFBands Theme Functionality
 *  CPT Logic: Location
 *
 *  @author Jordan Pakrosnis
*/


/**
 * UCFBands Location: Google Map
 *
 * Outputs Google Map with Marker at Event Location
 *
 * @author Jordan Pakrosnis
 * @return string
 */
function ucfbands_location_google_map( $latitude, $longitude ) {

    //-- NOTE: GOOGLE MAPS API MUST ALREADY BE LOADED! --//

    // Set Coordinates
    $coordinates = $latitude . ',' . $longitude;

    ?>

    <script>
        var myCenter=new google.maps.LatLng(<?php echo $coordinates; ?>);

        function initialize()
        {
        var mapProp = {
          center:myCenter,
          zoom:16,
          mapTypeId:google.maps.MapTypeId.ROADMAP,
          mapTypeControlOptions: {
            style:google.maps.MapTypeControlStyle.SMALL
          },
          };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
          position:myCenter,
          });

        marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <div id="googleMap" style="width:100%; height:250px;"></div>


    <?php

} // ucfbands_location_google_map()
