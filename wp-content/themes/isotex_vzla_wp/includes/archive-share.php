<?php
	$thumbx = $thumby = '';
	$thumbx = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'facebook' ); 
	$thumby = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium' ); 
?>
<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank" class="lefttip" title="Twitter"><i class="icons-social-twitter"></i></a>
<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo urlencode(the_title()); ?>&amp;p[summary]=<?php echo urlencode(get_the_excerpt());?>&amp;p[url]=<?php echo urlencode(the_permalink()); ?>&amp;p[images][0]=<?php echo urlencode($thumbx[0]);?>" target="_blank" class="lefttip" title="Facebook"><i class="icons-social-facebook"></i></a>
<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" class="lefttip" title="Google Plus"><i class="icons-social-google-plus"></i></a>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php echo urlencode($post->post_title); ?>&amp;media=<?php echo urlencode($thumby[0]);?>" target="_blank" class="lefttip" title="Pinterest"><i class="icons-social-pinterest"></i></a>