<div id="increase-map" class="border-top border-bottom"></div>
<script>
    function initMap() {
        var uluru = {lat: <?php the_field('increase_map_center_lat','options'); ?>, lng: <?php the_field('increase_map_center_lng','options'); ?>};
        var map = new google.maps.Map(document.getElementById('increase-map'), {
            zoom: <?php the_field('increase_map_zoom','options'); ?>,
            center: uluru,
            //disableDefaultUI: true,
            mapTypeControl:true,
            styles:
            [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
        });

        setMarkers(map);

        map.setTilt(40);

        function setMarkers(map) {

            <?php if (have_rows('increase_map_markers','options')) { ?>
            var markers = [
                <?php while (have_rows('increase_map_markers','options')){ the_row(); ?>
                [
                    '<div><div class="text-center text-light"><strong><?php the_sub_field("map_markers_title"); ?></strong></div><?php if(get_sub_field("map_markers_driving") || get_sub_field("map_markers_cycling") || get_sub_field("map_markers_walking")){ ?><div class="container-fluid border-top pt-2 mt-2" style="min-width: 250px;"><div class="row"><?php if(get_sub_field("map_markers_driving")){ ?><div class="col text-center"><span class="increaseicons-car clearfix text-primary h6 mb-1"></span><?php the_sub_field("map_markers_driving"); ?> <?php _e("min","theme") ?></div><?php }; ?><?php if(get_sub_field("map_markers_cycling")){ ?><div class="col text-center"><span class="increaseicons-bicycle clearfix text-primary h4 mb-1"></span><?php the_sub_field("map_markers_cycling"); ?> <?php _e("min","theme") ?></div><?php }; ?><?php if(get_sub_field("map_markers_walking")){ ?><div class="col text-center"><span class="increaseicons-on-foot clearfix text-primary h5 mb-1"></span><?php the_sub_field("map_markers_walking"); ?> <?php _e("min","theme") ?></div><?php }; ?></div></div><?php }; ?><?php if(get_sub_field("map_markers_description")){ ?><div class="border-top pt-2 mt-2"><?php echo get_sub_field("map_markers_description"); ?></div><?php }; ?></div>',
                    <?php the_sub_field("map_markers_lat"); ?>,
                    <?php the_sub_field("map_markers_lng"); ?>,
                    '<?php echo get_sub_field("map_markers_icon")["url"]; ?>',
                    84,
                    104,
                    138,
                    170,

                ],
                <?php }; ?>
            ];
            <?php }; ?>

            /*var markers = [

                ['Parc Mogosoaia', 44.527073, 25.994295],
                ['Primaria', 44.5328619, 25.9976176]
            ];*/

            markers.reverse();

            var infowindow = new google.maps.InfoWindow();
            // Adds markers to the map.

            for (var i = 0; i < markers.length; i++) {







                var marker_item = markers[i];
                var marker = new google.maps.Marker({
                    position: {lat: marker_item[1], lng: marker_item[2]},
                    map: map,
                    //title: marker_item[0],
                    zIndex: i,


                });





                if(marker_item[3]){
                    marker.setIcon ({
                        url: marker_item[3],
                        // This marker is 20 pixels wide by 32 pixels high.
                        size: new google.maps.Size(marker_item[4], marker_item[5]),
                        scaledSize: new google.maps.Size(marker_item[4], marker_item[5]),
                        // The origin for this image is (0, 0).
                        origin: new google.maps.Point(0, 0), //modifica pentru centru img
                        // The anchor for this image is the base of the flagpole at (0, 32).
                        anchor: new google.maps.Point(marker_item[4]/2, marker_item[5]) //modifica pentru centru img
                    });
                };


                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setOptions({maxWidth : 300});
                        infowindow.setContent(markers[i][0]);
                        infowindow.open(map, marker);
                    }
                })(marker, i));


            }
        }


          var flightPlanCoordinates = [
    {lat: 44.428774, lng: 26.128919},
    {lat:  44.428688, lng: 26.128953},
    {lat: 44.428893 , lng: 26.129693 },
    {lat: 44.429284 , lng: 26.129513},
    {lat: 44.429251, lng: 26.129357 },
    {lat: 44.429150, lng: 26.129387 },
    {lat:  44.429074,  lng: 26.129073 },
    {lat:44.428863, lng: 26.129181 },
    {lat: 44.428782, lng: 26.128928 },

  ];
  var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#8dbc2b',
    strokeOpacity: 4.0,
    strokeWeight: 4
  });

  flightPath.setMap(map);

        /*var marker = new google.maps.Marker({
            position: {lat: 44.527073, lng: 25.994295},
            map: map
        });*/
    }
    jQuery(document).ready(function() {
            var count = jQuery(".gm-style > div > div > div > div > div   ").size();

            console.log(count);
    });



</script>

<script async defer
src="//maps.googleapis.com/maps/api/js?key=<?php the_field('increase_google_maps_api_key','options'); ?>&callback=initMap">
</script>

<style media="screen">
    /* div.gm-style > div > div > div > div > div:nth-child(17) > img  {
        width: 250px !important;
        height: 250px !important;
    } */
</style>
