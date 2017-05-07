<?php

/* Hide the ACF settings for everyone but adminstrators
==================================================================================================================================*/
add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin($show)
{
    return current_user_can('manage_options');
}


/* Add ACF options page
==================================================================================================================================*/
if (function_exists('acf_add_options_page')) {
    // acf_add_options_page(array('menu_title' => 'Algemene opties'));
}
