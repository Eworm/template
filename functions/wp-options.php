<?php

/* Add page excerpt support
==================================================================================================================================*/
if (function_exists('add_post_type_support')) {
    add_post_type_support('page', 'excerpt');
}


/* Add Post thumbnail support
==================================================================================================================================*/
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}


/* Add custom header support
==================================================================================================================================*/
if (function_exists('add_theme_support')) {
    $defaults = array(
        'default-image' => get_template_directory_uri() . '/img/header.jpg',
        'random-default'         => false,
        'width'                  => 980,
        'height'                 => 330,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support('custom-header', $defaults);
}
