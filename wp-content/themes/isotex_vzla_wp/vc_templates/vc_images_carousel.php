<?php
$output = $title =  $onclick = $custom_links = $img_size = $custom_links_target = $images = $el_class = $partial_view = '';
$mode = $slides_per_view = $wrap = $hide_pagination_control = $hide_prev_next_buttons = $speed = $css_animation = $animated = $animated_data = $navigation = $padding = $grid = $tablet = $tabletsmall = $mobile = $mobilesmall = $autoplay =$outer_navigation = '';
extract(shortcode_atts(array(
    'title' => '',
    'onclick' => 'link_image',
    'custom_links' => '',
    'custom_links_target' => '',
    'img_size' => 'thumbnail',
    'images' => '',
    'el_class' => '',
	'css_animation' => '',
    'autoplay' => '',
    'navigation' => '',
	'outer_navigation' => '',
	'padding' => '',
	'grid' => '',
	'tablet' => '',
	'tabletsmall' => '',
	'mobile' => '',
	'mobilesmall' => '',
	'pagination' => ''
), $atts));
$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';
$pretty_rel_random = '';

wp_enqueue_style('owl-carousel');
wp_enqueue_script('owl-carousel');

$el_class = $this->getExtraClass($el_class);
$animated = $animated_data = '';
if($css_animation!=''){$animated=' animated ';$animated_data=' data-gen="'.$css_animation.'"';}
if ( $images == '' ) $images = '-1,-2,-3';
if ( $onclick == 'custom_link' ) { $custom_links = explode( ',', $custom_links); }

$images = explode( ',', $images);
$i = -1;
$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_images_carousel wpb_content_element'.$el_class.' clearfix', $this->settings['base']);
$carousel_id = '';
$pretty_rel_random = ' data-gal="lightbox['.rand().']" class="prettyphoto"'; //rel-'.rand();
?>
<div class="<?php echo apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $css_class.$animated, $this->settings['base']) ?>"<?php echo $animated_data;?>>

    <?php echo  wpb_widget_title(array('title' => $title)) ?>
	<?php if($padding=='carousel_padding'): ?>
	<div class="<?php echo $padding; ?>">
	<?php endif; ?>
        <div id="<?php echo $carousel_id ?>" class="rd_carousel<?php echo $outer_navigation; ?>" data-grid="<?php echo $grid; ?>" data-tablet="<?php echo $tablet; ?>" data-tabletsmall="<?php echo $tabletsmall; ?>" data-mobile="<?php echo $mobile; ?>" data-mobilesmall="<?php echo $mobilesmall; ?>" data-navigation="<?php echo $navigation; ?>" data-auto="<?php echo $autoplay; ?>" data-pagination="<?php echo $pagination; ?>">
			<?php foreach($images as $attach_id): ?>
			<?php
			$i++;
			if ($attach_id > 0) {
				$post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ));
				$thumb_title = get_the_title ($attach_id);
			}
			else {
				$different_kitten = 400 + $i;
				$post_thumbnail = array();
				$post_thumbnail['thumbnail'] = '<img src="http://placekitten.com/g/'.$different_kitten.'/300" />';
				$post_thumbnail['p_img_large'][0] = 'http://placekitten.com/g/1024/768';
			}
			$thumbnail = $post_thumbnail['thumbnail'];
			?>
			<div>
			<?php if ($onclick == 'link_image'): ?>
				<?php $p_img_large = $post_thumbnail['p_img_large']; ?>
				<a href="<?php echo $p_img_large[0] ?>" title="<?php echo  $thumb_title; ?>" <?php echo  $pretty_rel_random; ?>>
					<?php echo $thumbnail ?>
				</a>
			<?php elseif($onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != ''): ?>
				<a href="<?php echo $custom_links[$i] ?>"<?php echo (!empty($custom_links_target) ? ' target="'.$custom_links_target.'"' : '') ?>>
					<?php echo $thumbnail ?>
				</a>
			<?php else: ?>
				<?php echo $thumbnail ?>
			<?php endif; ?>
			</div> 
			 <?php endforeach; ?>
        </div>
	<?php if($padding=='carousel_padding'): ?>
	</div>
	<?php endif; ?>
</div><?php echo $this->endBlockComment('.wpb_images_carousel') ?>