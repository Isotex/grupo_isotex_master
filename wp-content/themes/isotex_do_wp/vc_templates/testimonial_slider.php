<?php
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'testimonial_slider', 'testimonial_slider' );

function testimonial_slider( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'css_animation' => '',
		'autoplay' => '',
		'navigation' => '',
		'pagination' => ''
    ), $atts));
	wp_enqueue_style('owl-carousel');
	wp_enqueue_script('owl-carousel');
	$out = $animated = $animated_data ="";
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	
	$css_class = 'wpb_testimonial_slider wpb_content_element';
	$out .= '<div class="'.$css_class.$animated.'"'.$animated_data.'>';
	$out .= '<div class="rd_slides outer_nav" data-navigation="'.$navigation.'" data-auto="'.$autoplay.'" data-pagination="'.$pagination.'">';
	

	$out .= wpb_js_remove_wpautop($content);

	$out .= '</div> ';
	$out .= '</div> ';

	return $out;
}