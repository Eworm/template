<?php


/* Agenda
==================================================================================================================================*/
add_action('init', 'agenda_register');
function agenda_register()
{
    $labels = array(
        'name'                  => _x('Agenda', 'post type general name'),
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
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'query_var'             => true,
        'menu_icon'             => '',
        'rewrite'               => true,
        'hierarchical'          => false,
        'menu_position'         => null,
        'supports'              => array('title', 'excerpt', ),
        'map_meta_cap'          => true,
        'has_archive'           => true,
        'slug'                  => 'agenda'
      );

    register_post_type('agenda', $args);
}
