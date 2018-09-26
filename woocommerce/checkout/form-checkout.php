<?php

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $context['action'] = esc_url(wc_get_checkout_url());
    $context['checkout'] = $checkout;

    if ($checkout->get_checkout_fields()) :
        $context['show_fields'] = true;
    endif;

    $template = ['woo/checkout.twig'];
    Timber::render($template, $context);
