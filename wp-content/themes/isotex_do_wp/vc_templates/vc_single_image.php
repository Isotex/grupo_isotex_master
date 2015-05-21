<?php

$output = $el_class = $image = $img_size = $img_link = $img_link_target = $img_link_large = $title = $alignment = $css_animation = $animated = $animated_data = '';


extract(shortcode_atts(array(
    'title' => '',
    'image' => $image,
    'img_size'  => 'full',
    'img_link_large' => false,
    'img_link' => '',
    'img_link_target' => '_self',
    'alignment' => 'left',
    'el_class' => '',
    'css_animation' => ''
), $atts));

$img_id = preg_replace('/[^\d]/', '', $image);
$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));
if ( $img == NULL ) $img['thumbnail'] = '<img src="http://placekitten.com/g/400/300" /> <small>'.__('This is image placeholder, edit your page to replace it.', 'js_composer').'</small>';

$el_class = $this->getExtraClass($el_class);
$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}

$a_class = '';
$link_to = '';
if ($img_link_large==true) {
    $a_class = ' data-gal="lightbox"';
    $link_to = wp_get_attachment_image_src( $img_id, 'full');
    $link_to = $link_to[0];
}
else if (!empty($img_link)) {
    $link_to = $img_link;
}
if(!empty($link_to) && !preg_match('/^(https?\:\/\/|\/\/)/', $link_to)) $link_to = 'http://'.$link_to;
$image_string = !empty($link_to) ? '<a'.$a_class.' href="'.$link_to.'"'.($img_link_target!='_self' ? ' target="'.$img_link_target.'"' : '').'>'.$img['thumbnail'].'</a>' : $img['thumbnail'];

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_single_image wpb_content_element'.$el_class, $this->settings['base']);
//$css_class .= $this->getCSSAnimation($css_animation);

$css_class .= ' align-'.$alignment;

$output .= "\n\t".'<div class="'.$css_class.$animated.'"'.$animated_data.'>';
$output .= "\n\t\t".wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_singleimage_heading'));
$output .= "\n\t\t".$image_string;
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_single_image');

echo $output;