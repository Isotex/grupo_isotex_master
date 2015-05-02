<?php
add_action( 'widgets_init', 'reedwan_portfolios_widget' );
function reedwan_portfolios_widget() {
	register_widget( 'reedwan_get_portfolios' );
}
class reedwan_get_portfolios extends WP_Widget {

	function reedwan_get_portfolios() {
		$widget_ops = array( 'classname' => 'portfolio-widget', 'description' => 'Show your latest portfolio' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'portfolio-widget' );
		$this->WP_Widget( 'portfolio-widget','Corporative: Portfolio Widget', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		global $post;
		$title = apply_filters('widget_title', $instance['cat_portfolio_title'] );
		$num_portfolio = $instance['num_portfolio'];

		$videoURL = $post_thumbnail_small = $thumb_size_small = $thumbnail_small = $image_attributes =$bigimage ='';
		echo $before_widget;
		echo $before_title;
		echo $title ; 
		echo $after_title;
		echo '<div class="portfolio-widget-block grid-widget">';
		
		$portfolio_args = array('post_type' => 'portfolio', 
						'posts_per_page' => $num_portfolio);
		
		$cat_query = new WP_Query( $portfolio_args ); 
		if( $cat_query->have_posts() ) :
		while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
			
			<div class="item toptip" original-title="<?php the_title(); ?>">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post_grid_thumb', array('class' => 'post-thumbnail')); ?></a>
			</div>
		
		<?php endwhile;
		endif;
		echo '</div>';
		echo $after_widget;
		}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['cat_portfolio_title'] = strip_tags( $new_instance['cat_portfolio_title'] );
		$instance['num_portfolio'] = strip_tags( $new_instance['num_portfolio'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'cat_portfolio_title' =>__( 'Recent Portfolio' , 'corporative'), 'num_portfolio' => '9');
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_portfolio_title' ); ?>"><?php _e( 'Title : ' , 'corporative') ?></label>
			<input id="<?php echo $this->get_field_id( 'cat_portfolio_title' ); ?>" name="<?php echo $this->get_field_name( 'cat_portfolio_title' ); ?>" value="<?php echo $instance['cat_portfolio_title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num_portfolio' ); ?>"><?php _e( 'Number of portfolio to show :' , 'corporative') ?></label>
			<input id="<?php echo $this->get_field_id( 'num_portfolio' ); ?>" name="<?php echo $this->get_field_name( 'num_portfolio' ); ?>" value="<?php echo $instance['num_portfolio']; ?>" type="text" size="3" />
		</p>

	<?php
	}
}
?>