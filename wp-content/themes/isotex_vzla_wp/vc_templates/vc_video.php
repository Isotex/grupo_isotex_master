<?php
$output = $title = $link = $size = $el_class = $css_animation = $animated = $animated_data = '';
extract(shortcode_atts(array(
	'title' => '',
	'link' => 'http://vimeo.com/23237102',
	'size' => ( isset($content_width) ) ? $content_width : 500,
	'el_class' => '',
	'css_animation' => '',
), $atts));
$animated = $animated_data = '';
if ( $link == '' ) { return null; }
$el_class = $this->getExtraClass($el_class);
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
$video_w = ( isset($content_width) ) ? $content_width : 500;
$video_h = $video_w/1.61; //1.61 golden ratio
global $wp_embed;
$embed_args = array(
	'title' => 0,
	'byline' => 0,
	'portrait' => 0,
	'color' => 'ffffff',
	'rel' => 0,
	'showinfo' => 0,
);
$embed = wp_oembed_get( $link, $embed_args );

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_video_widget wpb_content_element'.$el_class, $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.$animated.'"'.$animated_data.'>';
    $output .= "\n\t\t".'<div class="wpb_wrapper">';
        $output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_video_heading'));
        $output .= '<div class="wpb_video_wrapper video-container">' . $embed . '</div>';
        $output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
    $output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_video_widget');

echo $output;