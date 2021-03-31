<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $context['products'] = [];

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        $products_array = [];

        // General vars
        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

        //
        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {

            // URL
            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
            $products_array['url'] = get_permalink($product_id);

            // Delete button
            $myarray['delete_permalink'] = esc_url(wc_get_cart_remove_url($cart_item_key));
            $products_array['delete_productid'] = esc_attr($product_id);
            $products_array['delete_sku'] = esc_attr($_product->get_sku());

            // Thumbnail
            $thumbnail = get_the_post_thumbnail_url($product_id);

            if (! $product_permalink) {
                $products_array['thumbnail'] = $thumbnail;
            } else {
                $products_array['thumbnail'] = $thumbnail;
                // printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
            }

            // Title
            if (! $product_permalink) {
                $products_array['title'] = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
            } else {
                $products_array['title'] = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                // $products_array['title'] = apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key);
            }

            // Backorder notification
            if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                $products_array['backorder'] = true;
            }

            // Price
            $products_array['price'] = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);

            // Quantity
            if ($_product->is_sold_individually()) {
                $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1">', $cart_item_key);
            } else {
                $product_quantity = woocommerce_quantity_input(array(
                    'input_name'   => "cart[{$cart_item_key}][qty]",
                    'input_value'  => $cart_item['quantity'],
                    'max_value'    => $_product->get_max_purchase_quantity(),
                    'min_value'    => '0',
                    'product_name' => $_product->get_name(),
                ), $_product, false);
            }
            $products_array['quantity'] = apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);

            // Total
            $products_array['total'] = apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);

            // Merge with products
            $context['products'][] = $products_array;
        }
    }

    $context['nonce'] = wp_nonce_field('woocommerce-cart');
    $context['action'] = esc_url(wc_get_cart_url());
    $template = ['woo/cart.twig'];
    Timber::render($template, $context);
