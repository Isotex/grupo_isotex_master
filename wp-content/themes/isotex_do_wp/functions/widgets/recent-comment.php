<?php 

add_action('widgets_init','reedwan_recent_comments');

function reedwan_recent_comments() {
	register_widget('reedwan_recent_comments');
	}

class reedwan_recent_comments extends WP_Widget {
	function reedwan_recent_comments() {
			
		$widget_ops = array('classname' => 'reedwan_comments','description' =>'Widget display Recent Comments with avatar');	
		$this->WP_Widget('reedwan_comments',__('Corporative: Recent Comments'),$widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$count = $instance['count'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		$counter = 1;
		
		// WP_Comment_Query arguments
		$args = array (
			'number' 		 => $count,
			'status'         => 'approve',
			'type'           => 'comment',
			'orderby'        => 'comment_date'
		);

		// The Comment Query
		$comment = new WP_Comment_Query;
		$comments = $comment->query( $args );
		echo '<div class="widget-block">';
		// The Comment Loop
		if ( $comments ) {?>
			<ul class="posts-widget-block">
			<?php foreach ( $comments as $comment ) { ?>
				<li class="clearfix">
				
					<a class="post-thumbnail" href="<?php echo get_permalink( $comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php echo strip_tags($comment->comment_author); ?>">
							<?php echo get_avatar( $comment->comment_author_email, '60' ); ?>
					</a>
					<h2><a href="<?php echo get_permalink( $comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo strip_tags($comment->comment_author); ?></a></h2> <?php _e('Says', 'corporative'); ?>: <?php echo string_limit_words($comment->comment_content, 5); ?>
					
				</li>
			
			<?php $counter++;} ?>
			</ul>
		<?php 
		}
		else {
			echo 'No comments found.';
		}
		echo '</div>';
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = $new_instance['count'];
		return $instance;
	}
	
	function form( $instance ) {

		$defaults = array( 
			'title' => __('Comments', 'corporative'),
			'count' => '5'
 			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
    	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>">Number of comments</label>
		<input type="text" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" class="widefat" />
		</p>


   <?php 
	}
} 