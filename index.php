<?php
    
$context = Timber::get_context();

if (is_front_page())
{

    $context['post'] = new TimberPost();
	$template = ['home.twig'];

}

else if (is_page())
{

    $context['post'] = new TimberPost();
    $template = ['page.twig'];

}

else if (is_home())
{

    $context['page'] = new TimberPost();
        
    $posts_query = array(
        'post_type' =>      'post',
        'numberposts' =>    10,
        'orderby' =>        'date',
        'post_status' =>    'publish',
        'paged' =>          $paged
    );
    query_posts($posts_query);

    $context['posts'] = Timber::get_posts($posts_query);
    $context['pagination'] = Timber::get_pagination(4);
    
    $template = ['blog.twig'];

}

else if (is_single())
{

    $context['post'] = new TimberPost();
    $template = ['single.twig'];

}

Timber::render($template, $context);

?>
