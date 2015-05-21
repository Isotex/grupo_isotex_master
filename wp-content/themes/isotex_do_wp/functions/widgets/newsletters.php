<?php
add_action( 'widgets_init', 'reedwan_feedburner_widget' );
function reedwan_feedburner_widget() {
	register_widget( 'feedburner_widget' );
}
class feedburner_widget extends WP_Widget {

	function feedburner_widget() {
		$widget_ops = array( 'classname' => 'widget-feedburner' , 'description' => 'Subscribe to feedburner via email' );
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'widget-feedburner' );
		$this->WP_Widget( 'widget-feedburner','Corporative: Newsletters', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$feedburner = $instance['feedburner'];
		
		echo $before_widget;
		echo $before_title;
		echo $title ; 
		echo $after_title;
		?>
		<form id="newsletters" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner ; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<p><input class="feedburner-email" type="text" name="email" value="<?php _e( 'Enter your e-mail address' , 'corporative') ; ?>" onfocus="if (this.value == '<?php _e( 'Enter your e-mail address' , 'corporative') ; ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Enter your e-mail address' , 'corporative') ; ?>';}"></p>
			<input type="hidden" value="<?php echo $feedburner ; ?>" name="uri">
			<input type="hidden" name="loc" value="en_US">	
			<button type="submit"><i class="fa-check"></i></button>
		</form>
		<?php
		echo $after_widget;			
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['feedburner'] = strip_tags( $new_instance['feedburner'] );
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => '' , 'feedburner' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title : </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'feedburner' ); ?>">Feedburner ID : </label>
			<input id="<?php echo $this->get_field_id( 'feedburner' ); ?>" name="<?php echo $this->get_field_name( 'feedburner' ); ?>" value="<?php echo $instance['feedburner']; ?>" class="widefat" type="text" />
		</p>


	<?php
	}
}
?>