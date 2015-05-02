<?php /* Template Name: Side Navigation */ ?>
<?php 
	get_header();
	$page_sidebar = '';
	$page_sidebar = rd_options('reedwan_side_navigation_sidebar');

?>

<div class="page-content<?php if($page_sidebar == 'sidebar_left'){echo ' left-sidebar';} ?>">
	<div class="row clearfix">
		<div class="row_inner">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('pages pages_cont grid_9'); ?>>
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'corporative' ), 'after' => '</div>' ) ); ?>
			</div>
			<?php endwhile; wp_reset_postdata(); endif; ?>
			<div class="sidebar grid_3">
				<div class="widget clearfix">
					<ul class="side-nav">
						<?php
						$post_ancestors = get_ancestors($post->ID, 'page');
						$post_parent = end($post_ancestors);
						?>
						<?php if(is_page($post_parent)): ?>
						<?php endif; ?>
						
						<li <?php if(is_page($post_parent)): ?>class="current_page_item"<?php endif; ?>>
							<a href="<?php echo get_permalink($post_parent); ?>" title="<?php echo __('Back to Parent Page', 'corporative'); ?>"><?php echo get_the_title($post_parent); ?></a>
						</li>
						<?php
						if($post_parent) { $children = wp_list_pages("title_li=&child_of=".$post_parent."&echo=0");}
						else {$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");}
						
						if ($children) {echo $children;} 
						wp_reset_postdata();
						?>
					</ul>
				</div>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('side-navigation') ): endif; ?>
			</div>
		</div>
	</div>
	
</div><!-- end page content -->
<?php get_footer(); ?>