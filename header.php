<!DOCTYPE html>
<html lang="nl">
    <head>

        <meta charset="utf-8">

        <title>
        <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;

            wp_title( '|', true, 'right' );
        ?>
        </title>

        <!-- No description tag. Use Yoast SEO instead. -->

        <meta name="language" content="nl">
        <meta name="revisit-after" content="15 days">
        <meta name="robots" content="index, follow">

        <!-- iOS stuff -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">

        <!-- Mobile viewport optimized: h5bp.com/viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Microsoft. Delete if not required -->
        <meta http-equiv="cleartype" content="on">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- Removing the highlight for mobile IE10. Stupid to make this a meta tag instead of a css property -->
        <meta name="msapplication-tap-highlight" content="no">

        <!-- Modern favicons: http://thenewcode.com/28/Making-And-Deploying-SVG-Favicons -->
        <!-- Use http://realfavicongenerator.net/ for all other root icons -->
        <link rel="icon" type="image/png" href="/favicon.png">
        <link rel="mask-icon" href="/icon.svg" color="#000000">
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">

        <link type="text/plain" rel="author" href="/humans.txt">

        <!-- Insert Google analytics here -->

        <?php wp_head(); ?>
        
        <!-- Include the above the fold css and replace all relative urls with the theme url -->
        <style>
            <?php

                // Add the theme url to external files
                function replaceUrl($buffer) {
                    return (str_replace('url(', 'url(' . get_bloginfo('template_url') . '/', $buffer));
                }

                // Include the above the fold css
                ob_start('replaceUrl');
                include 'style-critical.css';
                ob_end_flush();

            ?>
        </style>

        <!-- Visitors without javascript get the rest of the stylesheet the standard way -->
        <noscript>
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        </noscript>

        <!-- Script suggestion from google on how to insert the stylesheet -->
        <script>

            // So we can use the template url in javascript
            var templateUrl = '<?php bloginfo('template_url'); ?>';

            // Insert the remaining css & js as soon as possible
            var cb = function() {

                var l = document.createElement('link'); l.rel = 'stylesheet';
                l.href = '<?php bloginfo('stylesheet_url'); ?>';

                var y = document.createElement('script');
                y.src = '<?php bloginfo('template_url'); ?>/js/lab.min.js';

                var h = document.getElementsByTagName('noscript')[0];
                h.parentNode.insertBefore(l, h);
                h.parentNode.insertBefore(y, h);
            };

            var raf = false;
            try {
                raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
            } catch(e) {}

            if (raf) raf(cb);
            else window.addEventListener('load', cb);

        </script>

    </head>
    <body>

        <div class="symbols" aria-hidden="true">
            <?php echo file_get_contents(get_template_directory_uri() . '/images/sprite.svg'); ?>
        </div>

        <div class="container">

            <header class="header divider divider--header" role="banner">

                <div class="core core--header">
                    
                    <div class="row">

                        <a href="<?php echo get_option('home'); ?>" class="logo" rel="home" title="<?php _e( 'Terug naar de homepage', 'thema_vertalingen' ); ?>">
                            
                            <svg class="logo__img">
                                <title>
                                    <?php bloginfo('name'); ?>
                                </title>
                                <use xlink:href="#logo">
                            </svg>
    
                        </a>
    
                        <p class="cp">
    
                            <?php bloginfo( 'description' ); ?>
    
                        </p>
    
                        <?php get_search_form(); ?>
                    
                    </div>

                </div>
                
                <div class="core core--mainmenu">
                    
                    <div class="row">
                    
                        <nav class="mainmenu" role="navigation" >
            
                            <?php wp_nav_menu( array(
                                'theme_location' => 'main-menu',
                                'container' => '',
                                'menu_id' => '',
                                'menu_class' => 'main-menu',
                                'depth' => '2'
                            )); ?>
            
                        </nav>
                        
                    </div>
                    
                </div>

            </header>

