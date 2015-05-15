<?php 
	get_header(); 
	global $author;
	$userdata = get_userdata($author);
	$archive_column = $archive_sidebar  = $archive_post_meta = $archive_masonry  = $archive_share = $archive_post_more = $sidebar = $thumb = $excerpt = $metaAuthor = $date = $comments = $views = $category =  $width = $height = $format_icon = $grid = '';
	
	if(get_field( 'category_column', 'category_' . get_query_var('cat') )){$archive_column= get_field( 'category_column', 'category_' . get_query_var('cat') ); }
	if(get_field( 'category_sidebar', 'category_' . get_query_var('cat') )){$archive_sidebar = get_field( 'category_sidebar', 'category_' . get_query_var('cat') ); }
	if(get_field( 'category_masonry', 'category_' . get_query_var('cat') )){$archive_masonry = get_field( 'category_masonry', 'category_' . get_query_var('cat') ); }
	if(get_field( 'category_share', 'category_' . get_query_var('cat') )){$archive_share = get_field( 'category_share', 'category_' . get_query_var('cat') ); }
	if(get_field( 'category_post_meta', 'category_' . get_query_var('cat') )){$archive_post_meta = get_field( 'category_post_meta', 'category_' . get_query_var('cat') ); }
	if(get_field( 'category_post_more', 'category_' . get_query_var('cat') )){$archive_post_more = get_field( 'category_post_more', 'category_' . get_query_var('cat') ); }
	
	if($archive_column == 'default' || empty($archive_column)){$archive_column = rd_options('reedwan_archive_column'); }
	if($archive_sidebar == 'default' || empty($archive_sidebar)){$archive_sidebar = rd_options('reedwan_archive_sidebar'); }
	if($archive_masonry == 'default' || empty($archive_masonry)){$archive_masonry = rd_options('reedwan_archive_masonry'); }
	if($archive_share == 'default' || empty($archive_share)){$archive_share = rd_options('reedwan_archive_share'); }
	if($archive_post_meta == 'default' || empty($archive_post_meta)){$archive_post_meta = rd_options('reedwan_archive_meta'); }
	if($archive_post_more == 'default' || empty($archive_post_more)){$archive_post_more = rd_options('reedwan_archive_readmore'); }
	
	if($archive_sidebar == 'sidebar_none'){$sidebar='grid_12';}
	else{$sidebar='grid_9';}
	
	if($archive_column == 'column_1'){
		$excerpt = 70;
		$grid='grid_12';
		if($archive_sidebar == 'sidebar_none'){
			$metaAuthor = $date = $comments = $views = $category = 'view';
			if($archive_share == 1){ $thumb= 'blog_column1_bar_share';  $width = 706;  $height = 350;}
			else { $thumb= 'blog_column1_bar';  $width = 786;  $height = 380;}
		}
		else{
			$metaAuthor = $date = $comments = $category = 'view';
			if($archive_share == 1){ $thumb= 'blog_column1_share';  $width = 978;  $height = 430;}
			else { $thumb= 'blog_column1';  $width = 1058;  $height = 450; }
		}
	}
	else {
		$excerpt = 40;
		if($archive_column == 'column_2'){
			$grid='grid_6'; 
			if($archive_sidebar == 'sidebar_none'){$metaAuthor = $date = $comments = 'view'; }
			else{ $date = $comments = 'view'; }
		}
		if($archive_column == 'column_3'){ 
			$grid='grid_4'; 
			$date = $comments = 'view';
		}
		if($archive_masonry == 1){ $thumb= 'blog_masonry'; $width = 697;  $height = 9999;}
		else{$thumb= 'blog_nomasonry'; $width = 697;  $height = 480; }
	}
	
	$grids_wrap = ' grids_wrap';
	if($archive_masonry == 1 && $column != 1){ $isotope = ' data-layout-mode="masonry"'; }
	else { $isotope = ' data-layout-mode="fitRows"'; }
	if($archive_masonry == 1){ $grids_wrap = ''; }
	if($archive_masonry != 1){
		wp_enqueue_script( 'isotop' );
	}
	if($archive_share == 0){ $format_icon=' hide_angle'; }
	
?>
<div class="page-content <?php echo $archive_column; ?> <?php echo $archive_sidebar; ?><?php if($archive_sidebar == 'sidebar_left'){echo ' left-sidebar';} ?>">
	<div class="row clearfix">
		<div class="row_inner">
			<div id="post-<?php the_ID(); ?>" <?php post_class('posts pages_cont'.$grids_wrap.' archives '.$sidebar); ?>>
				<?php if (is_author()) : ?>
				<div class="box-author mbff">
					<?php echo author_box($userdata->ID,true); ?>		
				</div>
				<?php endif; ?>
				<ul class="row_inner grid_layout"<?php echo $isotope; ?>>
					<?php
						if (have_posts()) : while (have_posts()) : the_post();
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
					?>
					<li id="post-<?php the_ID(); ?>" class="grid_item no_title_thumb <?php echo $grid; ?>">
						<div class="post_b">
							<?php if( $archive_share == 1 ): ?>
								<a href="<?php the_permalink(); ?>" class="post_format lefttip" title="<?php echo $format; ?>"><i class="<?php echo $icon; ?>"></i></a>
								<div class="social post_social">
									<?php get_template_part('includes/archive-share'); ?>
								</div>
							<?php endif; ?>
							<div class="post_content<?php echo $format_icon; ?>">
								<?php if($archive_masonry == 1): ?>
									<?php echo mediaholder('', $format,$thumb, $videoURL, $audioURL, $gallery );?>
								<?php else: ?>
									<?php echo mediaholder_caption('',$format, $width, $height, $thumb, $videoURL, $audioURL, $gallery); ?>
								<?php endif; ?>
								<div class="post_inner_content clearfix">
									<h2 class="post_title"> <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?> </a></h2>
									<?php if($archive_post_meta==1 ): ?>
										<div class="f_meta clearfix">
											<?php the_taxonomies(array(
										'post' 		=> 0,
										'before' 	=> '',
										'sep'		=>', ',
										'after'		=>'',
										'template'	=>'%s: %l',
									));//echo post_meta($disqus_shortname, $metaAuthor, $date, $comments, $views, $category);?>
										</div>
									<?php endif; ?>
									<?php echo excerpt($excerpt); ?>
									<?php if($archive_post_more==1 ): ?>
										<div class="right more"><a href="<?php the_permalink(); ?>"><?php _e('Ver Galeria','corporative'); ?> &rarr;</a></div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</li>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</ul>
				<?php kriesi_pagination(); ?>
			</div>
			
			<?php if($archive_sidebar != 'sidebar_none'): ?>
			<div class="sidebar grid_3">
				<?php get_sidebar();?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>

