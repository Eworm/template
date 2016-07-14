<?php

/* Widget
==================================================================================================================================*/
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Widget',
    'before_widget' => '<section class="sidebar-section">',
    'after_widget' => '</section>',
    'before_title' => '<h1 class="sidebar-section-title">',
    'after_title' => '</h1>',
));

?>
