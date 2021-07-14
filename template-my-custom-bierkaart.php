<?php
/*
Template Name: Bierkaart
*/

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $context['options'] = get_fields('options');
    $template = ['page-bierkaart.twig'];
    Timber::render($template, $context);
