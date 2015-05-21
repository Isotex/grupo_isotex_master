<?php

if( ! defined( 'ABSPATH' ) ) {
    die;
}

if( ! class_exists( 'WooCorporative' ) ) {

    class WooCorporative {

    	function __construct() {
		
    		add_filter( 'woocommerce_show_page_title', array( $this, 'rd_shop_title'), 10 );
			
			// Products Archive
    		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
    		add_action( 'woocommerce_before_main_content', array( $this, 'rd_before_container' ), 10 );
    		add_action( 'woocommerce_after_main_content', array( $this, 'rd_after_container' ), 10 );
			
			// Products Sidebar
    		remove_action( 'woocommerce_sidebar' , 'woocommerce_get_sidebar', 10 );

    		// Remove Button
    		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			
    	} 

		function rd_before_container() {
			global $post;
			$post_sidebar = $sidebar = $leftbar = '';
			if(is_product()) {
				if(get_field( 'product_sidebar' )){$post_sidebar = get_field( 'product_sidebar' ); }
				if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_product_sidebar_position'); }
			}
			elseif(is_shop()) {
				$pageID = get_option('woocommerce_shop_page_id');
				if(get_field( 'page_sidebar', $pageID )){$post_sidebar = get_field( 'page_sidebar', $pageID ); }
				if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); }
			} 
			elseif(is_product_category() || is_product_tag() || is_shop()) {
				$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); 
			} 
			else{
				$post_sidebar = 'sidebar_none';
			}
			if($post_sidebar == 'sidebar_none'){ $sidebar='grid_12'; }
			else{ $sidebar='grid_9'; }
			if($post_sidebar == 'sidebar_left'){$leftbar = ' left-sidebar';}
			
			echo '<div class="page-content'.$leftbar.'">';
			echo '<div class="row clearfix">';
			echo '<div class="row_inner">';
			echo '<div class="pages pages_shop '.$sidebar.'">';
		}

		function rd_shop_title() {
			return false;
		}
		function is_sidebar_active( $index = 1){
    $sidebars   = wp_get_sidebars_widgets();
    $key        = (string) 'sidebar-'.$index;
 
    return (isset($sidebars[$key]));
}
		function rd_after_container() {
			$post_sidebar = '';
			if(is_product()) {
				if(get_field( 'product_sidebar' )){$post_sidebar = get_field( 'product_sidebar' ); }
				if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_product_sidebar_position'); }
			}
			elseif(is_shop()) {
				$pageID = get_option('woocommerce_shop_page_id');
				if(get_field( 'page_sidebar', $pageID )){$post_sidebar = get_field( 'page_sidebar', $pageID ); }
				if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); }
			} 
			elseif(is_product_category() || is_product_tag()) {
				$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); 
			} 
			else{
				$post_sidebar = 'sidebar_none';
			}
			
			echo '</div>';
			if($post_sidebar != 'sidebar_none'){
				echo '<div class="sidebar grid_3">';
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('woo-sidebar') ): endif;
				echo '</div>';
			}
			echo '</div></div></div>';
		}	
    } 
}
new WooCorporative();


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

// Thumbnail
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'rd_woocommerce_thumbnail', 10);
function rd_woocommerce_thumbnail() {
	$size = 'shop_catalog';
	$gallery = get_post_meta(get_the_ID(), '_product_image_gallery', true);
	$attachment_image = '';
	if(!empty($gallery)) {
		$gallery = explode(',', $gallery);
		$first_image_id = $gallery[0];
		$attachment_image = wp_get_attachment_image_src ($first_image_id , $size, false);
	}
	echo '<div class="product_image">';
	if($attachment_image) { $classes = 'product_img';} 
	else {$classes = '';}
	$thumb_image = get_the_post_thumbnail(get_the_ID() , $size, array('class' => $classes));
	echo '<a href="'. get_permalink() . '">'.$thumb_image.'<a>';
	if($attachment_image) { echo '<a href="'. get_permalink() . '"><img src="'.$attachment_image[0].'" class="product_img_hover"></a>'; }
	
	global $post, $product;
	if ( $product->is_on_sale() ){
		echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale', 'woocommerce' ) . '</span>', $post, $product );
	}
	
	$items_in_cart = array();
	$in_cart = in_array(get_the_ID(), $items_in_cart);
	if($in_cart) {
		echo '<span class="cart-loading"><i class="fa-check"></i></span>';
	} else {
		echo '<span class="cart-loading"><i class="fa fa-spinner fa-spin"></i></span>';
	}
	echo '</span>';
	

	echo apply_filters( 'woocommerce_loop_add_to_cart_link',
		sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s"><i class="fa-shopping-cart"></i></a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( $product->id ),
			esc_attr( $product->get_sku() ),
			$product->is_purchasable() ? 'add_to_cart_button' : '',
			esc_attr( $product->product_type ),
			esc_html( $product->add_to_cart_text() )
		),
	$product );
	echo '</div>';
}

// Post Per Page
add_filter('loop_shop_per_page', 'rd_loop_shop_per_page');
function rd_loop_shop_per_page()
{
	$out='';
	parse_str($_SERVER['QUERY_STRING'], $params);
	if(rd_options('reedwam_woo_items')) {
		$per_page = rd_options('reedwam_woo_items');
	} else {
		$per_page = 12;
	}
	$out = !empty($params['product_count']) ? $params['product_count'] : $per_page;
	return $out;
}


// Pagination
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'rd_woocommerce_pagination', 10 );
function rd_woocommerce_pagination() {
	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 )
	return;

	echo '<nav class="pagination">';
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base' 			=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
			'format' 		=> '',
			'current' 		=> max( 1, get_query_var('paged') ),
			'total' 		=> $wp_query->max_num_pages,
			'prev_text' 	=> '&lsaquo;',
			'next_text' 	=> '&rsaquo;',
			'type'			=> 'list',
			'end_size'		=> 3,
			'mid_size'		=> 3
		) ) );
	echo '</nav>';
}

// Loop Archive 
add_filter( 'loop_shop_columns', 'rd_loop_shop_columns', 1, 10 );
function rd_loop_shop_columns( $number_columns ) {
	$post_sidebar = '';
	if(is_product()) {
		if(get_field( 'product_sidebar' )){$post_sidebar = get_field( 'product_sidebar' ); }
		if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_product_sidebar_position'); }
	}
	elseif(is_shop()) {
		$pageID = get_option('woocommerce_shop_page_id');
		if(get_field( 'page_sidebar', $pageID )){$post_sidebar = get_field( 'page_sidebar', $pageID ); }
		if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); }
	} 
	elseif(is_product_category() || is_product_tag()) {
		$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); 
	} 
	else{
		$post_sidebar = 'sidebar_none';
	}
	if($post_sidebar == 'sidebar_none'){
		return 4;
	}
	else{
		return 3;
	}
	
}

// Loop Upsell 
function woocommerce_upsell_display( $posts_per_page = '', $columns = '', $orderby = '' ) {
	$post_sidebar = $column = '';
	if(is_product()) {
		if(get_field( 'product_sidebar' )){$post_sidebar = get_field( 'product_sidebar' ); }
		if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_product_sidebar_position'); }
	}
	elseif(is_shop()) {
		$pageID = get_option('woocommerce_shop_page_id');
		if(get_field( 'page_sidebar', $pageID )){$post_sidebar = get_field( 'page_sidebar', $pageID ); }
		if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); }
	} 
	elseif(is_product_category() || is_product_tag()) {
		$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); 
	} 
	else{
		$post_sidebar = 'sidebar_none';
	}
	if($post_sidebar == 'sidebar_none'){
		$column = 4;
	}
	else{
		$column = 3;
	}
	woocommerce_get_template( 'single-product/up-sells.php', array(
	'posts_per_page' => $posts_per_page,
	'orderby' => $orderby,
	'columns' => $column
	) );
}

// Loop Related Product
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
function rd_output_related_products()
{
	$post_sidebar = $column = '';
	if(is_product()) {
		if(get_field( 'product_sidebar' )){$post_sidebar = get_field( 'product_sidebar' ); }
		if($post_sidebar == 'sidebar_default' || empty($post_sidebar)){$post_sidebar = rd_options('reedwan_woo_product_sidebar_position'); }
	}
	elseif(is_product_category() || is_product_tag() || is_shop()) {
		$post_sidebar = rd_options('reedwan_woo_archive_sidebar_position'); 
	} 
	else{
		$post_sidebar = 'sidebar_none';
	}
	if($post_sidebar == 'sidebar_none'){
		$column = 4;
	}
	else{
		$column = 3;
	}
	$args = array(
		'posts_per_page' => $column,
		'columns' => $column,
		'orderby' => 'rand'
	);
	echo '<div class="grid_12 clearfix">';
	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
	echo '</div>';
}

// Single Product
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );


add_action( 'woocommerce_before_single_product_summary', 'rd_show_product_images', 20 );
add_action( 'woocommerce_after_single_product_summary', 'rd_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'rd_template_single_excerpt', 20 );

add_action('woocommerce_after_single_product_summary', 'rd_output_related_products', 15);

function rd_show_product_images() {
	global $post, $woocommerce, $product;
	echo '<div class="grid_6">';
	echo '<div class="product_single_images mbff">';
		$attachment_ids = $product->get_gallery_attachment_ids();
		$attachment_count   = count( $product->get_gallery_attachment_ids() );
		$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
		$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
		$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
			'title' => $image_title
			) );
		
		if ( has_post_thumbnail() && $attachment_count <= 0 ) {
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" title="%s" data-rel="prettyPhoto">%s</a>', $image_link, $image_title, $image ), $post->ID );

		} 
		else if ( has_post_thumbnail() && $attachment_count > 0 ) {
			wp_enqueue_style('owl-carousel');
			wp_enqueue_script('owl-carousel');
			echo '<div class="rd_slides" data-navigation="yes" data-auto="5">';
			echo '<div>'. apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_title, $image ), $post->ID ) .'</div>';
			foreach ( $attachment_ids as $attachment_id ) {
				$images_link = wp_get_attachment_url( $attachment_id );
				$images_title = esc_attr( get_the_title( $attachment_id ) );
				$images       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
				
				echo '<div>'. apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $images_link, 'zoom', $images_title, $images ), $attachment_id, $post->ID, 'zoom' ) .'</div>';
			}
			echo '</div>';
		}
		else if ( !has_post_thumbnail() && $attachment_count > 1 ) {
			wp_enqueue_style('owl-carousel');
			wp_enqueue_script('owl-carousel');
			echo '<div class="rd_slides" data-navigation="yes" data-auto="5">';
			foreach ( $attachment_ids as $attachment_id ) {
				$images_link = wp_get_attachment_url( $attachment_id );
				$images_title = esc_attr( get_the_title( $attachment_id ) );
				$images       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
				
				echo '<div>'. apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $images_link, 'zoom', $images_title, $images ), $attachment_id, $post->ID, 'zoom' ) .'</div>';
			}
			echo '</div>';
		}
		else if ( !has_post_thumbnail() && $attachment_count == 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				$images_link = wp_get_attachment_url( $attachment_id );
				$images_title = esc_attr( get_the_title( $attachment_id ) );
				$images       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ) );
				
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto">%s</a>', $images_link, 'zoom', $images_title, $images ), $attachment_id, $post->ID, 'zoom' );
			}
		}
		else {
			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );
		}
		
		if ( $product->is_on_sale() ){
			echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . __( 'Sale', 'woocommerce' ) . '</span>', $post, $product );
		}
	echo '</div>';
	echo '</div>';
}

function rd_output_product_data_tabs() {
	$tabs = apply_filters( 'woocommerce_product_tabs', array() );

	if ( ! empty( $tabs ) ) :
	echo '<div class="grid_12">';
	echo '<div class="woocommerce-tabs mbff clearfix">';
		echo '<ul class="tabs">';
			foreach ( $tabs as $key => $tab ) :
				echo '<li class="'.$key.'_tab">';
					echo '<a href="#tab-'.$key.'">'.apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ).'</a>';
				echo '</li>';
			endforeach;
		echo '</ul>';
		echo '<ul class="tabs-content">';
			foreach ( $tabs as $key => $tab ) :
				echo '<li id="tab-'.$key.'">';
					echo call_user_func( $tab['callback'], $key, $tab );
				echo '</li>';
			endforeach;
		echo '</ul>';
	echo '</div>';
	echo '</div><div class="clearfix"></div>';
	endif;
}
function rd_template_single_excerpt() {
	global $post;

	if ( ! $post->post_excerpt ) return;
	echo '<div class="clearfix"></div>';
	echo '<div class="product_exceprt" itemprop="description">';
		echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );
	echo '</div>';
}

// Chart Menu
add_filter('add_to_cart_fragments', 'rd_header_add_to_cart_fragment');
function rd_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
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
	<?php
	$fragments['.cart-nav'] = ob_get_clean();
	return $fragments;

}

/* Overide Search Form Widget */
add_filter( 'get_product_search_form' , 'woo_custom_product_searchform' );
function woo_custom_product_searchform( $form ) {
	
	$form = '<form role="search" method="get" id="searchform asdasdasd" action="' . esc_url( home_url( '/'  ) ) . '">
		<div>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search Product ...', 'woocommerce' ) . '" />
			<button type="submit" class="toptip" title="Start Search"><i class="fa-search"></i></button>
			<input type="hidden" name="post_type" value="product" />
		</div>
	</form>';
	
	return $form;
	
}
	
	
