<?php
add_action( 'widgets_init', 'reedwan_posts_widget' );
function reedwan_posts_widget() {
	register_widget( 'reedwan_get_posts' );
}
class reedwan_get_posts extends WP_Widget {

	function reedwan_get_posts() {
		$widget_ops = array( 'classname' => 'posts-widget', 'description' => 'Show your latest, most views, most commented, and random posts' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'posts-widget' );
		$this->WP_Widget( 'posts-widget','Corporative: Posts Widget', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		global $post;
		$title = apply_filters('widget_title', $instance['cat_posts_title'] );
		$num_posts = $instance['num_posts'];
		$cats_id = $instance['cats_id'];
		$meta = $instance['meta'];
		$posts_order = $instance['posts_order'];
		
		$videoURL = $post_thumbnail_small = $thumb_size_small = $thumbnail_small = $image_attributes =$bigimage ='';
		echo $before_widget;
		echo $before_title;
		echo $title ; 
		echo $after_title;
		echo '<ul class="posts-widget-block">';
		if( $posts_order == 'random') {$orderby ="rand";}
		elseif( $posts_order == 'views') {$orderby ="meta_value_num";}
		elseif( $posts_order == 'comments') {$orderby ="comment_count";}
		else {$orderby = "date";}
		
		if( $posts_order == 'views') {$posts_args = array('post_type' => 'post', 'posts_per_page' => $num_posts, 'meta_key' => 'post_views_count', 'orderby' => $orderby , 'post_status' => 'publish', 'ignore_sticky_posts' => 1);}
		else {$posts_args = array('post_type' => 'post', 'posts_per_page' => $num_posts, 'orderby' => $orderby , 'post_status' => 'publish', 'ignore_sticky_posts' => 1);}
		
		if( $cats_id != 'all'){$posts_args['cat'] = $cats_id;}
		$cat_query = new WP_Query( $posts_args ); 
		$counter = 1;
		if( $cat_query->have_posts() ) :
		while ( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
			
			<li class="<?php if($counter == 1) {echo'first';}?><?php if($counter == $num_posts) {echo'last';}?> clearfix">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post_thumb', array('class' => 'post-thumbnail')); ?></a>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php if($meta): ?>
				<div class="post-meta"><?php the_time('F j, Y'); ?></div>
				<?php endif; ?>
			</li>
		
		<?php $counter++; endwhile;
		endif;
		echo '</ul>';
		echo $after_widget;
		}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['cat_posts_title'] = strip_tags( $new_instance['cat_posts_title'] );
		$instance['num_posts'] = strip_tags( $new_instance['num_posts'] );
		$instance['cats_id'] = implode(',' , $new_instance['cats_id']  );
		$instance['meta'] = strip_tags( $new_instance['meta'] );
		$instance['posts_order'] = strip_tags( $new_instance['posts_order'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'cat_posts_title' =>'', 'num_posts' => '5' , 'posts_order' => 'latest' , 'cats_id' => '1' , 'meta' => 'true');
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$categories_obj = get_categories();
		$categories = array();

		foreach ($categories_obj as $pn_cat) {
			$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
		}
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'cat_posts_title' ); ?>"><?php _e( 'Title : ' , 'corporative') ?></label>
			<input id="<?php echo $this->get_field_id( 'cat_posts_title' ); ?>" name="<?php echo $this->get_field_name( 'cat_posts_title' ); ?>" value="<?php echo $instance['cat_posts_title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'num_posts' ); ?>"><?php _e( 'Number of posts to show :' , 'corporative') ?></label>
			<input id="<?php echo $this->get_field_id( 'num_posts' ); ?>" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" value="<?php echo $instance['num_posts']; ?>" type="text" size="3" />
		</p>
		<p>
			<?php $cats_id = explode ( ',' , $instance['cats_id'] ) ; ?>
			<label for="<?php echo $this->get_field_id( 'cats_id' ); ?>"><?php _e( 'Categories :' , 'corporative') ?></label>
			<select multiple="multiple" id="<?php echo $this->get_field_id( 'cats_id' ); ?>[]" name="<?php echo $this->get_field_name( 'cats_id' ); ?>[]">
				<?php foreach ($categories as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if ( in_array( $key , $cats_id ) ) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'posts_order' ); ?>"><?php _e( 'Posts Order :' , 'corporative') ?></label>
			<select id="<?php echo $this->get_field_id( 'posts_order' ); ?>" name="<?php echo $this->get_field_name( 'posts_order' ); ?>" >
				<option value="latest" <?php if( $instance['posts_order'] == 'latest' ) {echo "selected=\"selected\"";} else {echo "";} ?>><?php _e( 'Recent' , 'corporative') ?></option>
				<option value="random" <?php if( $instance['posts_order'] == 'random' ) {echo "selected=\"selected\"";} else {echo "";} ?>><?php _e( 'Random' , 'corporative') ?></option>
				<option value="views" <?php if( $instance['posts_order'] == 'views' ) {echo "selected=\"selected\"";} else {echo "";} ?>><?php _e( 'Most Views' , 'corporative') ?></option>
				<option value="comments" <?php if( $instance['posts_order'] == 'comments' ) {echo "selected=\"selected\"";} else {echo "";} ?>><?php _e( 'Most Commented' , 'corporative') ?></option>
			</select>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id( 'meta' ); ?>" name="<?php echo $this->get_field_name( 'meta' ); ?>" value="true" <?php if( $instance['meta'] ) {echo 'checked="checked"';} ?> type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'meta' ); ?>"><?php _e( 'Display Date' , 'corporative') ?></label>
		</p>

	<?php
	}
}