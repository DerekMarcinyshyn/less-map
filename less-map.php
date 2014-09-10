<?php
/*
Plugin Name:        LESS 17 Google Map
Plugin URI:         https://github.com/DerekMarcinyshyn/less-map
Description:        Google map for LESS 17
Version:            1.0.0
Author:             Derek Marcinyshyn
Author URI:         http://www.monasheemountainmultimedia.com/

License:            MIT License
License URI:        http://opensource.org/licenses/MIT
*/

function less_map($args) {
    $html = '<div id="map-canvas" class="map-canvas"></div>';
    $html .= '
<script type="text/javascript">
var map;
function initialize() {
    var mapOptions = {
        zoom: 14,
        center: new google.maps.LatLng(51.037955,-114.083560),
        styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":2},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":5},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]
    };
    map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);

    var marker = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(51.037955,-114.083560),
        title: "LESS 17"
    });
}

google.maps.event.addDomListener(window, "load", initialize);
 </script>
 <style>
    .map-canvas {
        height: 600px;
    }
 </style>';

    return $html;
}
add_shortcode('less-map', 'less_map');


/**
 * Add Google map javascript to header
 */
function add_google_map_javascript() {
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js');
}
add_action('wp_enqueue_scripts', 'add_google_map_javascript');