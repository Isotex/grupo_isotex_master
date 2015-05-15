<?php 
get_header();
global $more; 
$portfolio_style = $portfolio_sidebar = $portfolio_comment = $sidebar = $disqus_shortname = $thumb  = $media = $detail = $format = '';
if(get_field( 'portfolio_style' )){$portfolio_style = get_field( 'portfolio_style' ); }
if(get_field( 'portfolio_sidebar' )){$portfolio_sidebar = get_field( 'portfolio_sidebar' ); }
if(get_field( 'portfolio_comment' )){$portfolio_comment = get_field( 'portfolio_comment' ); }

if($portfolio_style == 'style_default' || empty($portfolio_style)){$portfolio_style = rd_options('reedwan_portfolio_style'); }
if($portfolio_sidebar == 'sidebar_default' || empty($portfolio_sidebar)){$portfolio_sidebar = rd_options('reedwan_portfolio_sidebar'); }
if($portfolio_comment == 'comment_default' || empty($portfolio_comment)){$portfolio_comment = rd_options('reedwan_portfolio_comment'); }

if($portfolio_comment == 'comment_disqus'){$disqus_shortname = rd_options('reedwan_disqus_shortname');}
if($portfolio_sidebar == 'sidebar_none'){
	$sidebar='grid_12';
	if($portfolio_style=='style_32'){$thumb = 'portfolio_media'; $media = 'grid_8'; $detail = 'grid_4';}
	else{$thumb = 'single_big'; $media = 'grid_12'; $detail = 'grid_12 mtss';}
}
else{
	$sidebar='grid_9';
	if($portfolio_style=='style_32'){$thumb = 'portfolio_media_sidebar'; $media = 'grid_8'; $detail = 'grid_4';}
	else{$thumb = 'single_small'; $media = 'grid_12'; $detail = 'grid_12 mtss'; }
} 
if($portfolio_style == 'style_custom'){ $detail = 'grid_12'; }

?>

<div class="page-content<?php if($portfolio_style == 'style_custom'){echo '-custom';} if($portfolio_sidebar == 'sidebar_left'){echo ' left-sidebar';} ?>">
	<?php 
		if (have_posts()) : while (have_posts()) : the_post();
		setPostViews(get_the_ID());
		$gallery = $videoURL = $full_image = $format = '';
		if(get_field( 'portfolio_gallery' )){$gallery = get_field( 'portfolio_gallery' );}
		if(get_field( 'portfolio_video' )){$videoURL = get_field( 'portfolio_video' );}
	
		
		if(get_field('portfolio_format')=='video'): $format = 'Video';
		elseif(get_field('portfolio_format')=='gallery'): $format = 'Gallery';
		else: $format = 'Standard';
		endif;
	?>
	<?php if($portfolio_style == 'style_custom'): ?>
		<?php the_content('corporative'); ?>
	<?php endif; ?>
	<?php if($portfolio_style != 'style_custom'): ?>
	<div class="row clearfix">
		<div class="row_inner">
			<div id="post-<?php the_ID(); ?>" <?php post_class('portfolios single_folio pages_cont '.$sidebar); ?>>
				<div class="row_inner clearfix">
					
					<div class="<?php echo $media ;?>">
						<?php echo mediaholder('single', $format, $thumb, $videoURL, '', $gallery ); ?>
					</div>
					<div class="<?php echo $detail ;?>">
						<?php $more = 0;the_content('Leer más ...', 'corporative'); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'corporative' ), 'after' => '</div>' ) ); ?>
					</div>
				</div>
				
				<?php if(rd_options('reedwan_portfolio_similar')==1 ): ?>
					<?php echo related_portfolios(rd_options('reedwan_portfolio_similar_number'),'portfolio_category',get_the_ID());?>
				<?php endif; ?>
				
				<?php if($portfolio_comment != 'comment_none' ):?>
				<div class="single-comments mts clearfix">
					<?php if($portfolio_comment == 'comment_disqus'):?>
						<?php echo disqus_embed($disqus_shortname);?>
					<?php else: ?>
						<?php comments_template(); ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php if($portfolio_sidebar != 'sidebar_none'): ?>
			<div class="sidebar grid_3">
				<?php get_sidebar();?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php endwhile; wp_reset_postdata(); endif; ?>
</div>

<?php get_footer(); ?>