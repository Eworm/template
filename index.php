<?php

$context = Timber::get_context();

if (is_front_page())
{

    $context['post'] = Timber::get_post();
    $template = ['home.twig'];

}

else if (is_page())
{

    $context['post'] = Timber::get_post();
    $template = ['page.twig'];

}

else if (is_home())
{

    $context['post'] = Timber::get_post();

    $posts_query = array(
        'post_type' =>      'post',
        'orderby' =>        'date',
        'post_status' =>    'publish',
        'paged' =>          $paged
    );

    $context['posts'] = Timber::get_posts($posts_query);
    $context['pagination'] = Timber::get_pagination(4);
    // $context['dynamic_sidebar'] = Timber::get_widgets('1');
    $template = ['blog.twig'];

}

else if (is_single())
{

    $context['post'] = Timber::get_post();
    // $context['dynamic_sidebar'] = Timber::get_widgets('1');
    $template = ['single.twig'];

}

else if (is_post_type_archive())
{

    $context['post'] = Timber::get_post();
    $context['posts'] = Timber::get_posts();
    $template = ['archive.twig'];

}

else if (is_category())
{

    $context['post'] = Timber::get_post();
    $context['posts'] = Timber::get_posts();
    $context['title'] = single_cat_title('', false);
    $template = ['category.twig'];

}

else if (is_tag())
{

    $context['post'] = Timber::get_post();
    $context['posts'] = Timber::get_posts();
    $context['title'] = single_cat_title('', false);
    $template = ['tag.twig'];

}

else if (is_search())
{

    $context['post'] = Timber::get_post();
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
