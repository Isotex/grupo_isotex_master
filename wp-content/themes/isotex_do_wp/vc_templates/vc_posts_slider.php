<?php
$output = $title = $type = $count = $interval = $slides_content = $link = '';
$custom_links = $img_size = $posttypes = $posts_in = $categories = '';
$orderby = $order = $el_class = $link_image_start =$link_image_end = $thumb_size = $navigation = $grid = $tablet = $tabletsmall = $mobile = $mobilesmall = $autoplay ='';
extract(shortcode_atts(array(
    'title' => '',
    'type' => 'flexslider_fade',
    'count' => 3,
	
	'thumb_size' => 'thumbnail',
	'autoplay' => '',
    'navigation' => '',
	'grid' => '',
	'tablet' => '',
	'tabletsmall' => '',
	'mobile' => '',
	'mobilesmall' => '',
	
    'slides_content' => '',
    'excerpt' => '',
    'link' => 'link_post',
    'custom_links' => site_url().'/',
    'img_size' => 'large',
    'posttypes' => '',
    'posts_in' => '',
    'categories' => '',
    'orderby' => NULL,
    'order' => 'DESC',
    'el_class' => ''
), $atts));

$gal_thumbs = '';
$el_start = '';
$el_end = '';
$wrap_start = '';
$wrap_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';
$thumb_wrap_start = '';
$thumb_wrap_end = '';

$el_class = $this->getExtraClass($el_class);

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

$query_args = array();

//exclude current post/page from query
if ( $posts_in == '' ) {
    global $post;
    $query_args['post__not_in'] = array($post->ID);
}
else if ( $posts_in != '' ) {
    $query_args['post__in'] = explode(",", $posts_in);
}

// Post teasers count
if ( $count != '' && !is_numeric($count) ) $count = -1;
if ( $count != '' && is_numeric($count) ) $query_args['posts_per_page'] = $count;

// Post types
$pt = array();
if ( $posttypes != '' ) {
    $posttypes = explode(",", $posttypes);
    foreach ( $posttypes as $post_type ) {
        array_push($pt, $post_type);
    }
    $query_args['post_type'] = $pt;
}

// Narrow by categories
if ( $categories != '' ) {
    $categories = explode(",", $categories);
    $gc = array();
    foreach ( $categories as $grid_cat ) {
        array_push($gc, $grid_cat);
    }
    $gc = implode(",", $gc);
    ////http://snipplr.com/view/17434/wordpress-get-category-slug/
    $query_args['category_name'] = $gc;

    $taxonomies = get_taxonomies('', 'object');
    $query_args['tax_query'] = array('relation' => 'OR');
    foreach ( $taxonomies as $t ) {
        if ( in_array($t->object_type[0], $pt) ) {
            $query_args['tax_query'][] = array(
                'taxonomy' => $t->name,//$t->name,//'portfolio_category',
                'terms' => $categories,
                'field' => 'slug',
            );
        }
    }
}

// Order posts
if ( $orderby != NULL ) {
    $query_args['orderby'] = $orderby;
}
$query_args['order'] = $order;

// Run query
$my_query = new WP_Query($query_args);

$pretty_rel_random = 'rel-'.rand();
if ( $link == 'custom_link' ) { $custom_links = explode( ',', $custom_links); }
$teasers = '';
$i = -1;

while ( $my_query->have_posts() ) {
    $i++;
    $my_query->the_post();
    $post_title = the_title("", "", false);
    $post_id = $my_query->post->ID;
	$no_excerpt = $content = '';
    if ( $slides_content == 'teaser' ) {
		if($excerpt == '' || $excerpt == 0){
			$no_excerpt = ' no_excerpt';
		}
		else{
			$content = excerpt($excerpt);//get_the_excerpt();
		}
    } else {
        $content = '';
    }
    $thumbnail = '';

    // Thumbnail logic
	$post_thumbnail =  $p_img_large = $thumb_thumbnail = $smallthumbnail = '';
	
    $post_thumbnail = wpb_getImageBySize(array( 'post_id' => $post_id, 'thumb_size' => $img_size ));
	$thumb_thumbnail = wpb_getImageBySize(array( 'post_id' => $post_id, 'thumb_size' => $thumb_size ));
    $thumbnail = $post_thumbnail['thumbnail'];
    $p_img_large = $post_thumbnail['p_img_large'];
	$smallthumbnail = $thumb_thumbnail['thumbnail'];

    // Link logic
    if ( $link != 'link_no' ) {
        if ( $link == 'link_post' ) {
            $link_image_start = '<a class="link_image" href="'.get_permalink($post_id).'" title="'.sprintf( esc_attr__( 'Permalink to %s', 'js_composer' ), the_title_attribute( 'echo=0' ) ).'">';
        }
        else if ( $link == 'link_image' ) {
            $p_video = get_post_meta($post_id, "_p_video", true);
            //
            if ( $p_video != "" ) {
                $p_link = $p_video;
            } else {
                $p_link = $p_img_large[0]; // TODO!!!
            }
            $link_image_start = '<a data-gal="lightbox" class="link_image" href="'.$p_link.'" title="'.the_title_attribute('echo=0').'" >';
        }
        else if ( $link == 'custom_link' ) {
            if (isset($custom_links[$i])) {
                $slide_custom_link = $custom_links[$i];
            } else {
                $slide_custom_link = $custom_links[0];
            }
            $link_image_start = '<a class="link_image" href="'.$slide_custom_link.'">';
        }

        $link_image_end = '</a>';
    } else {
        $link_image_start = '';
        $link_image_end = '';
    }

    $description = '';
    if ( $slides_content != '' ) {
        $description = '<div class="owl-caption'.$no_excerpt.'">';
        $description .= '<h2 class="post-title"><a class="link_image" href="'.get_permalink($post_id).'" title="'.sprintf( esc_attr__( 'Permalink to %s', 'js_composer' ), the_title_attribute( 'echo=0' ) ).'">' . $post_title . $link_image_end .'</h2>';
        $description .= $content;
        $description .= '</div>';
    }

    $teasers .= $el_start . $link_image_start . $thumbnail . $link_image_end . $description . $el_end;
	if ( $type == 'slides_thumb' ) { $gal_thumbs .= $el_start . $smallthumbnail . $el_end; }
} // endwhile loop
wp_reset_query();


$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_gallery wpb_posts_slider wpb_content_element'.$el_class, $this->settings['base']);

$output .= "\n\t".'<div class="'.$css_class.'">';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_posts_slider_heading'));
$output .= $wrap_start.$slides_wrap_start.$teasers.$slides_wrap_end.$thumb_wrap_start.$gal_thumbs.$thumb_wrap_end.$wrap_end;

//$output .= '<div class="wpb_gallery_slides'.$type.'" data-interval="'.$interval.'"'.$flex_fx.'>'.$teasers.'</div>';
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment('.wpb_gallery');

echo $output;