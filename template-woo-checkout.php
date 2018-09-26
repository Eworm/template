<?php
/*
Template Name: Afrekenen
*/

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $template = ['page-checkout.twig'];
    Timber::render($template, $context);
