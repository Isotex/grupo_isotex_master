<?php
class reedwan_mega_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/
	
	function __construct() {

		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'reedwan_mega_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'reedwan_mega_update_custom_nav_fields'), 10, 3 );
		
		
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'reedwan_mega_edit_walker'), 10, 2 );


	} // end constructor
	

	function reedwan_mega_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->subtitle = get_post_meta( $menu_item->ID, '_menu_item_subtitle', true );
	    $menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
	    $menu_item->column = get_post_meta( $menu_item->ID, '_menu_item_column', true );
	    $menu_item->nav_label = get_post_meta( $menu_item->ID, '_menu_item_nav_label', true );
	    return $menu_item;	    
	}
	
	function reedwan_mega_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	     // Check if element is properly sent
	    if ( isset( $_REQUEST['menu-item-megamenu']) && is_array( $_REQUEST['menu-item-megamenu']) ) {
	        $megamenu_value = isset($_REQUEST['menu-item-megamenu'][$menu_item_db_id])? $_REQUEST['menu-item-megamenu'][$menu_item_db_id] : 0;
	        update_post_meta( $menu_item_db_id, '_menu_item_megamenu', $megamenu_value );
	    }

	     // Check if element is properly sent
	    if ( isset( $_REQUEST['menu-item-column']) && is_array( $_REQUEST['menu-item-column']) ) {
	        $megamenu_value = isset($_REQUEST['menu-item-column'][$menu_item_db_id])? $_REQUEST['menu-item-column'][$menu_item_db_id] : 0;
	        update_post_meta( $menu_item_db_id, '_menu_item_column', $megamenu_value );
	    }
	     // Check if element is properly sent
	    if ( isset( $_REQUEST['menu-item-nav_label']) && is_array( $_REQUEST['menu-item-nav_label']) ) {
	        $megamenu_value = isset($_REQUEST['menu-item-nav_label'][$menu_item_db_id])? $_REQUEST['menu-item-nav_label'][$menu_item_db_id] : 1;
	        update_post_meta( $menu_item_db_id, '_menu_item_nav_label', $megamenu_value );
	    }
	}
	function reedwan_mega_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}
}

// instantiate plugin's class
$GLOBALS['sweet_custom_menu'] = new reedwan_mega_menu();


include_once( 'edit_custom_walker.php' );
include_once( 'custom_walker.php' );