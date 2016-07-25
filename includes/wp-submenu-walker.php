<?php

/* Add "has-submenu" CSS class to navigation menu items that have children in a submenu
==================================================================================================================================*/
function nav_menu_item_parent_classing($classes,$item) 
{
    global $wpdb;
    $has_children = $wpdb -> get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'");
    
    if ( $has_children > 0 ) 
    {
        array_push($classes,'has-submenu');
    }
    return $classes;
}
add_filter('nav_menu_css_class','nav_menu_item_parent_classing', 10, 2);


?>
