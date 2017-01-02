<?php

/* Widget
==================================================================================================================================*/
if ( function_exists('register_sidebar') )
register_sidebar( array(
    'name'          => 'Widgets',
    'description'   => 'Deze widgets staan op de blogpagina',
    'id'            => '1',
    'before_widget' => '<section class="sidebar__section">',
    'after_widget'  => '</section>',
    'before_title'  => '<h1 class="sidebar__section__header">',
    'after_title'   => '</h1>'
));

?>
