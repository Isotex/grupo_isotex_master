<?php
$output = $color = $el_class = $css_animation = $animated = $animated_data = $icon = '';
extract(shortcode_atts(array(
    'color' => 'info',
    'el_class' => '',
    'css_animation' => ''
), $atts));
$el_class = $this->getExtraClass($el_class);


$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'notification-box wpb_content_element mbff'.$el_class, $this->settings['base']);
$animated = $animated_data = '';
//$css_class .= $this->getCSSAnimation($css_animation);
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
if($color=='success'){$icon='fa-check';}
elseif($color=='info'){$icon='fa-flag';}
elseif($color=='error'){$icon='fa-power-off';}
else{$icon='fa-exclamation-triangle';}

$output .= '<div class="'.$css_class.$animated.' notification-box-'.$color.'"'.$animated_data.'><i class="icon '.$icon.'"></i>'.wpb_js_remove_wpautop($content, true).'<a href="#" class="notification-close notification-close-'.$color.'"><i class="fa-times"></i></a></div>'.$this->endBlockComment('alert box')."\n";

echo $output;
