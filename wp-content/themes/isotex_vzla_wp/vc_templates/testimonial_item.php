<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'testimonial_item', 'testimonial_item' );

function testimonial_item( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'name' => '',
		'company' => '',
		'testimoni' => ''
    ), $atts));
	$out = $img_id = $img = $img2 = $company2 = '';
	if($company != ''){$company2 = ' - '.$company;}
	
		$out .= '<div class="testimonial-item">';
			$out .= '<div class="testimonial-content">';
				$out .= '<p>'.$testimoni.'</p>';
			$out .= '</div>';
			$out .= '<p class="testimonial-desc">';
				$out .= '<span class="testimonial-details"><span class="testimonial-name">'.$name.'</span><span class="testimonial-company">'.$company2.'</span></span>';
			$out .= '</p>';
		$out .= '</div>';

	return $out;
}


