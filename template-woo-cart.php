<?php
/*
Template Name: Winkelmand
*/

    $context = Timber::get_context();
    $context['post'] = Timber::get_post();
    $template = ['page-cart.twig'];
    Timber::render($template, $context);
