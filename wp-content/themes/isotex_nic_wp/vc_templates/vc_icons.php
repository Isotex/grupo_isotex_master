<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'icon_font', 'icon_font' );

function icon_font( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'icon' => '',
		'icon_awesome' => '',
		'icon_metrize' => '',
		'icon_color' => '',
		'size' => '',
		'align' => '',
		'link' => '',
		'css_animation' => ''
    ), $atts));
	$out = $font_icon = $icon_class = $animated = $animated_data = '';
	
	if ($icon == 'metrize' ){ $font_icon = 'icons-'.$icon_metrize; $icon_class='metrize'; }
	else { $font_icon = 'fa-'.$icon_awesome; $icon_class='awesome'; }
	
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	
	$out .= '<div class="icon_font '.$align.$animated.'"'.$animated_data.'>';
		if ($link != '' ){ $out .= '<a href="'.$link.'" target="blank">';}
		$out .= '<i class="'.$font_icon.'" style="color:'.$icon_color.'; font-size:'.$size.'px; line-height:'.$size.'px;"></i>';
		if ($link != '' ){ $out .= '</a>';}
	$out .= '</div>';
	
	return $out;
}


