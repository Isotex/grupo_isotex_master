<?php 
	get_header();
	$page_sidebar = $sidebar = $page_comment = $disqus_shortname = $sidebar_id =  '';
	
	$page_sidebar = rd_options('reedwan_forum_sidebar'); 
	
	if($page_sidebar == 'sidebar_none'){$sidebar='grid_12';}
	else{$sidebar='grid_9';}
?>

<div class="page-content<?php if($page_sidebar == 'sidebar_left'){echo ' left-sidebar';} ?>">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="row clearfix">
		<div class="row_inner">
			<div id="post-<?php the_ID(); ?>" <?php post_class('pages pages_cont '.$sidebar); ?>>
				<?php the_content(); ?>
			</div>
			<?php if($page_sidebar != 'sidebar_none'): ?>
			<div class="sidebar grid_3">
				<?php get_sidebar();?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php endwhile; wp_reset_postdata(); endif; ?>
</div><!-- end page content -->
<?php get_footer(); ?>