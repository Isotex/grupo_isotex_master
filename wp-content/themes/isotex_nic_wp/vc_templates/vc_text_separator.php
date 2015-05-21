<?php
extract(shortcode_atts(array(
    'title' => '',
	
	'icon' => '',
	'icon_awesome' => '',
	'icon_metrize' => '',
	'icon_color' => '',
	'size' => '',
	
	
    'title_align' => '',
    'el_width' => '',
    'style' => '',
    'color' => '',
    'accent_color' => '',
    'el_class' => ''
), $atts));
$class = "vc_separator wpb_content_element";

$font_icon = $icon_class = '';
	
if ($icon == 'metrize' ){ $font_icon = 'icons-'.$icon_metrize; $icon_class='metrize'; }
else { $font_icon = 'fa-'.$icon_awesome; $icon_class='awesome'; }

$class .= ($title_align!='') ? ' vc_'.$title_align : '';
$class .= ($el_width!='') ? ' vc_el_width_'.$el_width : ' vc_el_width_100';
$class .= ($style!='') ? ' vc_sep_'.$style : '';
$class .= ($color!='') ? ' vc_sep_color_'.$color : '';

$inline_css = ($accent_color!='') ? ' style="'.vc_get_css_color('border-color', $accent_color).'"' : '';

$class .= $this->getExtraClass($el_class);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class, $this->settings['base']);

?>
<div class="<?php echo esc_attr(trim($css_class)); ?>">
	<span class="vc_sep_holder vc_sep_holder_l"><span<?php echo $inline_css; ?> class="vc_sep_line"></span></span>
	<?php if($title!='' && $icon == ''): ?><h4><?php echo $title; ?></h4><?php endif; ?>
	<?php if($icon != ''): ?><i class="<?php echo $font_icon; ?>" style="color:<?php echo $icon_color;?>; font-size:<?php echo $size;?>px;"></i><?php endif; ?>
	<span class="vc_sep_holder vc_sep_holder_r"><span<?php echo $inline_css; ?> class="vc_sep_line"></span></span>
</div>
<?php echo $this->endBlockComment('separator')."\n";