<?php
add_action('show_user_profile', 'wpsplash_extraProfileFields');
add_action('edit_user_profile', 'wpsplash_extraProfileFields');
add_action('personal_options_update', 'wpsplash_saveExtraProfileFields');
add_action('edit_user_profile_update', 'wpsplash_saveExtraProfileFields');

function wpsplash_saveExtraProfileFields($userID) {

	if (!current_user_can('edit_user', $userID)) {
		return false;
	}
	
	update_user_meta($userID, 'twitter', $_POST['twitter']);
	update_user_meta($userID, 'facebook', $_POST['facebook']);
	update_user_meta($userID, 'google_plus', $_POST['google_plus']);
	update_user_meta($userID, 'flickr', $_POST['flickr']);
	update_user_meta($userID, 'linkedin', $_POST['linkedin']);
	update_user_meta($userID, 'dribbble', $_POST['dribbble']);
	update_user_meta($userID, 'pinterest', $_POST['pinterest']);
	update_user_meta($userID, 'youtube', $_POST['youtube']);
	update_user_meta($userID, 'instagram', $_POST['instagram']);
}

function wpsplash_extraProfileFields($user)
{
?>
	<h3>Social Information</h3>

	<table class='form-table'>
		
		<tr>
			<th><label for='twitter'>Twitter URL</label></th>
			<td>
				<input type='text' name='twitter' id='twitter' value='<?php echo esc_attr(get_the_author_meta('twitter', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='facebook'>Facebook URL</label></th>
			<td>
				<input type='text' name='facebook' id='facebook' value='<?php echo esc_attr(get_the_author_meta('facebook', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='google_plus'>Google+ URL</label></th>
			<td>
				<input type='text' name='google_plus' id='google_plus' value='<?php echo esc_attr(get_the_author_meta('google_plus', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='flickr'>Flickr URL</label></th>
			<td>
				<input type='text' name='flickr' id='flickr' value='<?php echo esc_attr(get_the_author_meta('flickr', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='linkedin'>Linkedin URL</label></th>
			<td>
				<input type='text' name='linkedin' id='linkedin' value='<?php echo esc_attr(get_the_author_meta('linkedin', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='dribbble'>Dribbble URL</label></th>
			<td>
				<input type='text' name='dribbble' id='dribbble' value='<?php echo esc_attr(get_the_author_meta('dribbble', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='pinterest'>Pinterest URL</label></th>
			<td>
				<input type='text' name='pinterest' id='pinterest' value='<?php echo esc_attr(get_the_author_meta('pinterest', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='youtube'>Youtube URL</label></th>
			<td>
				<input type='text' name='youtube' id='youtube' value='<?php echo esc_attr(get_the_author_meta('youtube', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		<tr>
			<th><label for='instagram'>Instagram URL</label></th>
			<td>
				<input type='text' name='instagram' id='instagram' value='<?php echo esc_attr(get_the_author_meta('instagram', $user->ID)); ?>' class='regular-text' />
			</td>
		</tr>
		
	</table>
<?php } 

function author_box($user_id='', $single=false)
{
	$out='';
	$out.='<div class="author-pic">
			<a class="toptip" href="'.get_author_posts_url( $user_id ).'" title="'.count_user_posts( $user_id ).' '.__('posts','corporative').'">'.get_avatar( get_the_author_meta('user_email', $user_id), '110', '' ).'</a>
		</div>';
	
	
	$out.='<div class="author-description">';
		$out.= '<div class="author-title-social">';
			$out.= '<h4 class="author-title"><a href="'.get_author_posts_url( $user_id ).'">'.get_the_author_meta( 'display_name'  , $user_id ).' </a></h4>';
			
			/*<span class="author-count">('.count_user_posts( $user_id ).' '.__('posts','corporative').')<span>*/
			if(get_the_author_meta('email', $user_id) ||
				get_the_author_meta('twitter', $user_id) || 
				get_the_author_meta('facebook', $user_id) || 
				get_the_author_meta('google_plus', $user_id)|| 
				get_the_author_meta('flickr', $user_id) ||
				get_the_author_meta('linkedin', $user_id) || 
				get_the_author_meta('dribbble', $user_id) || 
				get_the_author_meta('pinterest', $user_id) || 
				get_the_author_meta('youtube', $user_id) || 
				get_the_author_meta('instagram', $user_id)){
			
				$out.= '<div class="author-social">';
					if(get_the_author_meta('twitter', $user_id))
						$out.= '<a target="_blank" class="fa-twitter toptip" title="twitter" href="'.get_the_author_meta('twitter', $user_id).'"></a>';
					if(get_the_author_meta('facebook', $user_id))
						$out.= '<a target="_blank" class="fa-facebook toptip" title="facebook" href="'.get_the_author_meta('facebook', $user_id).'"></a>';
					if(get_the_author_meta('google_plus', $user_id))
						$out.= '<a target="_blank" class="fa-google-plus toptip" title="google plus" href="'.get_the_author_meta('google_plus', $user_id).'"></a>';
					if(get_the_author_meta('flickr', $user_id))
						$out.= '<a target="_blank" class="fa-flickr toptip" title="flickr" href="'.get_the_author_meta('flickr', $user_id).'"></a>';
					if(get_the_author_meta('linkedin', $user_id))
						$out.= '<a target="_blank" class="fa-linkedin toptip" title="linkedin" href="'.get_the_author_meta('linkedin', $user_id).'"></a>';
					if(get_the_author_meta('dribbble', $user_id))
						$out.= '<a target="_blank" class="fa-dribbble toptip" title="dribbble" href="'.get_the_author_meta('dribbble', $user_id).'"></a>';
					if(get_the_author_meta('pinterest', $user_id))
						$out.= '<a target="_blank" class="fa-pinterest toptip" title="pinterest" href="'.get_the_author_meta('pinterest', $user_id).'"></a>';
					if(get_the_author_meta('youtube', $user_id))
						$out.= '<a target="_blank" class="fa-youtube toptip" title="youtube" href="'.get_the_author_meta('youtube', $user_id).'"></a>';
					if(get_the_author_meta('instagram', $user_id))
						$out.= '<a target="_blank" class="fa-instagram toptip" title="instagram" href="'.get_the_author_meta('instagram', $user_id).'"></a>';
					if(get_the_author_meta('email', $user_id))
						$out.= '<a target="_top" class="fa-envelope-o toptip" title="email" href="mailto:'.get_the_author_meta('email', $user_id).'"></a>';
					
				$out.= '</div>';	
			}
		$out.= '</div>';
		
		$out.='<p>'.get_the_author_meta( 'description'  , $user_id ).'</p>';	
		
		$out.= '</div>';	
	return $out;
}
