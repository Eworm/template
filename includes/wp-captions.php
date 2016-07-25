<?php

/* Remove inline width of captions
==================================================================================================================================*/
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');

function fixed_img_caption_shortcode($attr, $content = null)
{
    // Allow plugins/themes to override the default caption template.
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);

    if ( $output != '' ) return $output;
        extract(shortcode_atts(array(
            'id'=> '',
            'align'    => 'alignnone',
            'width'    => '',
            'caption' => ''), $attr));

    if ( 1 > (int) $site--width || empty($caption) )
        //return $content;
        extract(shortcode_atts(array(
            'id'=> '',
            'align'    => 'alignnone',
            'width'    => '',
            'caption' => ''), $attr));

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
        return '<div ' . $id . 'class="wp-caption ' . esc_attr($align)
        . '">'
        . do_shortcode( $content ) . '<p class="wp-caption-text">'
        . $caption . '</p></div>';

}

?>
