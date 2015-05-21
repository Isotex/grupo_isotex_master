<?php
$output = $color = $icon = $size = $target = $href = $title = $call_text = $position = $el_class = $call_second_text = $theme = $button_icon = $i_icon = $style =  $css_animation = $animated = $animated_data = $style_css='';
extract(shortcode_atts(array(
    'color' => '',
	'border_color' => '',
	'font_color' => '',
    'style' => '',
	
	'theme' => '',
    'icon' => '',
	'icon_awesome' => '',
	'icon_metrize' => '',
    'size' => '',
    'target' => '',
    'href' => '',
    'title' => __('Text on the button', "js_composer"),
    'call_text' => '',
	'call_second_text' => '',
    'position' => '',
	'css_animation' => '',
    'el_class' => ''
), $atts));

if ($icon == 'metrize' ){ $button_icon = 'icons-'.$icon_metrize; $icon_class='metrize'; }
else { $button_icon = 'fa-'.$icon_awesome; $icon_class='awesome'; }

if ( $target == 'same' || $target == '_self' ) { $target = ''; }
$target = ( $target != '' ) ? ' target="'.$target.'"' : '';

$i_icon = ( $icon != 'none' ) ? '<i class="'.$button_icon.'"> </i>' : '';

$el_class = $this->getExtraClass($el_class);

$button_position = '';
if($position == ' rev' ){ $button_position = ' fll'; }
elseif($position == ' tac' ){ $button_position = ' mt'; }
else{ $button_position = ' flr';}

if ($style==' background'){
	if($font_color!=''){$style_css.='color:'.$font_color.'; ';}
	if($color!=''){$style_css.='background-color:'.$color.';"';}
	if($style_css!=''){$style_css = ' style="'.$style_css.'"';}
}
else{
	if($font_color!=''){$style_css.='color:'.$font_color.'; ';}
	if ($border_color!=''){$style_css.='border-color:'.$border_color.';"';}
	if($style_css!=''){$style_css = ' style="'.$style_css.'"';}
}

if ( $href != '' ) {
   $button = '<a class="tbutton'.$size.$button_position.'" title="'.$title.'" href="'.$href.'"'.$target.$style_css.'><span>'.$i_icon.$title.'</span></a>';
} else {
    $button = '';
}
$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'action mbs clearfix'.$position.$theme.$el_class, $this->settings['base']);

$output .= '<div class="'.$css_class.$animated.'"'.$animated_data.'>';
$output .= '<div class="inner">';
if ( $position != ' tac' ) {$output .= $button;}
$output .= '<div class="matn">';
$output .= '<h4>'. $call_text . '</h4>';
$output .= '<p>'. $call_second_text . '</p>';
$output .= '</div> ';
if ( $position == ' tac' ) {$output .= $button;}
$output .= '</div>';
$output .= '</div> ' . $this->endBlockComment('.action') . "\n";

echo $output;