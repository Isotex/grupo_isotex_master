<?php 
	global $post;
	global $post_style; 
	if ($post_style=='style_two'){$tip='toptip';}
	else {$tip='lefttip';}
	$thumbx = $thumby = '';
	$thumbx = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'facebook' ); 
	$thumby = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium' ); 
?>
<?php if ($post_style=='style_two'): ?>
	<h4><?php _e('Compartir ','corporative')?></h4>
<?php endif; ?>
<?php if(rd_options_array('reedwan_post_sharing_list','twitter')): ?><a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank" class="<?php echo $tip; ?>" title="Twitter"><i class="icons-social-twitter"></i></a><?php endif; ?>
<?php if(rd_options_array('reedwan_post_sharing_list','facebook')): ?>
<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo urlencode(the_title()); ?>&amp;p[summary]=<?php echo urlencode(get_the_excerpt());?>&amp;p[url]=<?php echo urlencode(the_permalink()); ?>&amp;p[images][0]=<?php echo urlencode($thumbx[0]);?>" target="_blank" class="<?php echo $tip; ?>" title="Facebook"><i class="icons-social-facebook"></i></a>
<?php endif; ?>
<?php if(rd_options_array('reedwan_post_sharing_list','google_plus')): ?><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" class="<?php echo $tip; ?>" title="Google Plus"><i class="icons-social-google-plus"></i></a><?php endif; ?>
<?php if(rd_options_array('reedwan_post_sharing_list','pinterest')): ?><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php echo urlencode($post->post_title); ?>&amp;media=<?php echo urlencode($thumby[0]);?>" target="_blank" class="<?php echo $tip; ?>" title="Pinterest"><i class="icons-social-pinterest"></i></a><?php endif; ?>
<?php if(rd_options_array('reedwan_post_sharing_list','linkedin')): ?><a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank" class="<?php echo $tip; ?>" title="Linkedin"><i class="icons-social-linkedin"></i></a><?php endif; ?>
<?php if(rd_options_array('reedwan_post_sharing_list','tumblr')): ?><a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php echo urlencode($post->post_title); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>" target="_blank" class="<?php echo $tip; ?>" title="Tumblr"><i class="icons-social-tumblr"></i></a><?php endif; ?>
<?php if(rd_options_array('reedwan_post_sharing_list','email')): ?><a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" class="<?php echo $tip; ?>" title="Email"><i class="icons-mail"></i></a><?php endif; ?>