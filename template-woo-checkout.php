<?php
/*
Template Name: Afrekenen
*/

    $context = Timber::get_context();
    $context['post'] = Timber::get_post();
    $template = ['page-checkout.twig'];
    Timber::render($template, $context);
