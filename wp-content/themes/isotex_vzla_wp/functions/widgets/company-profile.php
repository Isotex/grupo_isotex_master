<?php
class Company_Profile extends WP_Widget {

	public function __construct() {
		
		parent::__construct(
	 		'company-profile', 
			__( 'Corporative: Company Profile', 'corporative' ), 
			array( 'description' => __( 'Display info about your company. Such as logo, text & address', 'corporative' ), )
		);
		
	}

	public function widget($args, $instance) {

		extract($args);

		$logo_url = $instance['logo_url'];
		$free_text = $instance['free_text'];
		$address =  $instance['address'] ;
		$phone = $instance['phone'] ;
		$email =  $instance['email'] ;

		echo $before_widget;
			echo '<div class="about-wrap">';

			if ( !empty ( $instance['logo_url'] ) ) {
				printf( '<img src="%s" alt="%s" />', esc_url( $instance['logo_url'] ), get_bloginfo( 'name' ) );
			}
			if ( !empty ( $instance['free_text'] ) ) {
				printf( '<div class="profile-text">%s</div>', esc_attr( $instance['free_text'] ) );
			}
			if ( !empty ( $instance['address'] ) || !empty ( $instance['phone'] ) || !empty ( $instance['email'] )){
				echo '<ul class="profile-add">';
					if ( !empty ( $instance['address'] ) ) {
						printf( '<li class="address"><i class="fa-map-marker"></i>%s</li>', esc_attr( $instance['address'] ) );
					}
					if ( !empty ( $instance['phone'] ) ) {
						printf( '<li class="phone"><i class="fa-phone"></i>%s</li>', esc_attr( $instance['phone'] ) );
					}
					if ( !empty ( $instance['email'] ) ) {
						printf( '<li class="email"><i class="c-email">&#64;</i>%s</li>', esc_attr( $instance['email'] ) );
					}
				echo '</ul>';
			}
			echo '</div>';
			
		echo $after_widget;
	}
	
	public function update($new_instance, $old_instance) {
		return $new_instance;
		$instance['logo_url'] = $new_instance['logo_url'] ;
		$instance['free_text'] =  $new_instance['free_text'] ;
		$instance['address'] =  $new_instance['address'] ;
		$instance['phone'] = $new_instance['phone'] ;
		$instance['email'] =  $new_instance['email'] ;
		return $instance;
	}
	

	public function form($instance) {
		
		/* Default widget settings. */
		$defaults = array(
			'logo_url' => '',
			'free_text' => '',
			'address' => '' , 
			'phone' => '', 
			'email' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>

        <p>
        	<label for="<?php echo $this->get_field_id('logo_url'); ?>"><?php _e('Logo URL', 'corporative'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('logo_url'); ?>" name="<?php echo $this->get_field_name('logo_url'); ?>" value="<?php echo $instance['logo_url']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('free_text'); ?>"><?php _e('Short text about the site', 'corporative'); ?>:</label>
			<textarea id="<?php echo $this->get_field_id('free_text'); ?>" name="<?php echo $this->get_field_name('free_text'); ?>" class="widefat" ><?php echo $instance['free_text']; ?></textarea>
        </p>
     
		<p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e('Address', 'corporative'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo $instance['address']; ?>" class="widefat" type="text" />

		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e('Phone', 'corporative'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $instance['phone']; ?>" class="widefat" type="text" />

		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e('Email', 'corporative'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $instance['email']; ?>" class="widefat" type="text" />

		</p>
		
		<?php
	}
}
register_widget( 'Company_Profile' );
