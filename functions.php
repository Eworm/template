<?php

/* Includes
==================================================================================================================================*/
include_once(get_stylesheet_directory() . '/includes/required-plugins.php');
include_once(get_stylesheet_directory() . '/includes/wm-minify.php');
include_once(get_stylesheet_directory() . '/includes/wm-breadcrumbs.php');
include_once(get_stylesheet_directory() . '/includes/wm-contact.php');
include_once(get_stylesheet_directory() . '/includes/wp-clean.php');
include_once(get_stylesheet_directory() . '/includes/wp-widgets.php');
include_once(get_stylesheet_directory() . '/includes/wp-options.php');
include_once(get_stylesheet_directory() . '/includes/wp-custom-post-type.php');
include_once(get_stylesheet_directory() . '/includes/wp-custom-post-type-icons.php');
include_once(get_stylesheet_directory() . '/includes/acf-options.php');
include_once(get_stylesheet_directory() . '/includes/plugin-timber.php');


/* Register menu's
==================================================================================================================================*/
function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => 'Hoofdmenu'
        )
    );
}
add_action('init', 'register_my_menus');
