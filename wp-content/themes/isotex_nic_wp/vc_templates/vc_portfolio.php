<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'portfolio', 'portfolio' );
function portfolio( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title' => '',
		'cats' => '',
		'number' => '',
		'column' => '',
		'layout_mode' => '',
		'padding' => '',
		'filters' => '',
		'desc' => '',
		'excerpt' => '',
		'cats_info' => '',
		'view_project' => '',
		'view_project_text' => '',
		'pagination' => ''
    ), $atts)); 
	wp_enqueue_script( 'isotop' );
	$out = $sidebar = $isotope = $grid = $width = $height = $thumb = $with_title = $mediatitle = $args = $my_query = $portfolio_taxs = $without_padding = '';
	global $paged;
	if($cats){
		$cats_array = explode(",",$cats);
		$args = array (
			'post_type'              => 'portfolio',
			'posts_per_page'         => $number,
			'paged' 				 => $paged,
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
			'posts_per_page'         => $number,
			'paged' 				 => $paged,
		);
	}

	$my_query = new WP_Query( $args );
	if($pagination!='yes' && $filters == 'yes'){
		if(is_array($my_query->posts) && !empty($my_query->posts)) {
			foreach($my_query->posts as $my_post) {
				$post_taxs = wp_get_post_terms($my_post->ID, 'portfolio_category', array("fields" => "all"));
				if(is_array($post_taxs) && !empty($post_taxs)) {
					foreach($post_taxs as $post_tax) {
						if(is_array($cats_array) && !empty($cats_array) && (in_array($post_tax->term_id, $cats_array) || in_array($post_tax->parent, $cats_array )) )  {
							$portfolio_taxs[urldecode($post_tax->slug)] = $post_tax->name;
						}

						if(empty($cats_array) || !isset($cats_array)) {
							$portfolio_taxs[urldecode($post_tax->slug)] = $post_tax->name;
						}
					}
				}
			}
		}
		$all_terms = get_terms('portfolio_category');
		if( !empty( $all_terms ) && is_array( $all_terms ) ) {
			foreach( $all_terms as $term ) {
				if( $portfolio_taxs[urldecode($term->slug)] ) {
					$sorted_taxs[urldecode($term->slug)] = $term->name;
				}
			}
		}
		$portfolio_taxs = $sorted_taxs;
		
		$portfolio_category = get_terms('portfolio_category');
	}
	if($layout_mode == 'masonry'){ $isotope = ' data-layout-mode="masonry"'; $width = 515; $height = 9999; $thumb='portfolio_masonry';}
	else { $isotope = ' data-layout-mode="fitRows"'; $width = 515; $height = 339; $thumb='portfolio';}
	
	if($column == '2'){ $grid='grid_6'; }
	else if ($column == '3'){ $grid='grid_4'; }
	else{ $grid='grid_3'; }
	
	if($desc != 'yes'){ $with_title = 'with_title';  }
	else { $mediatitle= ' no_title_thumb';}
	
	if($padding == 'yes'){ $without_padding = ' nospace';}
	
	$out .='<div class="wpb_content_element portfolios_wrap column_'.$column.'">';
		$out .= wpb_widget_title(array('title' => $title));
		$out .='<div class="posts_layout grids_wrap">';
			$out .='<div class="row_inner">';
				if(is_array($portfolio_taxs) && !empty($portfolio_taxs) && $filters == 'yes'){
					$out .= '<div class="filterable grid_12">';
					$out .= '<ul class="categories_filter clearfix">';
					$out .= '<li class="active"><a data-filter="*" href="#">'.__('All', 'corporative').'</a></li>';
					foreach($portfolio_taxs as $portfolio_cat_slug => $portfolio_cat_name):
						$out .= '<li><a data-filter=".'.$portfolio_cat_slug.'" href="#">'.$portfolio_cat_name.'</a></li>';
					endforeach; 
					$out .= '</ul>';
					$out .= '</div>';
				}
			$out .= '</div>';
			$out .='<ul class="row_inner grid_layout"'.$isotope.'>';
				while ( $my_query->have_posts()): 
				$my_query->the_post();
				$gallery = $videoURL = $format = $categories_css = '';
				if(get_field( 'portfolio_gallery' )){$gallery = get_field( 'portfolio_gallery' );}
				if(get_field( 'portfolio_video' )){$videoURL = get_field( 'portfolio_video' );}
				if(get_field('portfolio_format')=='video'): $format = 'Video';
				elseif(get_field('portfolio_format')=='gallery'): $format = 'Gallery';
				else: $format = 'Standard';
				endif;
				
				$item_classes = '';
				$item_cats = get_the_terms(get_the_ID(), 'portfolio_category');
				if($item_cats):
				foreach($item_cats as $item_cat) {
					$item_classes .= urldecode($item_cat->slug) . ' ';
				}
				endif;
			
				$out .='<li id="'.get_the_ID().'" class="grid_item '.$grid.$without_padding.$mediatitle.' '.$item_classes.'">';
					$out .= mediaholder_caption($with_title,$format, $width, $height, $thumb, $videoURL, '', $gallery); 
					if($desc=='yes'){
						$out .= '<div class="folio-desc">';
							$out .= '<h2 class="post_title"> <a href="'.get_permalink().'" title="">'.get_the_title().'</a></h2>';
							if($cats_info=='yes'){
								$out .= '<p class="folio-cats">'.get_the_term_list(get_the_ID(), 'portfolio_category', '', ', ', '').'</p>';
							}
							$out .= excerpt($excerpt);
							if($view_project=='yes' && $view_project_text != ''){
								$out .= '<div class="folio-more"><a href="'.get_permalink().'"><span>'.$view_project_text.' </span></a></div>';
							}
						$out .= '</div>';
					}
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