<?php /* Template Name: Homepage (Without Title)*/ ?>
<?php 
	get_header(); 
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('pages_cont'); ?>>
		<?php the_content(); ?>
	</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
<?php get_footer(); ?>