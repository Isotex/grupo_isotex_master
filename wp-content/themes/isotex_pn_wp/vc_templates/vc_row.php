<?php
$output = $el_class = $row_layout = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding_top = $padding_bottom = $margin_bottom = $bg_paralax = $paralax = $bg_image_video = $bg_video = $video_raster = $video_autoplay = $video_mute = $video_control = $video_opacity = $video_quality = $html_opacity = $html_raster = $color = $video = $row_player = $style = $start_wrap = $end_wrap = '';
extract(shortcode_atts(array(
    'el_class'        => '',
	'row_layout'	  => '',
	'row_bg'	  	  => '',
	
    'bg_image'        => '',
	'bg_paralax'	  => '',
    'bg_image_repeat' => '',
	
	'mp4_video' 	  => '',
	'webm_video'	  => '',
	'ogg_video'		  => '',
	'poster_video' 	  => '',

	'bg_video'  	  => '',
	'video_autoplay'  => false,
	'video_mute'   	  => '',
	'video_control'   => '',
	'video_opacity'   => '',
	'video_raster'    => '',
	'video_quality'   => '',
	
	'html_opacity'   => '',
	'html_raster'    => '',
	
	'bg_color'        => '',
    'font_color'      => '',
    'padding_top'     => '',
	'padding_bottom'  => '',
    'margin_top'  	  => '',
	'margin_bottom'   => '',
	'border_top'      => '',
	'border_bottom'   => '',
	
), $atts));



$el_class = $this->getExtraClass($el_class);

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'section_row '.$el_class, $this->settings['base']);

$style = rowImage($row_bg, $bg_paralax, $bg_image, $bg_color, $bg_image_repeat, $padding_top, $padding_bottom, $margin_top, $margin_bottom, $border_top, $border_bottom);

if($row_bg == 'image' && (int)$bg_image > 0 && $bg_paralax=='yes'){
	wp_enqueue_script( 'parallax' ); 
	$paralax=' paralax_bg';
}
if($row_bg=='video' && $bg_video!='' && !empty($bg_video)){
	wp_enqueue_script( 'YTPlayer' );
	wp_enqueue_style('YTPlayer');
	$video = rowVideo($bg_video, $video_raster, $video_autoplay, $video_mute, $video_control, $video_opacity, $video_quality);

}
if($row_bg=='html5_video' && $mp4_video!='' && $webm_video!=''){
	$row_player =' HTML5video_wrap';
}
if($row_bg!='grey'){
	$color=$font_color;
}

if($row_bg=='video' && $bg_video!='' && !empty($bg_video)){ 
	if($bg_color !='' && !empty($bg_color)){
	$output .= '<div class="video_wrap clearfix" style="background-color:'.$bg_color.';">';
	}
	$output .= '<div class="row_player clearfix"'.$video.'>'; 
}
if($row_bg=='html5_video' && $mp4_video!='' && $webm_video!='' && $ogg_video!=''){
	if($bg_color !='' && !empty($bg_color)){
	$output .= '<div class="video_wrap clearfix" style="background-color:'.$bg_color.';">';
	}
}
	$output .= '<div class="'.$css_class.$color.$paralax.' clearfix section_'.$row_bg.'"'.$style.'>';
	
if($row_bg=='html5_video' && $mp4_video!='' && $webm_video!=''){
	$html5_poster = '';
	if($poster_video !='' && !empty($poster_video)){ 
		$html5_poster = wp_get_attachment_url( $poster_video, 'full' );
	}
	$output .= '<div class="HTML5video clearfix" data-opacity="'.$html_opacity.'">';
	$output .= '	<video autoplay loop poster="'.$html5_poster.'" id="bgvid">';
		$output .= '<source src="'.$webm_video.'" type="video/webm">';
		$output .= '<source src="'.$mp4_video.'" type="video/mp4">';
		if ($ogg_video!=''){$output .= '<source src="'.$ogg_video.'" type="video/mp4">';}
		$output .= '</video>';
		$output .= '</div>';
	if($html_raster=='yes'){
		$output .= '<div class="video-raster"></div>';
	}
}

if($row_layout!=' fullwidth'){
	$output .= '<div class="row">';
}

	$output .= '<div class="row_inner">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';

if($row_layout!=' fullwidth'){
	$output .= '</div>';
}

	$output .= '</div>';

if($row_bg=='video' && $bg_video!='' && !empty($bg_video)){ 
	if($bg_color !='' && !empty($bg_color)){
	$output .= '</div>';
	}
	$output .= '</div>'; 
}
if($row_bg=='html5_video' && $mp4_video!='' && $webm_video!='' && $ogg_video!=''){
	if($bg_color !='' && !empty($bg_color)){
	$output .= '</div>';
	}
}

echo $output;