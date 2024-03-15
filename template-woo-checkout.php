<?php
/*
Template Name: Afrekenen
*/

    $context = Timber::context();
    $context['post'] = Timber::get_post();
    $template = ['page-checkout.twig'];
    Timber::render($template, $context);
