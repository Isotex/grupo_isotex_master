<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'counter', 'counter' );

function counter( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title' => '',
        'value' => '',
		'units_before' => '',
		'units_after' => '',
		'colored' => ''
    ), $atts));
	$out = $color = '';
	wp_enqueue_script('countTO');
	if($colored == 'yes'){$color='colored';}
	else{$color='';}
	$out .= '<div class="counter wpb_content_element">';
		$out .= '<div class="counter-value '.$color.'">';
		if($units_before != ''){
			$out .= '<span>'.$units_before.'</span>';
		}
		$out .= '<span class="display-value" data-to="'.$value.'"></span>';
		if($units_after != ''){
			$out .= '<span>'.$units_after.'</span>';
		}
		$out .= '</div>';
		if($title != ''){
			$out .= '<h5 class="counter-title">'.$title.'</h5>';
		}
	$out .= '</div>';
	
	return $out;
}


