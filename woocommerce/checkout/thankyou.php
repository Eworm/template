<?php

    $context = Timber::get_context();
    $context['post'] = new TimberPost();

    if ($order) :

        $context['order'] = true;

        if ($order->has_status('failed')) :

            $context['status'] = 'failed';
            $context['payment_url'] = esc_url($order->get_checkout_payment_url());

            if (is_user_logged_in()) :
                $context['account_url'] = esc_url(wc_get_page_permalink('myaccount'));
            endif;

        else :

            $context['ordernumber'] = $order->get_order_number();
            $context['date'] = wc_format_datetime($order->get_date_created());

            if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) :
                $context['email'] = $order->get_billing_email();
            endif;

            $context['total'] = $order->get_formatted_order_total();

            if ($order->get_payment_method_title()) :
                $context['payment_method_title'] = wp_kses_post($order->get_payment_method_title());
            endif;

        endif;

        $context['payment_method'] = $order->get_payment_method();
        $context['order_id'] = $order->get_id();

    endif;

    $template = ['woo/thankyou.twig'];
    Timber::render($template, $context);
