<?php
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'testimonial', 'testimonial' );

function testimonial( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'style' => '',
        'name' => '',
		'photo' => '',
		'company' => '',
		'testimoni' => '',
		'css_animation' => ''
    ), $atts));
	$out = $img_id = $img = $img2 = $company2 = '';
	$animated=$animated_data='';
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	$img_id = preg_replace('/[^\d]/', '', $photo);
	$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => 'cart-nav' ));
	$img2 = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => 'facebook' ));
	if($company != ''){$company2 = ' - '.$company;}
	
	if($style == 'style1'){
		$out .= '<div class="testimonial wpb_content_element'.$animated.'"'.$animated_data.'>';
			$out .= '<div class="testimonial-content">';
				$out .= '<p>'.$testimoni.'</p>';
				$out .= '<div class="testimonial-arrow"></div>';
			$out .= '</div>';
			$out .= '<p class="testimonial-desc">';
				$out .= $img['thumbnail'];
				$out .= '<span class="testimonial-details"><span class="testimonial-name">'.$name.'</span><span class="testimonial-company">'.$company.'</span></span>';
			$out .= '</p>';
		$out .= '</div>';
	}
	else{
		$out .= '<div class="testimonial2 wpb_content_element'.$animated.'"'.$animated_data.'>';
			$out .= $img2['thumbnail'];
			$out .= '<div class="testimonial-content">';
				$out .= '<p>'.$testimoni.'</p>';
			$out .= '</div>';
			$out .= '<p class="testimonial-desc">';
				$out .= '<span class="testimonial-details"><span class="testimonial-name">'.$name.'</span><span class="testimonial-company">'.$company2.'</span></span>';
			$out .= '</p>';
		$out .= '</div>';
	}
	return $out;
}


