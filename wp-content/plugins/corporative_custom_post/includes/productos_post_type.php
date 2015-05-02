<?php



/*//////////////////////////////////////////////////////////

Se crea el custom post type producto

*///////////////////////////////////////////////////////////



if ( ! function_exists('aom_productos_post_type') ) {



// Register Custom Post Type

function aom_productos_post_type() {



	$labels = array(

		'name'                => _x( 'Productos', 'Post Type General Name', 'corporative' ),

		'singular_name'       => _x( 'Producto', 'Post Type Singular Name', 'corporative' ),

		'menu_name'           => __( 'Productos', 'corporative' ),

		'parent_item_colon'   => __( 'Superior', 'corporative' ),

		'all_items'           => __( 'Todos', 'corporative' ),

		'view_item'           => __( 'Ver Producto', 'corporative' ),

		'add_new_item'        => __( 'Agregar Nuevo Producto', 'corporative' ),

		'add_new'             => __( 'Agregar Nuevo', 'corporative' ),

		'edit_item'           => __( 'Editar Producto', 'corporative' ),

		'update_item'         => __( 'Actualizar Producto', 'corporative' ),

		'search_items'        => __( 'Buscar Producto', 'corporative' ),

		'not_found'           => __( 'No encontrado', 'corporative' ),

		'not_found_in_trash'  => __( 'No encontrado en papelera', 'corporative' ),

	);

	$rewrite = array(

            'slug'                => 'productos',

            'with_front'          => true,

            'pages'               => true,

            'feeds'               => true,

        );

	$args = array(

		'label'               => __( 'productos', 'corporative' ),

		'description'         => __( 'Catalogo de productos', 'corporative' ),

		'labels'              => $labels,

		'supports'            => array( 'title', 'editor', 'thumbnail', ),

		'hierarchical'        => false,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => true,

		'show_in_nav_menus'   => false,

		'show_in_admin_bar'   => true,

		'menu_position'       => 12,

		'can_export'          => true,

		'has_archive'         => true,

		'exclude_from_search' => false,

		'publicly_queryable'  => true,

		'query_var'           => 'productos',

		'rewrite'             => $rewrite,

		'capability_type'     => 'page',

	);

	register_post_type( 'productos', $args );



}



// Hook into the 'init' action

add_action( 'init', 'aom_productos_post_type', 0 );



}

/*////////////////////////////////////////////////////

AGREGAR ICONO A EL PLUGIN

*/////////////////////////////////////////////////////

function aom_productos_icon(){

	?>

	<style type="text/css">

        #menu-posts-productos .menu-icon-post .wp-menu-image::before{

            content: "\f322";

        }

    </style>

	<?php

}

add_action('admin_head','aom_productos_icon');



/*//////////////////////////////////////////

AGREGAR TAXONOMIA PARA PRODUCTOS

*///////////////////////////////////////////

if ( ! function_exists( 'aom_categoria_producto_taxonomy' ) ) {



// Register Custom Taxonomy

function aom_categoria_producto_taxonomy() {



	$labels = array(

		'name'                       => _x( 'Descripción', 'Taxonomy General Name', 'corporative' ),

		'singular_name'              => _x( 'Descripción', 'Taxonomy Singular Name', 'corporative' ),

		'menu_name'                  => __( 'Descripción', 'corporative' ),

		'all_items'                  => __( 'Todos', 'corporative' ),

		'parent_item'                => __( 'Superior', 'corporative' ),

		'parent_item_colon'          => __( 'Superior:', 'corporative' ),

		'new_item_name'              => __( 'Nueva Categoria', 'corporative' ),

		'add_new_item'               => __( 'Agregar Categoria', 'corporative' ),

		'edit_item'                  => __( 'Editar Categoria', 'corporative' ),

		'update_item'                => __( 'Actualizar Categoria', 'corporative' ),

		'separate_items_with_commas' => __( 'Separar items por comas', 'corporative' ),

		'search_items'               => __( 'Buscar Categoria', 'corporative' ),

		'add_or_remove_items'        => __( 'Agregar o Eliminar Categoria', 'corporative' ),

		'choose_from_most_used'      => __( 'Elegir entre las mas usadas', 'corporative' ),

		'not_found'                  => __( 'No encontrado', 'corporative' ),

	);

	$rewrite = array(

		'slug'                       => 'categoria_productos',

		'with_front'                 => true,

		'hierarchical'               => false,

	);

	$args = array(

		'labels'                     => $labels,

		'hierarchical'               => true,

		'public'                     => true,

		'show_ui'                    => true,

		'show_admin_column'          => true,

		'show_in_nav_menus'          => true,

		'show_tagcloud'              => false,

		'rewrite'                    => $rewrite,

	);

	register_taxonomy( 'categoria_productos', array( 'productos' ), $args );

	flush_rewrite_rules();

}



// Hook into the 'init' action

add_action( 'init', 'aom_categoria_producto_taxonomy', 0 );



}