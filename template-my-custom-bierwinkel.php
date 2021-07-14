<?php
/*
Template Name: Bierwinkel
*/

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $template = ['page-bierwinkel.twig'];
    Timber::render($template, $context);
