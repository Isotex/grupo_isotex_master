<?php
add_action('widgets_init','reedwan_video_load_widgets');


function reedwan_video_load_widgets(){
		register_widget("Reedwan_Video_Widget");
}

class Reedwan_Video_Widget extends WP_widget{
	
	function Reedwan_Video_Widget(){
		$widget_ops = array('classname' => 'reedwan_video_widget', 'description' => 'Video Widget');

		$control_ops = array('id_base' => 'reedwan_video_widget');

		$this->WP_Widget('reedwan_video_widget', 'Corporative: Video Widget', $widget_ops, $control_ops);
		
	}
	
	function widget($args,$instance){
		extract($args);
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$type = $instance['type'];
		$id = $instance['id'];

		/* Before widget (defined by corporatives). */
		echo $before_widget;

		/* Title of widget (before and after defined by corporatives). */
		if ( $title )
			echo $before_title . $title . $after_title;

		?>
		<div class="video-container">
			<?php if($type == 'Youtube') { ?>
			
			<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo $id; ?>?rel=0 &autohide=1&showinfo=0&wmode=transparent" frameborder="0" allowfullscreen></iframe>
			
			<?php } elseif($type == 'Vimeo') { ?>
			
			<iframe src="//player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0" width="559" height="314" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			
			<?php } elseif($type == 'Dialymotion') { ?>
			
			<iframe frameborder="0" width="480" height="270" src="http://www.dailymotion.com/embed/video/<?php echo $id ?>?logo=0"></iframe>
			<?php } ?>
			
		</div>
		<?php 
		/* After widget (defined by corporatives). */
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type'] = $new_instance['type'];
		$instance['id'] = $new_instance['id'];
		return $instance;
	}
	
	function form($instance){
		$defaults = array( 'title' => 'Video', 'id' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'corporative') ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'type' ); ?>"><?php _e('type', 'corporative') ?></label>
			<select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" class="widefat">
				<option <?php if ( 'Youtube' == $instance['type'] ) echo 'selected="selected"'; ?>>Youtube</option>
				<option <?php if ( 'Vimeo' == $instance['type'] ) echo 'selected="selected"'; ?>>Vimeo</option>
				<option <?php if ( 'Dialymotion' == $instance['type'] ) echo 'selected="selected"'; ?>>Dialymotion</option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'id' ); ?>"><?php _e('Video ID:', 'corporative') ?></label>
			<input id="<?php echo $this->get_field_id( 'id' ); ?>" name="<?php echo $this->get_field_name( 'id' ); ?>" value="<?php echo $instance['id']; ?>" class="widefat" />
		</p>
		
		
		<?php

	}
}
?>