<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'list_icon', 'list_icon' );

function list_icon( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'list_text' => '',
		'icon' => '',
		'icon_color' => '',
		'icon_awesome' => '',
		'icon_metrize' => '',
		'css_animation' => '',
    ), $atts));
	$animated = $animated_data = $icon_list_color = '';
	if($icon_color){$icon_list_color = ' style="color:'.$icon_color.';"';}
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	$out = $li_icon = '';
	if ($icon == 'metrize' ){ $li_icon = 'icons-'.$icon_metrize; $icon_class='metrize'; }
	else { $li_icon = 'fa-'.$icon_awesome; $icon_class='awesome'; }
	
	$list_text_array = explode(",", $list_text);
	$out .= '<div class="list-icon wpb_content_element'.$animated.'"'.$animated_data.'>';
	$out .= '<ul>';
	foreach ($list_text_array as $text) {
		$out .= '<li><i class="'.$li_icon.'"'.$icon_list_color.'></i><span>'.$text.'</span></li>';
	}
	$out .= '</ul>';
	$out .= '</div>';
	return $out;
}


