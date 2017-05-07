<?php
/*
Template Name: Contactformulier
*/

    $context = Timber::get_context();
    $context['post'] = new TimberPost();
    $template = ['page-contact.twig'];
    Timber::render($template, $context);
