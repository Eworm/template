<!DOCTYPE html>
<html lang="nl" class="no-js">
    <head>
    
        <meta charset="utf-8">
        
        <title>
        <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;
        
            wp_title( '|', true, 'right' );
        
            // Add the blog name.
            bloginfo( 'name' );
        
            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                echo " | $site_description";
        
            // Add a page number if necessary:
            if ( $paged >= 2 || $page >= 2 )
                echo ' | ' . sprintf( __( 'Pagina %s', 'thema_vertalingen' ), max( $paged, $page ) );
        ?>
        </title>
        
        <?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <meta name="description" content="<?php the_excerpt_rss(); ?>">
        <?php endwhile; endif; elseif(is_front_page()) : ?>
            <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php endif; ?>
        
        <meta name="language" content="nl">
        <meta name="revisit-after" content="15 days">
        <meta name="robots" content="index, follow">
        
        <!-- iOS stuff -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
        
        <?php
            if (is_single()) :
            
                // Twitter cards meta info - only for a single blogpost
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
                $url = $thumb['0'];
                
                echo '<meta name="twitter:card" content="summary">';
                echo '<meta name="twitter:site" content="' . get_bloginfo('name') . '">';
                echo '<meta name="twitter:title" content="' . get_the_title() . '">';
                echo '<meta name="twitter:description" content="' . get_the_excerpt() . '">';
                
                if ( has_post_thumbnail() ) {
                    echo '<meta name="twitter:image:src" content="' . $url . '">';
                }
                
            endif;
        ?>
        
        <!-- Pinned tyle for Windows8 -->
        <meta name="msapplication-TileImage" content="<?php bloginfo('url'); ?>/windows8-tile.png">
        <meta name="msapplication-TileColor" content="#000">
        
        <!-- Mobile viewport optimized: h5bp.com/viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        
        <!-- Microsoft. Delete if not required -->
        <meta http-equiv="cleartype" content="on">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <!-- Removing the highlight for mobile IE10. Stupid to make this a meta tag instead of a css property -->
        <meta name="msapplication-tap-highlight" content="no">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
        <link type="text/plain" rel="author" href="/humans.txt">
        
        <?php
            $whitelist = array(
                'localhost',
                '10.0.1.17'
            );
            if ($link = (!in_array(
                $_SERVER['HTTP_HOST'],
                $whitelist
            ))) :
        ?>
        <!-- Insert Google analytics here -->
        <?php endif; ?>
        
        <?php wp_head(); ?>
        
        <!-- Include the above the fold css and replace all relative urls with the theme url -->
        <style>
            <?php
            
                // Add the theme url to external files
                function replaceUrl($buffer) {
                    return (str_replace('url("', 'url("' . get_bloginfo('template_url') . '/', $buffer));
                }
                
                // Include the above the fold css
                ob_start('replaceUrl');
                include 'style-above-the-fold.css';
                ob_end_flush();
                
            ?>
        </style>
        
        <!-- Visitors without javascript get the rest of the stylesheet the standard way -->
        <noscript>
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
        </noscript>
        
        <!-- Script suggestion from google on how to insert the stylesheet -->
        <script>
        
            // So we can use the template url in javascript
            var templateUrl = '<?php bloginfo('template_url'); ?>';
            
            // For ajax calls
            var templateAdminAjax = '<?php echo admin_url('admin-ajax.php'); ?>';
            
            // Insert the remaining css & js as soon as possible
            var cb = function() {
                
                var l = document.createElement('link'); l.rel = 'stylesheet';
                l.href = '<?php bloginfo('stylesheet_url'); ?>';
                
                var y = document.createElement('script');
                y.src = '<?php bloginfo('template_url'); ?>/js/lab.min.js';
                
                var h = document.getElementsByTagName('noscript')[0];
                h.parentNode.insertBefore(y, h);
                h.parentNode.insertBefore(l, h);
            };
            
            var raf = false;
            try {
                raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
            } catch(e) {}
            
            if (raf) raf(cb);
            else window.addEventListener('load', cb);
        </script>
        
        <!--[if lt IE 9]>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        
    </head>
    <body>
    
        <div id="js-container" class="container">
        
            <header id="js-header" class="header divider divider-header" role="banner">
            
                <div class="core core-header">
                    
                    <a href="<?php echo get_option('home'); ?>" id="js-logo" class="logo" rel="home" title="<?php _e( 'Terug naar de homepage', 'thema_vertalingen' ); ?>">
                        <?php bloginfo('name'); ?>
                    </a>
                    
                    <p class="cp">
                        <?php bloginfo( 'description' ); ?>
                    </p>
                    
                    <?php get_search_form(); ?>
                    
                </div>
                
            </header>
            <!-- .header -->

            <nav id="js-mainmenu" class="mainmenu divider divider-mainmenu" role="navigation" >
                
                <div class="core core-mainmenu">
                    
                    <?php wp_nav_menu( array(
                        'theme_location' => 'main-menu',
                        'container' => '',
                        'menu_id' => '',
                        'menu_class' => 'main-menu',
                        'depth' => '2'
                    )); ?>
                    
                </div>
                
            </nav>
