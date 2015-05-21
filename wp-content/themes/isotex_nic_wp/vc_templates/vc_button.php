<?php
$output = $color = $size = $icon = $target = $href = $el_class = $title = $position = $icon_class = $button_icon = $i_icon = $style_css = $css_animation = '';
extract(shortcode_atts(array(
	'style' => '',
	'border_color' => '',
	'font_color' => '',
    'color' => '',
    'size' => '',
	'position' => '',
    'icon' => '',
	'icon_awesome' => '',
	'icon_metrize' => '',
    'target' => '_self',
    'href' => '#',
    'el_class' => '',
	'css_animation' => '',
    'title' => ''
), $atts));

$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}

if ($icon == 'metrize' ){ $button_icon = 'icons-'.$icon_metrize; $icon_class='metrize'; }
else { $button_icon = 'fa-'.$icon_awesome; $icon_class='awesome'; }
	
if ( $target == 'same' || $target == '_self' ) { $target = ''; }
$target = ( $target != '' ) ? ' target="'.$target.'"' : '';

$i_icon = ( $icon != 'none' ) ? '<i class="'.$button_icon.'"> </i>' : '';
$el_class = $this->getExtraClass($el_class);

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

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tbutton'.$size.$style.$el_class, $this->settings['base']);
	$output .= '<div class="'.$position.$animated.'"'.$animated_data.'>';
    $output .= '<a class="'.$css_class.'" title="'.$title.'" href="'.$href.'"'.$target.$style_css.'><span>'.$i_icon.$title.'</span></a>';
	$output .= '</div>';
echo $output . $this->endBlockComment('button') . "\n";