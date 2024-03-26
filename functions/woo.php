<?php

// Extra timber code
function timber_set_product($post)
{
    global $product;

    if (is_woocommerce()) {
        $product = wc_get_product($post->ID);
    }
}

// Remove woocommerce images
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');

// Remove woocommerce css
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Remove EPO css
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Change the Number of WooCommerce Products Displayed Per Page
// add_filter( 'loop_shop_per_page', 'lw_loop_shop_per_page', 30 );
// function lw_loop_shop_per_page( $products ) {
//     $products = -1;
//     return $products;
// }
