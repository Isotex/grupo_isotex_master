<?php

// don't load directly
if (!defined('ABSPATH')) die('-1');

add_shortcode( 'share', 'share' );

function share( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title' => '',
        'share_item' => '',
    ), $atts));
	$out = '';
	$tip = 'toptip';
	global $post;
	$out .= '<div class="social vc_share">';
	$out .= '<h4>'.$title.'</h4>';
	$share_item_array = explode(",", $share_item);
	foreach($share_item_array as $item){
		if($item == 'twitter'):
			$out .= '<a href="http://twitter.com/home?status='.get_the_title().' '.get_permalink().'" target="_blank" class="'.$tip.'" title="Twitter"><i class="icons-social-twitter"></i></a>';
		endif;
		
		if($item == 'facebook'):
			$thumbx = '';
			$thumbx = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'facebook' ); 
			$out .= '<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]='.urlencode(get_the_title()).'&amp;p[summary]='.urlencode(get_the_excerpt()).'&amp;p[url]='.urlencode(get_permalink()).'&amp;p[images][0]='.urlencode($thumbx[0]).'" target="_blank" class="'.$tip.'" title="Facebook"><i class="icons-social-facebook"></i></a>';
		endif;
		
		if($item == 'google'):
			$out .= '<a href="https://plus.google.com/share?url='.get_permalink().'" onclick="javascript:window.open(this.href,"", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;" target="_blank" class="'.$tip.'" title="Google Plus"><i class="icons-social-google-plus"></i></a>';
		endif;
		
		if($item == 'pinterest'):
			$thumby = '';
			$thumby = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium' ); 
			$out .= '<a href="http://pinterest.com/pin/create/button/?url='.urlencode(get_permalink()).'&amp;description='.urlencode($post->post_title).'&amp;media='.urlencode($thumby[0]).'" target="_blank" class="'.$tip.'" title="Pinterest"><i class="icons-social-pinterest"></i></a>';
		endif;
		
		if($item == 'linkedin'):
			$out .= '<a href="http://linkedin.com/shareArticle?mini=true&amp;url='.get_permalink().'&amp;title='.get_the_title().'" target="_blank" class="'.$tip.'" title="Linkedin"><i class="icons-social-linkedin"></i></a>';
		endif;
		
		if($item == 'tumblr'):
			$out .= '<a href="http://www.tumblr.com/share/link?url='.urlencode(get_permalink()).'&amp;name='.urlencode($post->post_title).'&amp;description='.urlencode(get_the_excerpt()).'" target="_blank" class="'.$tip.'" title="Tumblr"><i class="icons-social-tumblr"></i></a>';
		endif;
		
		if($item == 'email'):
			$out .= '<a href="mailto:?subject='.get_the_title().'&amp;body='.get_permalink().'" class="'.$tip.'" title="Email"><i class="icons-mail"></i></a>';
		endif;
	}
	$out .= '</div>';
	return $out;
	
}