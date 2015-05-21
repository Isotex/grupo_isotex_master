<?php
$output = $title = $el_class = $css_animation = $animated = $animated_data = '';

extract(shortcode_atts(array(
	'title' => '',
    'el_class' => '',
    'css_animation' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'wpb_text_column wpb_content_element '.$el_class, $this->settings['base']);
$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
$output .= "\n\t".'<div class="'.$css_class.$animated.'"'.$animated_data.'>';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => ''));
$output .= "\n\t\t".wpb_js_remove_wpautop($content, true);
$output .= "\n\t".'</div> ' . $this->endBlockComment('.wpb_text_column');

echo $output;