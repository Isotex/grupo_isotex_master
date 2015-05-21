<?php
// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1060;

// Register Theme Features
function corporative_features()  {
	global $wp_version;

	add_theme_support( 'automatic-feed-links' );


	// Add theme support for Post Formats
	$formats = array('gallery', 'video', 'audio');
	add_theme_support( 'post-formats', $formats );	

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'portfolio' ) );	
	add_image_size( 'facebook', 100, 100, true );
	add_image_size( 'post_thumb', 60, 60, true );
	add_image_size( 'post_grid_thumb', 75, 75, true );
	add_image_size( 'cart-nav', 40, 40, true );
	
	
	add_image_size( 'carousel', 243, 160, true );
	add_image_size( 'single_small_one', 706 );
	add_image_size( 'single_big_one', 978 );
	add_image_size( 'single_small', 788 );
	add_image_size( 'single_big', 1060 );
	
	add_image_size( 'portfolio_media', 697 );
	add_image_size( 'portfolio_media_sidebar', 515 );
	add_image_size( 'portfolio', 515, 400, true );
	add_image_size( 'portfolio_masonry', 515 );
	
	add_image_size( 'blog_column1_bar_share', 706, 350, true );
	add_image_size( 'blog_column1_bar', 786, 380, true );
	add_image_size( 'blog_column1_share', 978, 430, true );
	add_image_size( 'blog_column1', 1058, 450, true );
	add_image_size( 'blog_masonry', 697 );
	add_image_size( 'blog_nomasonry', 697, 480, true );
	
	
	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style( 'editor-style.css' );	

	// Add theme support for Translation
	load_theme_textdomain( 'corporative', get_template_directory() . '/languages' );

    add_filter( 'allow_subdirectory_install',
        create_function( '', 'return true;' )
    );
}

// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'corporative_features' );

add_filter('widget_text', 'do_shortcode');

// Register Navigation Menus
function navigation_menus() {
	$locations = array(
		'main_menu' => __( 'Main Menu', 'corporative' ),
		'footer_menu' => __( 'Footer Menu', 'corporative' )
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'navigation_menus' );

// Admin
require_once ( 'admin/class-tgm-plugin-activation.php' );
require_once ( 'admin/plugin-activation.php' );
require_once ( 'admin/ReduxCore/framework.php' );
require_once ( 'admin/redux-config.php' );
require_once ( 'admin/acf/acf.php');
require_once ( 'admin/advanced-custom-fields.php');

// Custom Functions
require_once ( 'functions/widgets/newsletters.php' );
require_once ( 'functions/widgets/facebook.php' );
require_once ( 'functions/widgets/flickr.php' );
require_once ( 'functions/widgets/twitter.php' );
require_once ( 'functions/widgets/recent-comment.php' );
require_once ( 'functions/widgets/recent-post.php' );
require_once ( 'functions/widgets/recent-portfolio.php' );
require_once ( 'functions/widgets/tabs.php' );
require_once ( 'functions/widgets/company-profile.php' );
require_once ( 'functions/widgets/video.php' );

require_once ( 'functions/shortcodes/shortcodes.php');
require_once ( 'functions/content.php');
require_once ( 'functions/portfolio.php' );
require_once ( 'functions/sidebar-generator.php' );
require_once ( 'functions/sidebars.php' );
require_once ( 'functions/twitter/twitteroauth.php' );
require_once ( 'functions/twitter/twitter.php' );
require_once ( 'functions/breadcrumb.php');
require_once ( 'functions/post-views-count.php');
require_once ( 'functions/profile.php');
require_once ( 'functions/comments.php');
require_once ( 'functions/related-posts.php');
require_once ( 'functions/menu/mega-menu.php');
require_once ( 'functions/misc.php');
require_once ( 'functions/css.php');
require_once ( 'functions/js.php');

// Gallery Base 
add_filter( 'wp_get_attachment_link', 'sant_prettyadd');
function sant_prettyadd ($content) {
	$content = preg_replace("/<a/","<a data-gal=\"lightbox[gallery]\"",$content,1);
	return $content;
}

// Contact Form 7
add_action( 'wp_print_styles', 'deregister_cf7_styles', 100 );
function deregister_cf7_styles() {
        wp_deregister_style( 'contact-form-7' );
}

// Importer
require_once ( 'admin/importer/importer.php' );
add_action('admin_notices', 'coperative_admin_notice');
function coperative_admin_notice() {
	if( isset($_GET['imported'])) {
		if( $_GET['imported'] == 'success' ) {
			echo '<div class="updated"><p>';
			printf(__('Sucessfully imported demo data!','corporative'));
			echo "</p></div>";
		}
	}
}

// Admin Customization
function rd_options($option) {
	global $reedwan_options;
    if(isset($reedwan_options[$option]))
	{
		return $reedwan_options[$option];
	}
}
function rd_options_array($option,$arr) {
	global $reedwan_options;
    if(isset($reedwan_options[$option][$arr]))
	{
		return $reedwan_options[$option][$arr];
	}
}


// Visual Composer
if(function_exists('vc_set_as_theme')){
	require_once ( 'admin/visual-composer.php' );
	require_once ( 'vc_templates/vc_service_one.php' );
	require_once ( 'vc_templates/vc_service_two.php' );
	require_once ( 'vc_templates/vc_list_icon.php' );
	require_once ( 'vc_templates/vc_big_title.php' );
	require_once ( 'vc_templates/vc_pricing_table.php' );
	require_once ( 'vc_templates/vc_team_member.php' );
	require_once ( 'vc_templates/vc_testimonial.php' );
	require_once ( 'vc_templates/vc_counter.php' );
	require_once ( 'vc_templates/vc_posts.php' );
	require_once ( 'vc_templates/vc_portfolio.php' );
	require_once ( 'vc_templates/vc_posts_carousel.php' );
	require_once ( 'vc_templates/vc_portfolio_carousel.php' );
	require_once ( 'vc_templates/vc_gmap3.php' );
	require_once ( 'vc_templates/vc_space.php' );
	require_once ( 'vc_templates/vc_content_image.php' );
	require_once ( 'vc_templates/vc_share.php' );
	require_once ( 'vc_templates/vc_icon_box.php' );
	require_once ( 'vc_templates/testimonial_slider.php' );
	require_once ( 'vc_templates/testimonial_item.php' );
	require_once ( 'vc_templates/vc_icons.php' );
	require_once ( 'vc_templates/vc_social.php' );
}

// If revslider is activated
if( class_exists('UniteFunctionsRev') ) {
	if (is_admin()){
		function rev_meta_boxes() 
		{
			remove_meta_box('mymetabox_revslider_0', 'post', 'normal');
			remove_meta_box('mymetabox_revslider_0', 'page', 'normal');
			remove_meta_box('mymetabox_revslider_0', 'portfolio', 'normal');
			remove_meta_box('mymetabox_revslider_0', 'product', 'normal');
			remove_meta_box('mymetabox_revslider_0', 'topic', 'normal');
		}
		add_action( 'add_meta_boxes', 'rev_meta_boxes' );
	}
}

// WooCommerce
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'Woocommerce' ) ) { return true; } else { return false; }
	}
}

add_action('wp_head', 'check_plugins_loaded');
function check_plugins_loaded() {
	if(!function_exists('is_woocommerce')) {
		function is_woocommerce() { return false; }
	}
	if(!function_exists('is_bbpress')) {
		function is_bbpress() { return false; }
	}
}

add_theme_support('woocommerce');

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if ( class_exists( 'Woocommerce' ) ){
	require_once ( 'functions/woo_config.php' );
}

add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
function child_manage_woocommerce_styles() {
    if ( function_exists( 'is_woocommerce' ) ) {
		remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() && ! is_account_page()) {
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }
}

// Register Styles
function corporative_register_style() {
	if (!is_admin()) {
		wp_register_style('YTPlayer', get_template_directory_uri() . '/js/YTPlayer/css/YTPlayer.css');
		wp_register_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
	}
}
add_action('init', 'corporative_register_style');

function corporative_enqueue_style() {
	if (!is_admin()) {
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('icons', get_template_directory_uri() . '/css/icons.css');
		wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
		if ( class_exists( 'Woocommerce' ) ){
			wp_enqueue_style('shop', get_template_directory_uri() . '/css/shop.css');
		}
		if(rd_options('reedwan_responsive') == 1 ){
			wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
		}
		wp_enqueue_style('layer-slider-custom', get_template_directory_uri() . '/css/layerslider.css');
		
	}
}
add_action('wp_enqueue_scripts', 'corporative_enqueue_style');

function corporative_admin_enqueue_style()
{
	if (is_admin()) {
		wp_enqueue_style('icons', get_template_directory_uri() . '/css/icons.css');
		wp_enqueue_style('admin', get_template_directory_uri() . '/css/admin.css');
	}
}
add_action('admin_enqueue_scripts', 'corporative_admin_enqueue_style' );

// Register Scripts
function corporative_register_js() {
	if (!is_admin()) {
		wp_register_script('YTPlayer', get_template_directory_uri() . '/js/YTPlayer/jquery.mb.YTPlayer.js', array( 'jquery' ),false,true);
		wp_register_script('HTML5Video', get_template_directory_uri() . '/js/jquery.videobackground.js', array( 'jquery' ),false,true);
		wp_register_script('parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array( 'jquery' ),false,true);
		wp_register_script('flex-slider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ),false,true);
		wp_register_script('ProgressCircle', get_template_directory_uri() . '/js/ProgressCircle.js', array( 'jquery' ),false,true);
		wp_register_script('chart', get_template_directory_uri() . '/js/jquery.vc_chart.js', array( 'jquery' ),false,true);
		wp_register_script('countTO', get_template_directory_uri() . '/js/jquery.countTo.js', array( 'jquery' ),false,true);
		wp_register_script('isotop', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ),false,true);
		wp_register_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ),false,true);
		wp_register_script('gmap3', get_template_directory_uri() . '/js/gmap3.js', array( 'jquery' ),false,true);
		wp_register_script('googleapis', '//maps.googleapis.com/maps/api/js?sensor=false', array( 'jquery' ),false,true);
	}
}
add_action('init', 'corporative_register_js');

function corporative_enqueue_js() {
	if (!is_admin()) {
		wp_enqueue_script('theme20', get_template_directory_uri() . '/js/theme20.js', array( 'jquery' ),false,true);
		wp_enqueue_script('prettyPhotos', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array( 'jquery' ),false,true);
		wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ),false,true);
		if(is_singular() && comments_open() ){
			wp_enqueue_script( 'comment-reply' );
		}
		
	}
}
add_action('wp_enqueue_scripts', 'corporative_enqueue_js');

function corporative_admin_enqueue_js()
{
	if (is_admin()) {
		wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js');
	}
}
add_action('admin_enqueue_scripts', 'corporative_admin_enqueue_js' );


// MUESTRA TODO LOS POST DE TIPO DESCARGA DE UNA CATEGORIA
function download_category_post($atts,$name_category,$fancy) {


//Get the download button text
    $button_text = isset($args['button_text']) ? $args['button_text'] : '';
    if (empty($button_text)) {//Use the default text for the button
        $button_text_string = __('Descargar Ahora', 'sdm_lang');
    } else {//Use the custom text
        $button_text_string = $button_text;
    }

	// Attributes
	extract( shortcode_atts(
		array(
			'name_category' => $name_category,
			'fancy' => $fancy,
		), $atts )
	);

			// WP_Query arguments
			$args = array (
				'post_type'              => 'sdm_downloads',
				'post_status'            => 'publish',
				/*'category_name'          => 'brochures-productos',*/
				'pagination'             => true,
				'posts_per_page'         => '10',
				'posts_per_archive_page' => '10',
				'tax_query' => array(
					array(
					'taxonomy' => 'sdm_categories',
					'field' => 'slug',
					'terms' => $name_category, // Where term_id of Term 1 is "1".
					'include_children' => false
					)
				)
			);

			// The Query
			?>
			<div class="contenedor">
			<?php
			$query = new WP_Query( $args );

			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					/*//////////////TIPO DE FANCY/////////////////////////////////*/

					switch ($fancy) {
						case 1:
						// Get CPT thumbnail
    				$item_download_thumbnail = get_post_meta($query->post->ID, 'sdm_upload_thumbnail', true);    
					$isset_download_thumbnail = isset($item_download_thumbnail) && !empty($item_download_thumbnail) ? '<img class="sdm_download_thumbnail_image" src="' . $item_download_thumbnail . '" />' : '';

					// Get CPT title
				    $item_title = get_the_title($query->post->ID);
				    $isset_item_title = isset($item_title) && !empty($item_title) ? $item_title : '';

				    // Get CPT description
    				$isset_item_description = sdm_get_item_description_output($query->post->ID);

    				// Get download button
				    $homepage = get_bloginfo('url');
				    $download_url = $homepage . '/?smd_process_download=1&download_id=' . $query->post->ID;
				    $download_button_code = '<a href="' . $download_url . '" class="sdm_download ' . $def_color . '" title="' . $isset_item_title . '" target="_blank">' . $button_text_string . '</a>';

				    //Count download info
				    $db_count = sdm_get_download_count_for_post( $query->post->ID);
    				$string = ($db_count == '1') ? __('Download', 'sdm_lang') : __('Descargas', 'sdm_lang');
    				$download_count_string = '<span class="sdm_item_count_number">' . $db_count . '</span><span class="sdm_item_count_string"> ' . $string . '</span>';

					?>
					<div class="sdm_download_item">
						<div class="sdm_download_item_top">
							<div class="sdm_download_thumbnail"><?php echo $isset_download_thumbnail ?></div>
							<div class="sdm_download_title"><?php echo $isset_item_title ?></div>
						</div>
						<div style="clear:both;"></div>
						<div class="sdm_download_description"><?php echo $isset_item_description ?></div>
						<div class="sdm_download_link">
							<span class="sdm_download_button"><?php echo $download_button_code ?></span>
							<span class="sdm_download_item_count"><?php echo $download_count_string ?></span>
						</div>
					</div>
					<?php	
						break;

						case 2:
						// Get item thumbnail
						$item_download_thumbnail = get_post_meta($query->post->ID, 'sdm_upload_thumbnail', true);
    					$isset_download_thumbnail = isset($item_download_thumbnail) && !empty($item_download_thumbnail) ? '<img class="sdm_fancy2_thumb_image" src="' . $item_download_thumbnail . '" />' : '';

    					// Get item title
    					$item_title = get_the_title($query->post->ID);
    					$isset_item_title = isset($item_title) && !empty($item_title) ? $item_title : '';

    					//Get the download button text
					    $button_text = isset($args['button_text']) ? $args['button_text'] : '';
					    if (empty($button_text)) {//Use the default text for the button
					        $button_text_string = __('Descargar Ahora', 'sdm_lang');
					    } else {//Use the custom text
					        $button_text_string = $button_text;
					    }
					    $homepage = get_bloginfo('url');
					    $download_url = $homepage . '/?smd_process_download=1&download_id=' .$query->post->ID;
					    $download_button_code = '<a href="' . $download_url . '" class="sdm_fancy2_download" target="_blank">' . $button_text_string . '</a>';


    					// Check to see if the download link cpt is password protected
					    $get_cpt_object = $query->post->post_password;
					    $cpt_is_password = !empty($get_cpt_object) ? 'yes' : 'no';  // yes = download is password protected;    
					    if ($cpt_is_password !== 'no') {//This is a password protected download so replace the download now button with password requirement
					        $download_button_code = sdm_get_password_entry_form($query->post->ID);
					    }

						?>
							<div class="sdm_fancy2_item sdm_fancy2_grid">
								<div class="sdm_fancy2_wrapper">
									<div class="sdm_fancy2_download_item_top">
										<div class="sdm_fancy2_download_thumbnail"><?php echo $isset_download_thumbnail ?></div>
									</div>
									<div class="sdm_fancy2_download_title"><h4><?php echo $isset_item_title; ?></h4></div>
									<div class="sdm_fancy2_download_link"><?php echo $download_button_code; ?></div>
								</div>
							</div>
						<?php
						break;
					}//fin switch
					
				}//fin while
			} else {
				// no posts found
			}//fin del if
			?>
			</div>
			<?php
			// Restore original Post Data
			wp_reset_postdata();
	// Code
}
add_shortcode( 'download_category_post', 'download_category_post' );