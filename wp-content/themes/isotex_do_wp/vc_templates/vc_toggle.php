<?php
$output = $title = $el_class = $css_animation = $style = '';
extract(shortcode_atts(array(
    'title' => __("Click to toggle", "js_composer"),
	'css_animation' => '',
	'style' => '',
    'el_class' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);
$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_content_element toggle', $this->settings['base']);

$output .= '<div class="'.$css_class.$animated.' '.$style.'"'.$animated_data.'>';
$output .= apply_filters('wpb_toggle_heading', '<div class="toggle-head"><div class="toggle-head-sign"><i class="fa-plus"></i></div><p>'.$title.'</p></div>', array('title'=>$title));

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'toggle-content'.$el_class, $this->settings['base']);

$output .= '<div class="'.$css_class.'">'.wpb_js_remove_wpautop($content, true).'</div>'.$this->endBlockComment('toggle')."\n";
$output .= '</div>';
echo $output;