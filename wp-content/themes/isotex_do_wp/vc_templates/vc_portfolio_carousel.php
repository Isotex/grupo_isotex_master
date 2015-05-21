<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');
$title = $cats = $number = $css_animation = $animated = $animated_data = $navigation = $padding = $grid = $tablet = $tabletsmall = $mobile = $mobilesmall = $outer_navigation = $withtitle = $no_title_thumb = '';
add_shortcode( 'portfolio_carousel', 'portfolio_carousel' );
function portfolio_carousel( $atts, $content = null ) {
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
		'view_portfolio' => '',
		'view_portfolio_text' => '',
		'view_portfolio_url' => '',
		'out_title' => '',
		'pagination' => ''
    ), $atts)); 
	wp_enqueue_style('owl-carousel');
	wp_enqueue_script('owl-carousel');
	$out = $args = $my_query = $animated = $animated_data = '';
	if($cats){
		$cats_array = explode(",",$cats);
		$args = array (
			'post_type'              => 'portfolio',
			'posts_per_page'         => $number,
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio_category',
					'field'    => 'slug',
					'terms'    => $cats_array
				),
			)
		);
	}
	else{
		$args = array (
			'post_type'              => 'portfolio',
			'posts_per_page'         => $number
		);
	}
	$my_query = new WP_Query( $args );
	
	if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
	
	if($out_title != 'yes'){$withtitle='with_title'; $no_title_thumb= '';}
	else{$withtitle=''; $no_title_thumb=' class="no_title_thumb"';}
	

	
	$out .='<div class="wpb_content_element portfolio_carousel_wrap clearfix'.$animated.'"'.$animated_data.'>';
		$out .= wpb_widget_title(array('title' => $title));
		if($padding=='carousel_padding'){
			$out .= '<div class="'.$padding.'">';
		}
		$out .='<div  class="rd_carousel'.$outer_navigation.'" data-grid="'.$grid.'" data-tablet="'.$tablet.'" data-tabletsmall="'.$tabletsmall.'" data-mobile="'.$mobile.'" data-mobilesmall="'.$mobilesmall.'" data-navigation="'.$navigation.'" data-auto="'.$autoplay.'" data-pagination="'.$pagination.'">';
			while ( $my_query->have_posts()): 
			$my_query->the_post();
			$gallery = $videoURL = $format = '';
			if(get_field( 'portfolio_gallery' )){$gallery = get_field( 'portfolio_gallery' );}
			if(get_field( 'portfolio_video' )){$videoURL = get_field( 'portfolio_video' );}
			if(get_field('portfolio_format')=='video'): $format = 'Video';
			elseif(get_field('portfolio_format')=='gallery'): $format = 'Gallery';
			else: $format = 'Standard';
			endif;

			$out .='<div id="post-'.get_the_ID().'"'.$no_title_thumb.'>';
				$out .= mediaholder_gal_caption($withtitle,$format, 300, 300, $img_size, $videoURL, '', $gallery); 
				if($out_title == 'yes'){
					$out .= '<div class="detailholder">';
					$out .= '<h2><a href="'.get_permalink( get_the_ID() ).'" title="'.get_the_title( get_the_ID() ).'">'.get_the_title( get_the_ID()).'</a></h2>';
						$out .= '<span class="p_bottom_cat">'.get_the_term_list(get_the_ID(), 'portfolio_category', '', ', ', '').'</span>';
					$out .= '</div>';
				}
			$out .='</div>';
			endwhile; wp_reset_postdata(); 
		$out .='</div>';
		if($padding=='carousel_padding'){
			$out .= '</div>';
		}
		if($view_portfolio=='yes'){
			if($view_portfolio_text!='' && $view_portfolio_url){
				$out.='<div class="show_all"><a href="'.$view_portfolio_url.'"><span>'.$view_portfolio_text.'</span></a></div>';
			}
		}
	$out .='</div>';
	return $out;
}