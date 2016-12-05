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

    $context['post'] = new TimberPost();

    $posts_query = array(
        'post_type' =>      'post',
        'orderby' =>        'date',
        'post_status' =>    'publish',
        'paged' =>          $paged
    );

    $context['posts'] = Timber::get_posts($posts_query);
    $context['pagination'] = Timber::get_pagination(4);
    $template = ['blog.twig'];

}

else if (is_single())
{

    $context['post'] = new TimberPost();
    $cover_image_id = $post->cover_image;
    $context['cover_image'] = new TimberImage($cover_image_id);
    $template = ['single.twig'];

}

else if (is_post_type_archive())
{

    $context['post'] = new TimberPost();
	$context['posts'] = Timber::get_posts();
	$template = ['archive.twig'];

}

else if (is_category())
{

    $context['post'] = new TimberPost();
	$context['posts'] = Timber::get_posts();
	$template = ['category.twig'];

}

else if (is_tag())
{

    $context['post'] = new TimberPost();
	$context['posts'] = Timber::get_posts();
	$template = ['tag.twig'];

}

else if (is_404())
{

	$template = ['errors/404.twig'];

}

Timber::render($template, $context);

?>
