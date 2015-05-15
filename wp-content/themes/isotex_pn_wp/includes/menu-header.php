<?php 
	global $woocommerce; 
	$indicator = ' withindicator';
	if(rd_options('reedwan_menu_drop_indicator')!=1){
		$indicator = ' noindicator';
	}
?>
<nav>
	<ul id="mainnav" class="sf-menu<?php echo $indicator; ?>">
		<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
			<?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 4, 'container' => false, 'menu_id' => 'mainnav', 'items_wrap' => '%3$s', 'walker' => new reedwan_mega_walker())); ?>
			<?php if(rd_options('reedwan_search_header')==1 && rd_options('reedwan_header_style')!='header1' && rd_options('reedwan_header_style')!='header4' && !is_page_template('sample-template-header1.php') && !is_page_template('sample-template-header4.php')):?>
			<li class="search-pop">
				<a class="fa-search search-pop-button"></a>
				<div id="search-pop-form" class="search-pop-form">
					<?php get_search_form(); ?>
				</div>
			</li>
			<?php endif; ?>
			<?php if (class_exists('Woocommerce')) : ?>
				<?php if(rd_options('reedwan_woo_cart_link_nav')==1): ?>
					<li class="cart-nav">
						<?php if($woocommerce->cart->cart_contents_count): ?>
						<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><i class="fa-shopping-cart"></i><span class="cart-nav-count"><?php echo $woocommerce->cart->cart_contents_count; ?></span></a>
						<ul class="cart-nav-items">
							<?php foreach($woocommerce->cart->cart_contents as $cart_item): ?>
							<li class="cart-nav-item">
								<a href="<?php echo get_permalink($cart_item['product_id']); ?>">
								<?php $thumbnail_id = ($cart_item['variation_id']) ? $cart_item['variation_id'] : $cart_item['product_id']; ?>
								<div class="cart-img">
									<?php echo get_the_post_thumbnail($thumbnail_id, 'cart-nav'); ?>
								</div>
								<div class="cart-desc">
									<span class="product-desc"><?php echo $cart_item['data']->post->post_title; ?></span>
									<span class="product-desc"><?php echo $cart_item['quantity']; ?> x <?php echo $woocommerce->cart->get_product_subtotal($cart_item['data'], 1); ?></span>
								</div>
								</a>
							</li>
							<?php endforeach; ?>
							<li class="cart-nav-subtotal">
								<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>">
								<span class="cart-subtotal-title"><?php _e('Subtotal','corporative');?></span>
								<?php echo woocommerce_price($woocommerce->cart->subtotal); ?>
								</a>
							</li>
							<li class="cart-nav-checkout">
								<div class="cart-link"><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'corporative'); ?></a></div>
								<div class="checkout-link"><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>"><?php _e('Checkout', 'corporative'); ?></a></div>
							</li>
						</ul>
						<?php endif; ?>
					</li>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	</ul><!-- end menu -->
</nav><!-- end nav -->