<?php



/*//////////////////////////////////////////////////////////

Se crea el custom post type GALERIAS

*///////////////////////////////////////////////////////////



if ( ! function_exists('galeria_post_type') ) {



// Register Custom Post Type

    function galeria_post_type() {



        $labels = array(

            'name'                => _x( 'Galerias', 'Post Type General Name', 'corporative' ),

            'singular_name'       => _x( 'Galeria', 'Post Type Singular Name', 'corporative' ),

            'menu_name'           => __( 'Galeria', 'corporative' ),

            'parent_item_colon'   => __( 'Superior', 'corporative' ),

            'all_items'           => __( 'Todos', 'corporative' ),

            'view_item'           => __( 'Ver galeria', 'corporative' ),

            'add_new_item'        => __( 'Agregar nueva galeria', 'corporative' ),

            'add_new'             => __( 'Agregar nueva galeria', 'corporative' ),

            'edit_item'           => __( 'Editar galeria', 'corporative' ),

            'update_item'         => __( 'Actualizar galeria', 'corporative' ),

            'search_items'        => __( 'Buscar galeria', 'corporative' ),

            'not_found'           => __( 'No se han encontrado resultados', 'corporative' ),

            'not_found_in_trash'  => __( 'No galerias en la papelera', 'corporative' ),

        );

        $rewrite = array(

            'slug'                => 'galeria',

            'with_front'          => true,

            'pages'               => true,

            'feeds'               => true,

        );

        $args = array(

            'label'               => __( 'galeria', 'corporative' ),

            'description'         => __( 'Galeria de productos', 'corporative' ),

            'labels'              => $labels,

            'supports'            => array( 'title', 'editor', 'thumbnail', ),

            'hierarchical'        => true,

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

            'query_var'           => 'galeria',

            'rewrite'             => $rewrite,

            'capability_type'     => 'page',

        );

        register_post_type( 'galeria', $args );

    }



// Hook into the 'init' action

    add_action( 'init', 'galeria_post_type', 0 );



}

/*////////////////////////////////////////////////////

AGREGAR ICONO A EL PLUGIN

*/////////////////////////////////////////////////////

function aom_gallery_icon(){

    ?>

    <style type="text/css">

        #menu-posts-galeria .menu-icon-post .wp-menu-image::before{

            content: "\f161";

        }

    </style>

    <?php

}



add_action('admin_head','aom_gallery_icon');





/*//////////////////////////////////////////

AGREGAR TAXONOMIA PARA GALERIAS

*///////////////////////////////////////////



if ( ! function_exists( 'categorias_galeria_taxonomy' ) ) {



// Register Custom Taxonomy

    function categorias_galeria_taxonomy() {



        $labels = array(

            'name'                       => _x( 'Descripción', 'Taxonomy General Name', 'corporative' ),

            'singular_name'              => _x( 'Descripción', 'Taxonomy Singular Name', 'corporative' ),

            'menu_name'                  => __( 'Descripción', 'corporative' ),

            'all_items'                  => __( 'Todas', 'corporative' ),

            'parent_item'                => __( 'Superior', 'corporative' ),

            'parent_item_colon'          => __( 'Superior:', 'corporative' ),

            'new_item_name'              => __( 'Nueva categoria de galeria', 'corporative' ),

            'add_new_item'               => __( 'Agregar nueva categoria de galeria', 'corporative' ),

            'edit_item'                  => __( 'Editar categoria de galeria', 'corporative' ),

            'update_item'                => __( 'Actualizar categoria de galeria', 'corporative' ),

            'separate_items_with_commas' => __( 'Separar categorías con comas', 'corporative' ),

            'search_items'               => __( 'Buscar categorías de galería ', 'corporative' ),

            'add_or_remove_items'        => __( 'Agregar o remover categorias', 'corporative' ),

            'choose_from_most_used'      => __( 'Elegir entre la mas usadas', 'corporative' ),

            'not_found'                  => __( 'Categoría no encontrada', 'corporative' ),

        );

        $rewrite = array(

            'slug'                       => 'categorias_galeria',

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

        register_taxonomy( 'categorias_galeria', array( 'galeria' ), $args );

        flush_rewrite_rules();



    }



// Hook into the 'init' action

    add_action( 'init', 'categorias_galeria_taxonomy', 0 );



}