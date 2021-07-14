<?php
/*
Template Name: About
*/

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $template = ['page-about.twig'];
    Timber::render($template, $context);
