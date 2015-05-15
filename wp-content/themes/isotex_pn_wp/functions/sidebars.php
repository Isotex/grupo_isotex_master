<?php
if ( function_exists('register_sidebar') ) {  
	register_sidebar( array(
		'name' => __( 'Global Sidebar', 'corporative' ), 
		'id' => 'global-sidebar',
		'description' => __( 'Widget area for default sidebar (tags, category, search, archive, and author) page', 'corporative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	));
	register_sidebar( array(
		'name' => __( 'Woocommerce Sidebar', 'corporative' ), 
		'id' => 'woo-sidebar',
		'description' => __( 'Widget area for woocommerce archive', 'corporative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	));
	register_sidebar( array(
		'name' => __( 'Side Navigation', 'corporative' ), 
		'id' => 'side-navigation',
		'description' => __( 'Widget area for side navigation page', 'corporative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	));
	register_sidebar( array(
		'name' => __( 'footer one', 'corporative' ),
		'id' => 'footer-one',
		'description' => __( 'An optional widget area for your site footer', 'corporative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	) );

	register_sidebar( array(
		'name' => __( 'footer two', 'corporative' ),
		'id' => 'footer-two',
		'description' => __( 'An optional widget area for your site footer', 'corporative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	) );

	register_sidebar( array(
		'name' => __( 'footer three', 'corporative' ),
		'id' => 'footer-three',
		'description' => __( 'An optional widget area for your site footer', 'corporative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	) );

	register_sidebar( array(
		'name' => __( 'footer four', 'corporative' ),
		'id' => 'footer-four',
		'description' => __( 'An optional widget area for your site footer', 'corporative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => "</div>",
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>'
	) );
}