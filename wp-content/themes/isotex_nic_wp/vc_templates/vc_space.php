<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'space', 'space' );

function space( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'height' => ''
    ), $atts));
	$out = $val = '';
	if($height != ''){
		$val = ' style="height:'.$height.'px;"';
	}
	$out .= '<div class="space"'.$val.'></div>';
	return $out;
}