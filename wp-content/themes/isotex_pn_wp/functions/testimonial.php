<?php
// Register Custom Post Type
function testimonials_post_type() {

	$labels = array(
		'name'                => _x( 'Testimonial', 'Post Type General Name', 'corporative' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'corporative' ),
		'menu_name'           => __( 'Testimonial', 'corporative' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'corporative' ),
		'all_items'           => __( 'All Testimonials', 'corporative' ),
		'view_item'           => __( 'View Testimonial', 'corporative' ),
		'add_new_item'        => __( 'Add New Testimonial', 'corporative' ),
		'add_new'             => __( 'Add New', 'corporative' ),
		'edit_item'           => __( 'Edit Testimonial', 'corporative' ),
		'update_item'         => __( 'Update Testimonial', 'corporative' ),
		'search_items'        => __( 'Search Testimonial', 'corporative' ),
		'not_found'           => __( 'Not found', 'corporative' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'corporative' ),
	);
	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		//'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonial', $args );

}

// Hook into the 'init' action
add_action( 'init', 'testimonials_post_type', 0 );

// Register Testimonial Category
function testimonial_category() {

	$labels = array(
		'name'                       => _x( 'Testimonial Categories', 'Taxonomy General Name', 'corporative' ),
		'singular_name'              => _x( 'Testimonial Category', 'Taxonomy Singular Name', 'corporative' ),
		'menu_name'                  => __( 'Categories', 'corporative' ),
		'all_items'                  => __( 'All Categories', 'corporative' ),
		'parent_item'                => __( 'Parent Category', 'corporative' ),
		'parent_item_colon'          => __( 'Parent Category:', 'corporative' ),
		'new_item_name'              => __( 'New Category Name', 'corporative' ),
		'add_new_item'               => __( 'Add New Category', 'corporative' ),
		'edit_item'                  => __( 'Edit Category', 'corporative' ),
		'update_item'                => __( 'Update Category', 'corporative' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'corporative' ),
		'search_items'               => __( 'Search Categories', 'corporative' ),
		'add_or_remove_items'        => __( 'Add or remove Categories', 'corporative' ),
		'choose_from_most_used'      => __( 'Choose from the most used Categories', 'corporative' ),
		'not_found'                  => __( 'Not Found', 'corporative' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => false,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'testimonial_category', 'testimonial', $args );

}
add_action( 'init', 'testimonial_category', 0 );