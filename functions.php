<?php

setlocale(LC_TIME, 'nl_NL');


/* Optional code to change the url
==================================================================================================================================*/
/*
update_option('siteurl','http://10.0.1.17/_htmltemplate/');
update_option('home','http://10.0.1.17/_htmltemplate/');
*/


/* Includes
==================================================================================================================================*/
require_once 'includes/clean.php';
require_once 'includes/minify.php';
require_once 'includes/breadcrumbs.php';
require_once 'includes/required-plugins.php';
require_once 'includes/contact.php';
require_once 'includes/widgets.php';
require_once 'includes/wp-options.php';
require_once 'includes/wp-submenu-walker.php';
require_once 'includes/wp-custom-post-types.php';
require_once 'includes/acf-options.php';


/* Register menu's
==================================================================================================================================*/
function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => 'Hoofdmenu'
        )
    );
}
add_action( 'init', 'register_my_menus' );



?>
