<?php

/*  Remove uncommmented admin pages
==================================================================================================================================*/
function remove_menus() {
    remove_menu_page('index.php');                  // Hide Dashboard
    remove_menu_page('jetpack');                    // Hide Jetpack
    remove_menu_page('edit.php');                   // Hide Posts
    remove_menu_page('upload.php');                 // Hide Media
    remove_menu_page('edit.php?post_type=page');    // Hide Pages
    remove_menu_page('edit-comments.php');          // Hide Comments
    remove_menu_page('themes.php');                 // Hide Appearance
    remove_menu_page('plugins.php');                // Hide Plugins
    remove_menu_page('users.php');                  // Hide Users
    remove_menu_page('tools.php');                  // Hide Tools
    remove_menu_page('options-general.php');        // Hide Settings
}
// add_action( 'admin_menu', 'remove_menus');
