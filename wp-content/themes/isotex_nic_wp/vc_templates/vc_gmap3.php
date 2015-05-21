<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');
add_shortcode( 'gmap', 'gmap' );
function gmap( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title' => '',
		'latitude' => '-7.796873',
		'longitude' => '110.369180',
		'size' => 200,
		'zoom' => 14,
		'el_class' => ''
    ), $atts)); 
	$out = '';
	wp_enqueue_script( 'gmap3' );
	wp_enqueue_script( 'googleapis' );
	$size = str_replace(array( 'px', ' ' ), array( '', '' ), $size);
	$out .= '<div class="gmaps_widget wpb_content_element">';
	$out .= '<div class="wpb_wrapper">';
	$out .= wpb_widget_title(array('title' => $title));
	$out .= '<div id="map" data-latitude="'.$latitude.'" data-longitude="'.$longitude.'" data-zoom="'.$zoom.'" data-height="'.$size.'"></div>';
	$out .= '</div>';
	$out .= '</div>';
	return $out;
}