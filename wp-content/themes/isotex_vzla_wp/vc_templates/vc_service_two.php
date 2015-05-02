<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'service_two', 'service_two' );

function service_two( $atts, $content = null ) {
	$title=$description=$icon=$icon_awesome=$icon_metrize=$icon_img=$img_size=$more=$align=$link=$css_animation=$animated=$animated_data='';
	extract(shortcode_atts(array(
        'title' => '',
		'description' => '',
		'icon' => '',
		'icon_awesome' => '',
		'icon_metrize' => '',
		'icon_img' => '',
		'img_size' => 'full',
		'more' => '',
		'align' => '',
		'link' => '',
		'css_animation' => ''
    ), $atts));
	$out = $service_icon = $icon_class = $animated = $animated_data = '';
	if ($icon == 'metrize' ){ $service_icon = 'icons-'.$icon_metrize; $icon_class='metrize'; }
	else { $service_icon = 'fa-'.$icon_awesome; $icon_class='awesome'; }
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	$out .= '<div class="service service-two '.$align.$animated.'"'.$animated_data.'>';
	if($icon != 'custom'){
		$out .= '<div class="s_icon '.$icon_class.'"><i class="'.$service_icon.'"></i></div>';
	}
	else{
		if(!empty($icon_img) && $icon_img !=''){
			$img_id = preg_replace('/[^\d]/', '', $icon_img);
			$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));
			$out .= '<div class="s_icon">'.$img['thumbnail'].'</div>';
		}
	}
	$out .= '<div class="s_info">';
	if ($title != '' ){
		$out .= '<h3>'.$title.'</h3>';
	}
	if ($description != '' ){
		$out .= '<p>'.$description.'</p>';
	}
	if ($more != '' ){
		$out .= '<a class="tbutton small" href="'.$link.'"><span>'.$more.'</span></a>';
	}
	$out .= '</div>';
	$out .= '</div>';
	return $out;
}


