<?php


/* Custom post type icons
   Get the icon content here:
   https://developer.wordpress.org/resource/dashicons/#welcome-write-blog
==================================================================================================================================*/
function add_menu_icons_styles()
{
    ?>

<style>
#adminmenu .menu-icon-cpt div.wp-menu-image:before {
    content: "\f319";
}
</style>

<?php
}
add_action('admin_head', 'add_menu_icons_styles');


?>
