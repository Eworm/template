<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $context['action'] = esc_url(wc_get_checkout_url());
    $context['checkout'] = $checkout;

    if ($checkout->get_checkout_fields()) :
        $context['show_fields'] = true;
    endif;

    $template = ['woo/checkout.twig'];
    Timber::render($template, $context);
