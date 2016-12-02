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

Timber::render($template, $context);

?>
