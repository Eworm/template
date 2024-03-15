<?php
/*
Template Name: Winkelmand
*/

    $context = Timber::context();
    $context['post'] = Timber::get_post();
    $template = ['page-cart.twig'];
    Timber::render($template, $context);
