<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'pricing_table', 'pricing_table' );

function pricing_table( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title' => 'Pricing Table',
		'table_pricing' => '',
		'table_currency' => '',
		'table_feature' => '',
		'table_button' => '',
		'table_link' => '',
		'table_time' => '',
		'featured' => ''
    ), $atts)); 
	$out = '';
	$i=1;
	$table_feature_array = explode(",", $table_feature);
	if ($featured == 'yes'){$featured=' featured';}
	$out .= '<div class="pricing-table'.$featured.' wpb_content_element">';
		$out .= '<div class="head">';
			$out .= '<h4>'.$title.'</h4>';
			if($table_currency && $table_pricing && $table_time ){
				$out .= '<div class="circle">';
				$out .= '<div class="price-table"><span>'.$table_currency.'</span>'.$table_pricing.'</div>';
				$out .= '<div>'.$table_time.'</div>';
				$out .= '</div>';
			}
			
		$out .= '</div>';
		$out .= '<div class="price-content">';
			$out .= '<ul class="package-content">';
				foreach ($table_feature_array as $feature) {
					if ($i%2==0) {$out .= '<li class="second">'.$feature.'</li>';}
					else {$out .= '<li>'.$feature.'</li>';}
					$i++;
				}
			$out .= '</ul>';
			$out .= '<a href="'.$table_link.'" class="pricing-button"><span>'.$table_button.'</span></a>';
		$out .= '</div>';
	$out .= '</div>';

	return $out;
}



