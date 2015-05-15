<?php 
	get_header();
	wp_enqueue_script( 'isotop' );
	$portfolio_column=$portfolio_sidebar=$portfolio_masonry=$portfolio_description=$portfolio_view=$portfolio_category=$portfolio_view_text=$portfolio_padding=$portfolio_excerpt=$sidebar=$isotope=$grid=$width=$height=$thumb=$title=$padding=$mediatitle='';
	
	$portfolio_column=rd_options('reedwan_portfolio_archive_column');
	$portfolio_sidebar=rd_options('reedwan_portfolio_archive_sidebar');
	$portfolio_masonry=rd_options('reedwan_portfolio_archive_masonry');
	$portfolio_description=rd_options('reedwan_portfolio_archive_description');
	$portfolio_view=rd_options('reedwan_portfolio_archive_view');
	$portfolio_category=rd_options('reedwan_portfolio_archive_category');
	$portfolio_view_text=rd_options('reedwan_portfolio_archive_view_text');
	$portfolio_padding=rd_options('reedwan_portfolio_archive_padding');
	$portfolio_excerpt=rd_options('reedwan_portfolio_archive_excerpt');
	
	if($portfolio_sidebar == 'sidebar_none'){$sidebar='grid_12';}
	else{$sidebar='grid_9';}
	
	if($portfolio_masonry == 1){ $isotope = ' data-layout-mode="masonry"'; $width = 515; $height = 9999; $thumb='portfolio_masonry';}
	else { $isotope = ' data-layout-mode="fitRows"'; $width = 515; $height = 339; $thumb='portfolio';}
	
	if($portfolio_column == 'column_2'){ $grid='grid_6'; }
	else if ($portfolio_column == 'column_3'){ $grid='grid_4'; }
	else{ $grid='grid_3'; }
	
	if($portfolio_description != 1){ $title = 'with_title';  }
	else { $mediatitle= ' no_title_thumb';}
	
	if($portfolio_padding == 1){ $padding = ' nospace'; }
	
?>

<div class="page-content <?php echo $portfolio_column; ?> <?php echo $portfolio_sidebar; ?><?php if($portfolio_sidebar == 'sidebar_left'){echo ' left-sidebar';} ?>">
	<div class="row clearfix">
		<div class="row_inner">
			<div id="post-<?php the_ID(); ?>" <?php post_class('posts grids_wrap archives '.$sidebar); ?>>
				<ul class="row_inner grid_layout"<?php echo $isotope; ?>>
					<?php 
						if (have_posts()) : while (have_posts()) : the_post();
						$gallery = $videoURL = $format = '';
						if(get_field( 'portfolio_gallery' )){$gallery = get_field( 'portfolio_gallery' );}
						if(get_field( 'portfolio_video' )){$videoURL = get_field( 'portfolio_video' );}
					
						
						if(get_field('portfolio_format')=='video'): $format = 'Video';
						elseif(get_field('portfolio_format')=='gallery'): $format = 'Gallery';
						else: $format = 'Standard';
						endif;
					?>
					<li id="post-<?php the_ID(); ?>" class="grid_item <?php echo $grid; ?><?php echo $padding; ?><?php echo $mediatitle; ?>">
						<?php echo mediaholder_caption($title,$format, $width, $height, $thumb, $videoURL, '', $gallery); ?>
						<?php if($portfolio_description==1): ?>
						<div class="folio-desc">
							<h2 class="post_title"> <a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?> </a></h2>
							<?php if($portfolio_category==1): ?>
								<p class="folio-cats"><?php echo get_the_term_list($post->ID, 'portfolio_category', '', ', ', ''); ?></p>
							<?php endif; ?>
							<?php echo excerpt($portfolio_excerpt); ?>
							<?php if($portfolio_view==1 && $portfolio_view_text != ''): ?>
								<div class="folio-more"><a class="tbutton small" href="<?php the_permalink(); ?>"><span><?php echo $portfolio_view_text; ?> </span></a></div>
							<?php endif; ?>
						</div>
						<?php endif; ?>
					</li>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</ul>
				<?php kriesi_pagination(); ?>
			</div>
			<?php if($portfolio_sidebar != 'sidebar_none'): ?>
			<div class="sidebar grid_3">
				<?php get_sidebar();?>
			</div>
			<?php endif; ?>
			
		</div>
	</div>
</div>
<?php get_footer(); ?>