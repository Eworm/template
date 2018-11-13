<?php


/* CPT
==================================================================================================================================*/
add_action('init', 'cpt_register');
function cpt_register()
{
    $labels = array(
        'name'                  => _x('CPT', 'post type general name'),
        'singular_name'         => _x('Onderdeel', 'post type singular name'),
        'add_new'               => _x('Nieuw onderdeel', 'bedrijf item'),
        'add_new_item'          => __('Nieuw onderdeel toevoegen'),
        'edit_item'             => __('Onderdeel aanpassen'),
        'new_item'              => __('Nieuw onderdeel'),
        'view_item'             => __('Onderdeel bekijken'),
        'search_items'          => __('onderdelen doorzoeken'),
        'not_found'             =>  __('Geen onderdeel gevonden'),
        'not_found_in_trash'    => __('Niets in prullebak gevonden'),
        'parent_item_colon'     => ''
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'exclude_from_search'   => false,
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_icon'             => '',
        'rewrite'               => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'supports'              => array('title', 'editor', 'excerpt', 'comments'),
        'map_meta_cap'          => true,
        'has_archive'           => true,
        'slug'                  => 'cpt'
      );

    register_post_type('cpt', $args);
}


/* CPT Taxonomies
==================================================================================================================================*/
function create_cpt_taxonomies()
{
    $labels = array(
        'name'              => _x('Categorieën', 'taxonomy general name'),
        'singular_name'     => _x('Categorie', 'taxonomy singular name'),
        'search_items'      => __('Categorieën doorzoeken'),
        'all_items'         => __('All Categories'),
        'parent_item'       => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item'         => __('Edit Category'),
        'update_item'       => __('Update Category'),
        'add_new_item'      => __('Add New Category'),
        'new_item_name'     => __('New Category Name'),
        'menu_name'         => __('Categories'),
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'mediatheek' ),
    );

    register_taxonomy('create_cpt_taxonomies', array( 'mediatheek' ), $args);
}
add_action('init', 'create_cpt_taxonomies', 0);
