<?php
/*
Template Name: Agenda
*/

    $context = Timber::get_context();

    $posts_query = array(
        'post_type' =>      'agenda',
        'orderby' =>        'date',
        'post_status' =>    'publish',
        'meta_key' =>       'datum',
        'orderby' =>        'meta_value',
    );

    $context['posts'] = Timber::get_posts($posts_query);
    $context['post'] = new TimberPost();
    $template = ['page-agenda.twig'];
    Timber::render($template, $context);
