<?php

/* Register menu
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
