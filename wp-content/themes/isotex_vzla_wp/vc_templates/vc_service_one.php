<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'service_one', 'service_one' );

function service_one( $atts, $content = null ) {
	$title=$description=$icon=$icon_awesome=$icon_metrize=$more=$link='';
	extract(shortcode_atts(array(
        'title' => '',
		'description' => '',
		'icon' => '',
		'icon_awesome' => '',
		'icon_metrize' => '',
		'more' => '',
		'link' => ''
    ), $atts));
	$out = $service_icon = $icon_class = '';
	if ($icon == 'metrize' ){ $service_icon = 'icons-'.$icon_metrize; $icon_class='metrize'; }
	else { $service_icon = 'fa-'.$icon_awesome; $icon_class='awesome'; }
	

	$out .= '<div class="service service-one">';
	$out .= '<div class="s_icon '.$icon_class.'"><i class="'.$service_icon.'"></i></div>';
	$out .= '<div class="s_info">';
	if ($title != '' ){
		$out .= '<h3>'.$title.'</h3>';
	}
	if ($more != '' ){
		$out .= '<a class="tbutton small" href="'.$link.'"><span>'.$more.'</span></a>';
	}
	if ($description != '' ){
		$out .= '<p>'.$description.'</p>';
	}
	$out .= '</div>';
	$out .= '</div>';
	return $out;
}


