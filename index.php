<?php
    
$context = Timber::get_context();

if (is_front_page())
{

	$template = ['home.twig'];

}

else if (is_page())
{

    $template = ['page.twig'];

}

Timber::render($template, $context);

?>
