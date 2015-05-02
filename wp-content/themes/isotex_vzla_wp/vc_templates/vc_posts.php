<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'posts', 'posts' );
function posts( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title' => '',
		'cats' => '',
		'number' => '',
		'column' => '',
		'layout_mode' => '',
		'social' => '',
		'excerpt' => '',
		'meta' => '',
		'more' => '',
		'pagination' => ''
    ), $atts)); 
	if($column != 1){
		wp_enqueue_script( 'isotop' );
	}
	$out = $grid = $metaAuthor = $date = $comments = $views = $category = $thumb=  $width = $height = $isotope = $format_icon = $args = $my_query = '';
	global $paged;
	$args = array (
			'post_type'              => 'post',
			'category_name'          => $cats,
			'pagination'             => true,
			'posts_per_page'         => $number,
			'ignore_sticky_postss'    	 => 1,
			'paged' 				 => $paged
		);
	$my_query = new WP_Query( $args );
	
	if($column == 1){
		$grid='grid_12';
		$metaAuthor = $date = $comments = $views = $category = 'view';
		if($social == 1){ $thumb= 'blog_column1_bar_share';  $width = 706;  $height = 350;}
		else { $thumb= 'blog_column1_bar';  $width = 786;  $height = 380;}
		
	}
	else {
		if($column == 2){
			$grid='grid_6'; 
			$metaAuthor = $date = $comments = 'view';
		}
		if($column == 3){ 
			$grid='grid_4'; 
			$date = $comments = 'view';
		}
		if($layout_mode == 'masonry'){ $thumb= 'blog_masonry'; $width = 697;  $height = 9999;}
		else{$thumb= 'blog_nomasonry'; $width = 697;  $height = 480; }
	}
	$grids_wrap = ' grids_wrap';
	if($layout_mode == 'masonry' && $column != 1){ $isotope = ' data-layout-mode="masonry"'; }
	if($layout_mode == 'fitRows' && $column != 1){ $isotope = ' data-layout-mode="fitRows"'; }
	if($column == 1){ $grids_wrap = ''; }
	
	if($social != 'yes'){ $format_icon=' hide_angle'; }
	
	$out .='<div class="wpb_content_element posts_wrap column_'.$column.'">';
		$out .= wpb_widget_title(array('title' => $title));
		$out .='<div class="posts_layout'.$grids_wrap.'">';
			$out .='<ul class="row_inner grid_layout"'.$isotope.'>';
				while ( $my_query->have_posts()): 
				$my_query->the_post();
				$disqus_shortname = $gallery = $audioURL = $videoURL = $format = $icon  = $post_comment = '';
				if(get_field( 'post_gallery' )){$gallery = get_field( 'post_gallery' );}
				if(get_field( 'post_video' )){$videoURL = get_field( 'post_video' );}
				if(get_field( 'post_audio' )){$audioURL = get_field( 'post_audio' );}
				
				if(has_post_format('video')): $icon='icons-play'; $format = __('Video','corporative');
				elseif(has_post_format('audio')): $icon='icons-music'; $format = __('Audio','corporative');
				elseif(has_post_format('gallery')): $icon='icons-sliders-vertical'; $format = __('Gallery','corporative');
				else: $icon='icons-document-fill'; $format = '';
				endif; 
				
				if(get_field( 'post_comment' )){$post_comment = get_field( 'post_comment' ); }
				if($post_comment == 'comment_default' || empty($post_comment)){$post_comment = rd_options('reedwan_post_comment'); }
				if($post_comment == 'comment_disqus'){$disqus_shortname = rd_options('reedwan_disqus_shortname');}
				$out .='<li id="post-'.get_the_ID().'" class="grid_item no_title_thumb '.$grid.'">';
					$out .='<div class="post_b">';
						if( $social == 'yes' ){
							$out .='<a href="'.get_permalink().'" class="post_format lefttip" title="'.$format.'"><i class="'.$icon.'"></i></a>';
							$out .='<div class="social post_social">';
							
								$out .='<a href="http://twitter.com/home?status='.get_the_title().' '. get_permalink().'" target="_blank" class="lefttip" title="Twitter"><i class="icons-social-twitter"></i></a>';
								$thumbx = '';
								$thumbx = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'facebook' ); 
								$out .='<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]='.urlencode(get_the_title()).'&amp;p[summary]='.urlencode(get_the_excerpt()).'&amp;p[url]='.urlencode(get_permalink()).'&amp;p[images][0]='.urlencode($thumbx[0]).'" target="_blank" class="lefttip" title="Facebook"><i class="icons-social-facebook"></i></a>';
								
								$out .='<a href="https://plus.google.com/share?url='.get_permalink().'" onclick="javascript:window.open(this.href,"", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;" target="_blank" class="lefttip" title="Google Plus"><i class="icons-social-google-plus"></i></a>';
								$thumby = '';
								$thumby = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium' ); 
								$out .='<a href="http://pinterest.com/pin/create/button/?url='.urlencode(get_permalink()).'&amp;description='.urlencode(get_the_title()).'&amp;media='.urlencode($thumby[0]).'" target="_blank" class="lefttip" title="Pinterest"><i class="icons-social-pinterest"></i></a>';
							

							$out .='</div>';
						}
						$out .='<div class="post_content'.$format_icon.'">';
							if($layout_mode == 'masonry'){
								$out .= mediaholder('', $format,$thumb, $videoURL, $audioURL, $gallery ); 
							}
							else{
								$out .= mediaholder_caption('',$format, $width, $height, $thumb, $videoURL, $audioURL, $gallery);
							}
							
							$out .= '<div class="post_inner_content clearfix">';
								$out .= '<h2 class="post_title"> <a href="'.get_permalink().'" title="">'.get_the_title().'</a></h2>';
								if($meta=='yes' ){
									$out .= '<div class="f_meta clearfix">';
									$out .= post_meta($disqus_shortname, $metaAuthor, $date, $comments, $views, $category);
									$out .= '</div>';
								}
								$out .= excerpt($excerpt);
								if($more=='yes' ){
									$out .= '<div class="right more"><a href="'.get_permalink().'">'.__('Leer más','corporative').' &rarr;</a></div>';
								}
							$out .= '</div>';
						$out .='</div>';
						
					$out .='</div>';
				$out .='</li>';
				endwhile; wp_reset_postdata(); 
			$out .='</ul>';
			if($pagination=='yes' ){
				$out .= new_pagination($my_query->max_num_pages);
			}
		$out .='</div>';
	$out .='</div>';
	return $out;
}