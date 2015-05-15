<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');
$title = $cats = $number = $css_animation = $animated = $animated_data = $navigation = $padding = $grid = $tablet = $tabletsmall = $mobile = $mobilesmall = $outer_navigation = $withtitle = $no_title_thumb = '';
add_shortcode( 'posts_carousel', 'posts_carousel' );
function posts_carousel( $atts, $content = null ) {
	extract(shortcode_atts(array(
         'title' => '',
		'cats' => '',
		'number' => '',
		'css_animation' => '',
		'autoplay' => '',
		'navigation' => '',
		'outer_navigation' => '',
		'padding' => '',
		'grid' => '',
		'tablet' => '',
		'tabletsmall' => '',
		'mobile' => '',
		'mobilesmall' => '',
		'img_size' => 'portfolio',
		'out_title' => '',
		'pagination' => ''
    ), $atts)); 
	wp_enqueue_style('owl-carousel');
	wp_enqueue_script('owl-carousel');
	$out = $args = $my_query = $animated = $animated_data = '';
	$args = array (
			'post_type'              => 'post',
			'category_name'          => $cats,
			'pagination'             => true,
			'posts_per_page'         => $number,
			'ignore_sticky_posts'    	 => 1
		);
	$my_query = new WP_Query( $args );
	
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	
	if($out_title != 'yes'){$withtitle='with_title'; $no_title_thumb= '';}
	else{$withtitle=''; $no_title_thumb=' class="no_title_thumb"';}
	
	$carousel_id = '';

	$out .='<div class="wpb_content_element posts_carousel_wrap clearfix'.$animated.'"'.$animated_data.'>';
		$out .= wpb_widget_title(array('title' => $title));
		if($padding=='carousel_padding'){
			$out .= '<div class="'.$padding.'">';
		}
		$out .='<div id="'.$carousel_id.'" class="rd_carousel'.$outer_navigation.'" data-grid="'.$grid.'" data-tablet="'.$tablet.'" data-tabletsmall="'.$tabletsmall.'" data-mobile="'.$mobile.'" data-mobilesmall="'.$mobilesmall.'" data-navigation="'.$navigation.'" data-auto="'.$autoplay.'" data-pagination="'.$pagination.'">';
			while ( $my_query->have_posts()): 
				$my_query->the_post();
				$gallery = $audioURL = $videoURL = $format  = '';
				if(get_field( 'post_gallery' )){$gallery = get_field( 'post_gallery' );}
				if(get_field( 'post_video' )){$videoURL = get_field( 'post_video' );}
				if(get_field( 'post_audio' )){$audioURL = get_field( 'post_audio' );}
				
				if(has_post_format('video')): $format = 'Video';
				elseif(has_post_format('audio')): $format = 'Audio';
				elseif(has_post_format('gallery')): $format = 'Gallery';
				else: $format = 'Standard';
				endif; 

				$out .='<div id="post-'.get_the_ID().'"'.$no_title_thumb.'>';
					$out .= mediaholder_gal_caption($withtitle,$format, 300, 300, $img_size, $videoURL, $audioURL, $gallery); 
					if($out_title == 'yes'){
						$out .= '<div class="detailholder">';
						$out .= '<h2><a href="'.get_permalink( get_the_ID() ).'" title="'.get_the_title( get_the_ID() ).'">'.get_the_title( get_the_ID()).'</a></h2>';
						$out .= '<span class="p_bottom_cat">'.get_the_category_list('', ', ', '').'</span>';
						$out .= '</div>';
					}
				$out .='</div>';
			endwhile; wp_reset_postdata();
		$out .='</div>';
		if($padding=='carousel_padding'){
			$out .= '</div>';
		}
	$out .='</div>';
	return $out;
}