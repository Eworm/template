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
        'slug'                  => 'cpt',
        'taxonomies'            => array('category')
      );

    register_post_type('cpt', $args);
}
