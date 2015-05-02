<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'images_content', 'images_content' );

function images_content( $atts, $content = null ) {
	$title=$description=$content_img=$img_size=$more=$align=$link=$css_animation=$animated=$animated_data='';
	extract(shortcode_atts(array(
        'title' => '',
		'description' => '',
		'content_img' => '',
		'img_size' => 'full',
		'more' => '',
		'align' => '',
		'link' => '',
		'css_animation' => '',
    ), $atts));
	$animated = $animated_data = '';
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	$out = '';
	$out .= '<div class="content-image wpb_content_element '.$align.$animated.'"'.$animated_data.'>';

	if(!empty($content_img) && $content_img !=''){
		$img_id = preg_replace('/[^\d]/', '', $content_img);
		$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));
		$out .= '<div class="s_image">'.$img['thumbnail'].'</div>';
	}

	$out .= '<div class="s_info">';
	if ($title != '' ){
		$out .= '<h3>'.$title.'</h3>';
	}
	if ($description != '' ){
		$out .= '<div class="desc">'.do_shortcode('[vc_column_text title=""]'.$description.'[/vc_column_text]').'</div>';
	}
	if ($more != '' ){
		$out .= '<div class="folio-more"><a href="'.$link.'"><span>'.$more.'</span></a></div>';
	}
	$out .= '</div>';
	$out .= '</div>';
	return $out;
}


