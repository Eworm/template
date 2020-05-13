<?php

/* Includes
==================================================================================================================================*/
include_once(get_stylesheet_directory() . '/functions/acf-options.php');
include_once(get_stylesheet_directory() . '/functions/plugin-timber.php');
include_once(get_stylesheet_directory() . '/functions/required-plugins.php');
include_once(get_stylesheet_directory() . '/functions/wm-autocomplete.php');
include_once(get_stylesheet_directory() . '/functions/wm-breadcrumbs.php');
include_once(get_stylesheet_directory() . '/functions/wm-contact.php');
/* Remove the minifier for Woocommerce themes, otherwise the cart won't work */
include_once(get_stylesheet_directory() . '/functions/wm-minify.php');
include_once(get_stylesheet_directory() . '/functions/wp-clean.php');
include_once(get_stylesheet_directory() . '/functions/wp-custom-post-type.php');
include_once(get_stylesheet_directory() . '/functions/wp-custom-post-type-icons.php');
include_once(get_stylesheet_directory() . '/functions/wp-hide-admin-items.php');
include_once(get_stylesheet_directory() . '/functions/wp-image-sizes.php');
include_once(get_stylesheet_directory() . '/functions/wp-image-quality.php');
include_once(get_stylesheet_directory() . '/functions/wp-options.php');
include_once(get_stylesheet_directory() . '/functions/wp-widgets.php');
include_once(get_stylesheet_directory() . '/functions/wp_admin-menu.php');
// include_once(get_stylesheet_directory() . '/functions/woo-support.php');
// include_once(get_stylesheet_directory() . '/functions/woo.php');


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
