<?php /* Template Name: Full 100% */ ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_content(); ?>
</div>
<?php endwhile; wp_reset_postdata(); endif; ?>
<?php get_footer(); ?>