<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Column
$column ='';
if($woocommerce_loop['columns']== 1){$column = 'grid_12';}
else if($woocommerce_loop['columns']== 2){$column = 'grid_6';}
else if($woocommerce_loop['columns']== 3){$column = 'grid_4';}
else if($woocommerce_loop['columns']== 4){$column = 'grid_3';}
else if($woocommerce_loop['columns']== 6){$column = 'grid_2';}
else{$column = 'grid_4';}
?>

<li <?php post_class( 'grid_item isotope-item '.$column ); ?>>
	<div class="product_wrap">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
		
		<div class="product_inner">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		</div>
	
	</div>
	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>