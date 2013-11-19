<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php
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
                echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
            ?></title>
        
        <?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <meta name="description" content="<?php the_excerpt_rss(); ?>">
        <?php endwhile; endif; elseif(is_front_page()) : ?>
            <meta name="description" content="<?php bloginfo('description'); ?>">
        <?php endif; ?>
        
        <?php
        // Use tags or the theme options seo keywords otherwise
        if (is_single()) {
            $posttags = get_the_tags();
            if ($posttags)
                foreach((get_the_tags()) as $tag) {
                    $keywords[] = strtolower($tag->name);
                }
                echo '<meta name="keywords" content="' . implode(", ", array_unique($keywords)) . '">';
        } else {
            $options = get_option('template_theme_options');
            echo '<meta name="description" content="';
            echo $options['seo_keywords'];
            echo '">';
        } ?>
        
        <meta name="language" content="nl">
        <meta name="revisit-after" content="15 days">
        <meta name="robots" content="index, follow">
        
        <!-- iOS stuff -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
        
        <?php if (is_single()) {
            // Twitter cards meta info
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
            $url = $thumb['0'];
            echo '<meta name="twitter:card" content="summary">';
            echo '<meta name="twitter:site" content="oldambtmeer">';
            echo '<meta name="twitter:title" content="' . get_the_title() . '">';
            echo '<meta name="twitter:description" content="' . get_the_excerpt() . '">';
            if ( has_post_thumbnail() ) {
                echo '<meta name="twitter:image:src" content="' . $url . '">';
            }
        } ?>
        
        <!-- Pinned tyle for Windows8 -->
        <meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/img/windows8-tile.png">
        <meta name="msapplication-TileColor" content="#000">
        
        <!-- Mobile viewport optimized: h5bp.com/viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Microsoft. Delete if not required -->
        <meta http-equiv="cleartype" content="on">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <!-- Removing the highlight for mobile IE10. Stupid to make this a meta tag instead of a css property -->
        <meta name="msapplication-tap-highlight" content="no">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
        <link type="text/plain" rel="author" href="/humans.txt">
        
        <!-- Insert Google analytics here -->
        
        <?php wp_head(); ?>
        
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-old-ie.css" media="screen">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
        <!--<![endif]-->
        
        <!-- Custom Modernizr build -->
        <script src="<?php bloginfo('template_url'); ?>/js/modernizr.min.js"></script>
        
    </head>
    <body>
        <div id="container">
            <div id="container-transition">
                <header id="header" class="wrapper">
                    <div class="holder">
                        <div id="togglers">
                            <ul>
                                <li id="menu-toggler"><a href="#mainmenu"><span>Menu</span></a></li>
                                <li id="content-toggler"><a href="#content"><span>Content</span></a></li>
                            </ul>
                        </div>
                        <a href="<?php echo get_option('home'); ?>" id="logo" rel="home" title="<?php _e( 'Terug naar de homepage', 'thema_vertalingen' ); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                        <p id="cp">
                            <?php bloginfo( 'description' ); ?>
                        </p>
                        <?php get_search_form(); ?>              
                        <nav id="menu">
                            <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '','menu_id' => 'mainmenu','menu_class' => 'inline', 'depth' => '2' ) ); ?>
                        </nav>  
                    </div>
                </header>