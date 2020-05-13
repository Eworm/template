<?php

/*  https://permanenttourist.ch/2016/02/better-image-compression-settings-for-wordpress/
    https://developer.wordpress.org/reference/functions/add_filter/
==================================================================================================================================*/
function set_jpeg_quality()
{
    return 82;
}
add_filter('set_jpeg_quality', 'jpeg_quality');
add_filter('set_jpeg_quality', 'wp_editor_set_quality');
