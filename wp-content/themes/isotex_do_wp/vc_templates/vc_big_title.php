<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'big_title', 'big_title' );

function big_title( $atts, $content = null ) {
	$title = $description = $align = '';
	extract(shortcode_atts(array(
        'title' => '',
		'description' => '',
		'align' => '',
		'title_size' => '',
		'title_tag' => '',
		'sep' => '',
		'style' => '',
		'color' => '',
		'accent_color' => '',
		'css_animation' => '',
    ), $atts));
	$animated = $animated_data = '';
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	$out = '';
	$fontsize='';
	if($title_size!=''){$fontsize=' style="font-size:'.$title_size.';"';}
	$out .= '<div class="landing-title'.$align.' wpb_content_element'.$animated.'"'.$animated_data.'>';
	if ($title != '' ){
		$out .= '<'.$title_tag.' class="landing-title-tag"'.$fontsize.'>'.$title.'</'.$title_tag.'>';
	}
	if($sep == 'yes'){
		$out .= do_shortcode('[vc_text_separator style="'.$style.'" color="'.$color.'" accent_color="'.$accent_color.'" el_width="fixed" el_class=""]');
	}
	if ($description != '' ){
		$out .= '<div class="landing-desc">'.$description.'</div>';
	}
	$out .= '</div>';
	return $out;
}


