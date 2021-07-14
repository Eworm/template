<?php

$context = Timber::get_context();

if (is_front_page())
{

    $context['post'] = new TimberPost();
    $context['options'] = get_fields('options');
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
        'post_status' =>    'publish'
    );

    $context['posts'] = Timber::get_posts($posts_query);
    $template = ['blog.twig'];

}

else if (is_single())
{

    $context['post'] = new TimberPost();
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
    $context['title'] = single_cat_title('', false);
    $template = ['category.twig'];

}

else if (is_tag())
{

    $context['post'] = new TimberPost();
    $context['posts'] = Timber::get_posts();
    $context['title'] = single_cat_title('', false);
    $template = ['tag.twig'];

}

else if (is_search())
{

    $context['post'] = new TimberPost();
    $context['posts'] = Timber::get_posts();
    $context['pagination'] = Timber::get_pagination(4);
    $context['searchterm'] = get_search_query();
    $template = ['search.twig'];

}

else if (is_author())
{

    $context['author'] = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    $template = ['author.twig'];

}

else if (is_404())
{

    $template = ['errors/404.twig'];

}

Timber::render($template, $context);

?>
