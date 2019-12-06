<?php

if (! class_exists('Timber')) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';

    return;
}

$context            = Timber::get_context();
$context['cart']    = WC()->cart->get_cart_contents_count();


// Single product
if (is_singular('product')) {
    $context['post']    = Timber::get_post();
    $product            = wc_get_product($context['post']->ID);
    $context['product'] = $product;
    Timber::render('woo/single-product.twig', $context);

    // Restore the context and loop back to the main query loop.
    wp_reset_postdata();
}


// Category or shop
else {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 50,
    );
    $posts                  = Timber::get_posts($args);
    $context['products']    = $posts;

    if (is_product_category()) {
        $queried_object         = get_queried_object();
        $term_id                = $queried_object->term_id;
        $context['category']    = get_term($term_id, 'product_cat');
        $context['title']       = single_term_title('', false);
    } else {
        $post                 = Timber::get_post(get_option('woocommerce_shop_page_id'));
        $context['title']     = $post->title;
        $context['content']   = $post->content;
    }

    Timber::render('woo/archive.twig', $context);
}
