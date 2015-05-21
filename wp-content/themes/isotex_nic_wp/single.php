<?php 
get_header();
global $more; 
$post_style = $post_sidebar = $post_comment = $sidebar = $disqus_shortname = $thumb = $author = $date =$comments = $views = $category = $post_media = '';
if(get_field( 'post_style' )){$post_style = get_field( 'post_style' ); }
if(get_field( 'post_sidebar' )){$post_sidebar = get_field( 'post_sidebar' ); }
if(get_field( 'post_comment' )){$post_comment = get_field( 'post_comment' ); }
if(get_field( 'post_media' )){$post_media = get_field( 'post_media' ); }

if($post_style == 'style_default' || empty($post_style)){$post_style = rd_options('reedwan_post_style'); }
if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_post_sidebar'); }
if($post_comment == 'comment_default' || empty($post_comment)){$post_comment = rd_options('reedwan_post_comment'); }
if($post_media == 'media_default' || empty($post_media)){$post_media = rd_options('reedwan_post_media'); }

if($post_comment == 'comment_disqus'){$disqus_shortname = rd_options('reedwan_disqus_shortname');}
if($post_sidebar == 'sidebar_none'){
	$sidebar='grid_12';
	if($post_style=='style_two'){ $thumb = 'single_big'; } else{ $thumb = 'single_big_one'; }
}
else{
	$sidebar='grid_9';
	if($post_style=='style_two'){ $thumb = 'single_small'; } else{ $thumb = 'single_small_one'; }
}

if(rd_options_array('reedwan_post_meta_list','author')){$author='view';}
if(rd_options_array('reedwan_post_meta_list','date')){$date='view';}
if(rd_options_array('reedwan_post_meta_list','comments')){$comments='view';}
if(rd_options_array('reedwan_post_meta_list','views')){$views='view';}
if(rd_options_array('reedwan_post_meta_list','category')){$category='view';}

?>

<div class="page-content<?php if($post_sidebar == 'sidebar_left'){echo ' left-sidebar';} ?>">
	<?php 
		if (have_posts()) : while (have_posts()) : the_post();
		setPostViews(get_the_ID());
		$gallery = $audioURL = $videoURL = $format = $icon = $sticky= '';
		
		if(get_field( 'post_gallery' )){$gallery = get_field( 'post_gallery' );}
		if(get_field( 'post_video' )){$videoURL = get_field( 'post_video' );}
		if(get_field( 'post_audio' )){$audioURL = get_field( 'post_audio' );}
		
		if(has_post_format('video')): $icon='icons-play'; $format = __('Video','corporative');
		elseif(has_post_format('audio')): $icon='icons-music'; $format = __('Audio','corporative');
		elseif(has_post_format('gallery')): $icon='icons-sliders-vertical'; $format = __('Gallery','corporative');
		else: $icon='icons-document-fill'; $format = '';
		endif; 
		
		if ( is_sticky()){
			$sticky='<h5 class="sticky-post">'.__('Featured Post','corporative').'</h5>';
		}
	?>

	<div class="row clearfix">
		<div class="row_inner">
			<div id="post-<?php the_ID(); ?>" <?php post_class('posts pages_cont '.$sidebar); ?>>
				<div class="post_b <?php echo $post_style; ?>">
					<a href="#" class="post_format lefttip" title="<?php echo $format; ?>"><i class="<?php echo $icon; ?>"></i></a><!-- post format -->
					<?php if(rd_options('reedwan_post_sharing')==1 && $post_style != 'style_two'): ?>
						<div class="social post_social">
							<?php get_template_part('includes/single-share'); ?>
						</div><!-- social share -->
					<?php endif; ?>
					<div class="post_content">
						<?php echo $sticky; ?>
						<?php if($post_media==1): ?>
							<?php echo mediaholder('single',$format,$thumb, $videoURL, $audioURL, $gallery ); ?>
							<!-- featured thumbnail -->
						<?php endif; ?>
						<div class="post_inner_content clearfix">
							<h2 class="post_title"> <?php the_title(); ?> </h2>
							<?php if(rd_options('reedwan_post_meta')==1): ?>
								<?php if($author != '' || $date != '' || $comments != '' || $views != '' || $category != ''):?>
								<div class="f_meta clearfix">
									<?php echo post_meta($disqus_shortname, $author,$date, $comments, $views, $category);?>
								</div>
								<?php endif; ?>
							<?php endif; ?>
							<?php $more = 0;the_content('Leer más ...', 'corporative'); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'corporative' ), 'after' => '</div>' ) ); ?>
							<?php if( has_tag() && rd_options('reedwan_tag_info')==1 ): ?>
								<?php the_tags('<div class="meta-tag">', '', '</div>'); ?>
							<?php endif; ?>
							<?php edit_post_link( '<i class="fa-edit"></i>', '<div class="link-edit">', '</div>' ); ?>
						</div>
						<?php if(rd_options('reedwan_post_sharing')==1 && $post_style == 'style_two'): ?>
							<div class="social post_social">
								<?php get_template_part('includes/single-share'); ?>
							</div><!-- social share -->
						<?php endif; ?>
					</div><!-- post content -->
				</div>
				<?php if(rd_options('reedwan_post_author')==1): ?>
				<div class="box-author mts clearfix">	
					<?php echo author_box(get_the_author_meta('ID'),true); ?>		
				</div>
				<?php endif; ?>
				<?php if(rd_options('reedwan_post_similar')==1): ?>
					<?php echo related_posts(rd_options('reedwan_post_similar_number'),rd_options('reedwan_post_similar_by'),get_the_ID());?>
				<?php endif; ?>
				<?php if($post_comment != 'comment_none'):?>
				<div class="single-comments mts clearfix">
					<?php if($post_comment == 'comment_disqus'):?>
						<?php echo disqus_embed($disqus_shortname);?>
					<?php else: ?>
						<?php comments_template(); ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php if($post_sidebar != 'sidebar_none'): ?>
			<div class="sidebar grid_3">
				<?php get_sidebar();?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endwhile; wp_reset_postdata(); endif; ?>
</div>
<?php get_footer(); ?>