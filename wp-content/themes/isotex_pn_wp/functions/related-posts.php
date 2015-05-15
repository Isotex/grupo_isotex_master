<?php
function related_posts($count, $type, $post_id){
	$out = $categories = $param = '';
	if($type=='category'){$categories = get_the_category($post_id); $param='category__in';}
	else{$categories = wp_get_post_tags($post_id); $param='tag__in';}

	if ($categories):
		$category_ids = array();
		foreach($categories as $individual_category) {$category_ids[] = $individual_category->term_id;}
		
		$args=array(
			'post_type' 			=> 	'post',
			$param 					=> 	$category_ids,
			'post__not_in' 			=> 	array($post_id),
			'posts_per_page'		=>	$count, 
			'ignore_sticky_posts '	=>	1
		);
		
		$related = new WP_Query($args); 
		if($related->have_posts() && $related->found_posts >= 1):
			$out.='<div class="related-posts mts clearfix">';
				$out.='<div class="element-title"><h3>'.__('Recomendados ', 'corporative').'</h3></div>';
					$out.='<ul class="row_inner">';
						$count=1;
						while($related->have_posts()): $related->the_post();
							$gallery = $audioURL = $videoURL = $format= '';
							if(get_field( 'post_gallery' )){$gallery = get_field( 'post_gallery' );}
							if(get_field( 'post_video' )){$videoURL = get_field( 'post_video' );}
							if(get_field( 'post_audio' )){$audioURL = get_field( 'post_audio' );}
							
							if(has_post_format('video')): $format = 'Video';
							elseif(has_post_format('audio')): $format = 'Audio';
							elseif(has_post_format('gallery')): $format = 'Gallery';
							else: $format = 'Standard';
							endif;
							
							$out .= '<li class="grid_3 grid_item no_title_thumb">';
							$out .= mediaholder_caption('',$format,243,160,'carousel', $videoURL, $audioURL, $gallery );
							$out .= '<h2 class="post_title"><a href="'.get_permalink().'" title="">'.get_the_title().'</a></h2>';
							$out .= '</li>';
							if($count%4==0){$out .='<div class="clear"></div>';}
							$count++;
						endwhile;
					$out.='</ul>';
			$out.='</div>';
					
		endif; 
	endif; 
	wp_reset_postdata();
	return $out;
}

function related_portfolios($count, $type, $post_id){
	$out = $item_cats = $args = '';

	$item_cats = get_the_terms($post_id, $type);
	foreach($item_cats as $item_cat) {$item_array[] = $item_cat->term_id;}
	if ($item_cats):
	
		$item_array = array();
		foreach($item_cats as $item_cat) {$item_array[] = $item_cat->term_id;}
		
		$args=array(
			'post_type' 			=> 	'portfolio',
			'post__not_in' 			=> 	array($post_id),
			'posts_per_page'		=>	$count, 
			'ignore_sticky_posts '	=>	1,
			'tax_query' => array(
				array(
					'taxonomy' => $type,
					'field' => 'id',
					'terms' => $item_array
				)
			)
		);
		
		$related = new WP_Query($args); 
		if($related->have_posts() && $related->found_posts >= 1):
			$out.='<div class="related-posts mts clearfix">';
				$out.='<h3 class="block-title">'.__('Related Portfolios ', 'corporative').'</h3>';
					$out.='<ul class="row_inner">';
						$count=1;
						while($related->have_posts()): $related->the_post();
							$gallery  = $videoURL = $format = '';
							if(get_field( 'portfolio_gallery' )){$gallery = get_field( 'portfolio_gallery' );}
							if(get_field( 'portfolio_video' )){$videoURL = get_field( 'portfolio_video' );}
						
							if(get_field('portfolio_format')=='video'): $format = 'Video';
							elseif(get_field('portfolio_format')=='gallery'): $format = 'Gallery';
							else: $format = 'Standard';
							endif;
							$out .= '<li class="grid_3 grid_item no_title_thumb">';
							$out .= mediaholder_caption('',$format,515,369,'portfolio', $videoURL, '', $gallery );
							$out .= '<h2 class="post_title"><a href="'.get_permalink().'" title="">'.get_the_title().'</a></h2>';
							$out .= '</li>';
							if($count%4==0){$out .='<div class="clear"></div>';}
							$count++;
						endwhile;
					$out.='</ul>';
			$out.='</div>';
					
		endif; 
	endif; 
	wp_reset_postdata();
	return $out;
}