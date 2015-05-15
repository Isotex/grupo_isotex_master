<?php
// Register Portfolio Post Type
function portfolio_post_type() {

	$labels = array(
		'name'                => _x( 'Portfolio', 'Post Type General Name', 'corporative' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'corporative' ),
		'menu_name'           => __( 'Portfolio', 'corporative' ),
		'parent_item_colon'   => __( 'Parent portfolio:', 'corporative' ),
		'all_items'           => __( 'All portfolios', 'corporative' ),
		'view_item'           => __( 'View portfolio', 'corporative' ),
		'add_new_item'        => __( 'Add New portfolio', 'corporative' ),
		'add_new'             => __( 'Add New', 'corporative' ),
		'edit_item'           => __( 'Edit Item', 'corporative' ),
		'update_item'         => __( 'Update portfolio', 'corporative' ),
		'search_items'        => __( 'Search portfolio', 'corporative' ),
		'not_found'           => __( 'Not found', 'corporative' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'corporative' ),
	);
	$args = array(
		'label'               => __( 'portfolio', 'corporative' ),
		'description'         => __( 'Portfolio Post Type', 'corporative' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'excerpt'),
		'taxonomies'          => array( 'portfolio_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
	//	'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,

	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_post_type', 0 );

// Register Portfolio Category
function portfolio_category() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'corporative' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'corporative' ),
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
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_category', 'portfolio', $args );

}
add_action( 'init', 'portfolio_category', 0 );