<?php
add_action('widgets_init', 'flickr_load_widgets');

function flickr_load_widgets()
{
	register_widget('Flickr_Widget');
}

class Flickr_Widget extends WP_Widget {
	
	function Flickr_Widget()
	{
		$widget_ops = array('classname' => 'flickr', 'description' => 'The most recent photos from flickr.');

		$control_ops = array('id_base' => 'flickr-widget');

		$this->WP_Widget('flickr-widget', 'Corporative: Flickr', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$screen_name = $instance['screen_name'];
		$number = $instance['number'];
		
		echo $before_widget;

		if($title) {
			echo $before_title.$title.$after_title;
		}
		

			$api_key = 'db4e18c03d2e0ee7a76b615ca08a86ea';
			

			if($screen_name) {
				$photos_url = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.urls.getUserPhotos&api_key='.$api_key.'&user_id='.$screen_name.'&format=json');
				$photos_url = trim($photos_url['body'], 'jsonFlickrApi()');
				$photos_url = json_decode($photos_url);
				
				$photos = wp_remote_get('http://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key='.$api_key.'&user_id='.$screen_name.'&per_page='.$number.'&format=json');
				$photos = trim($photos['body'], 'jsonFlickrApi()');
				$photos = json_decode($photos);
				?>
				
				<div class="flickr-widget grid-widget">
					<?php foreach($photos->photos->photo as $photo): $photo = (array) $photo; ?>
						<div class="item toptip" original-title="<?php echo $photo['title']; ?>">
							<a href="<?php echo $photos_url->user->url; ?><?php echo $photo['id']; ?>" target="_blank">
								<img src="<?php $url = "http://farm" . $photo['farm'] . ".static.flickr.com/" . $photo['server'] . "/" . $photo['id'] . "_" . $photo['secret'] . '_s' . ".jpg"; echo $url; ?>" alt="<?php echo $photo['title']; ?>" width="75" height="75" />
							</a>
						</div>
					<?php endforeach; ?>
				</div>
				<?php
			} else {
				echo '<p>Invalid flickr username.</p>';
			}

		
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['screen_name'] = $new_instance['screen_name'];
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Photos from Flickr', 'screen_name' => '', 'number' => 6);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('screen_name'); ?>">Flick ID:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('screen_name'); ?>" name="<?php echo $this->get_field_name('screen_name'); ?>" value="<?php echo $instance['screen_name']; ?>" /></br>
			<small>Get flickr ID here <a target="_blank" href="http://idgettr.com/">idgettr</a></small>
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of photos to show:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" />
		</p>
		
	<?php
	}
}
?>