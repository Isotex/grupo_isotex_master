<?php
$output = $title = $type = $onclick = $custom_links = $img_size = $custom_links_target = $images = $el_class = $interval = $css_animation = $animated = $animated_data = $thumb_size = $navigation = $grid = $tablet = $tabletsmall = $mobile = $mobilesmall = $autoplay ='';
extract(shortcode_atts(array(
    'title' => '',
    'type' => '',
    'onclick' => 'link_image',
    'custom_links' => '',
    'custom_links_target' => '',
    'img_size' => 'large',
    'images' => '',
	
	'thumb_size' => 'thumbnail',
	'autoplay' => '',
    'navigation' => '',
	'grid' => '',
	'tablet' => '',
	'tabletsmall' => '',
	'mobile' => '',
	'mobilesmall' => '',
	
    'el_class' => '',
    'css_animation' => ''
), $atts));
$gal_images = '';
$gal_thumbs = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$wrap_start = '';
$wrap_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';
$thumb_wrap_start = '';
$thumb_wrap_end = '';

$el_class = $this->getExtraClass($el_class);
$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}

if ( $type == 'slides' ) {
	wp_enqueue_style('owl-carousel');
	wp_enqueue_script('owl-carousel');
    $el_start = '<div>';
    $el_end = '</div>';
    $slides_wrap_start = '<div class="rd_slides" data-navigation="'.$navigation.'" data-auto="'.$autoplay.'">';
    $slides_wrap_end = '</div>';
} 
if ( $type == 'slides_thumb' ) {
	$slide_id = WPBakeryShortCode_VC_images_carousel::getCarouselIndex();
	wp_enqueue_style('owl-carousel');
	wp_enqueue_script('owl-carousel');
    $el_start = '<div>';
    $el_end = '</div>';
	$wrap_start = '<div id="'.$slide_id.'"class="rd_slides_thumb" data-grid="'.$grid.'" data-tablet="'.$tablet.'" data-tabletsmall="'.$tabletsmall.'" data-mobile="'.$mobile.'" data-mobilesmall="'.$mobilesmall.'" data-navigation="'.$navigation.'" data-auto="'.$autoplay.'">';
	$wrap_end = '</div>';
    $slides_wrap_start = '<div id="slidex'.$slide_id.'" class="rd_slidex">';
    $slides_wrap_end = '</div>';
	$thumb_wrap_start = '<div class="rd_thumbx_padding"><div id="thumbx'.$slide_id.'" class="rd_thumbx">';
    $thumb_wrap_end = '</div></div>';
}
else if ( $type == 'image_grid' ) {
    wp_enqueue_script( 'isotope' );
    $el_start = '<li class="isotope-item">';
    $el_end = '</li>';
    $slides_wrap_start = '<div class="image_grid"><ul class="image_grid_ul">';
    $slides_wrap_end = '</ul></div>';
}

if ( $images == '' ) $images = '-1,-2,-3';

$pretty_rel_random = ' data-gal="lightbox['.rand().']" class="prettyphoto"'; //rel-'.rand();

if ( $onclick == 'custom_link' ) { $custom_links = explode( ',', $custom_links); }
$images = explode( ',', $images);
$i = -1;

foreach ( $images as $attach_id ) {
    $i++;
    if ($attach_id > 0) {
        $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ));
		$thumb_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => $thumb_size ));
		$thumb_title = get_the_title ($attach_id);
    }
    else {
        $different_kitten = 400 + $i;
        $post_thumbnail = $thumb_thumbnail = array();
        $post_thumbnail['thumbnail'] = '<img src="http://placekitten.com/g/'.$different_kitten.'/600" />';
		$thumb_thumbnail['thumbnail'] = '<img src="http://placekitten.com/g/'.$different_kitten.'/200" />';
        $post_thumbnail['p_img_large'][0] = 'http://placekitten.com/g/1024/768';
    }

    $thumbnail = $post_thumbnail['thumbnail'];
	$smallthumbnail = $thumb_thumbnail['thumbnail'];
    $p_img_large = $post_thumbnail['p_img_large'];
    $link_start = $link_end = '';

    if ( $onclick == 'link_image' ) {
        $link_start = '<a class="item_gal" href="'.$p_img_large[0].'" title="'.$thumb_title.'"'.$pretty_rel_random.'>';
        $link_end = '</a>';
    }
    else if ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ) {
        $link_start = '<a class="item_gal" href="'.$custom_links[$i].'"' . (!empty($custom_links_target) ? ' target="'.$custom_links_target.'"' : '') . '>';
        $link_end = '</a>';
    }
    $gal_images .= $el_start . $link_start . $thumbnail . $link_end . $el_end;
	if ( $type == 'slides_thumb' ) { $gal_thumbs .= $el_start . $smallthumbnail . $el_end; }
}


$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gallery wpb_content_element'.$el_class.' clearfix', $this->settings['base']);
$output .= "\n\t".'<div class="'.$css_class.$animated.'"'.$animated_data.'>';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_gallery_heading'));
$output .= $wrap_start.$slides_wrap_start.$gal_images.$slides_wrap_end.$thumb_wrap_start.$gal_thumbs.$thumb_wrap_end.$wrap_end;
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_gallery');

echo $output;