<?php get_header(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <div class="main-content col col-5">
    
                <?php if (have_posts()) : ?>
    
                    <?php /* Start the Loop */ ?>              
                    <?php while (have_posts()) : the_post(); ?>
    
                        <article <?php post_class(); ?>>
    
                            <header class="post-header">
                            
                                <h1 class="post-title">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?><?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h1>
    
                            </header>
                            
                            <div class="post-date">
                                
                                <time datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate">
                                    <?php the_time('j F Y') ?>
                                </time>
                                <?php edit_post_link('Aanpassen', ' | ',''); ?>
                                
                                <br>
                                <?php /* pages don't have categories or tags */ if (!is_page()) : ?>
                                    <?php _e( 'Categorie&euml;n', 'thema_vertalingen' ); ?>: <?php the_category(', '); ?>.
                                    <br>
                                    <?php if (get_the_tags()) the_tags('Tags: ', ', ', '.'); ?>
                                <?php endif; ?>
                            
                            </div>
    
                            <div class="post-entry">
    
                                <?php the_excerpt(); ?>
    
                                <span class="post-options">
    
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?>
                                        <?php the_title_attribute(); ?>"><?php _e( 'Verder lezen', 'thema_vertalingen' ); ?>
                                    </a>&nbsp;|&nbsp;
                                    
                                    <?php comments_popup_link('Reageer als eerste', 'Er is 1 reactie', 'Er zijn % reacties'); ?>
    
                                </span>
    
                            </div>
    
                        </article>
    
                    <?php endwhile; ?>
                    
                    <?php if (!is_single() && !is_page()) { ?>
    
                        <?php
                            $temp = $wp_query;
                            $wp_query = null;
                            $wp_query = new WP_Query();
        
                            $show_posts = 10;  //How many post you want on a page
                            $permalink = 'Post name'; // Default, Post name
                            $req_uri =  $_SERVER['REQUEST_URI']; // Know the current URI
        
                            // Permalink set to default
                            if ($permalink == 'Default') {
                            
                                $req_uri = explode('paged=', $req_uri);
        
                                if ($_GET['paged']) {
                                    $uri = $req_uri[0] . 'paged=';
                                } else {
                                    $uri = $req_uri[0] . '&paged=';
                                }
                                
                            // Permalink is set to Post name
                            } elseif ($permalink == 'Post name') {
                            
                                if (strpos($req_uri, 'page/') !== false) {
                                    $req_uri = explode('page/', $req_uri);
                                    $req_uri = $req_uri[0];
                                }
                                $uri = $req_uri . 'page/';
                                
                            }
        
                            // The query
                            $wp_query->query('showposts=' . $show_posts . '&post_type=post&paged=' . $paged);
                            $count_posts = wp_count_posts('post');
        
                            // Determine number of posts
                            $count_post = round($count_posts->publish / $show_posts);
                            
                            if ($count_posts->publish % $show_posts == 1) {
                            
                                $count_post++;
                                $count_post = intval($count_post);
                                
                            }
        
                            // The navigation
                            if ($count_post > 1) {
                        ?>
                        
                        <ul class="paging">
                        
                            <li class="paging-navigation paging-next">
                                <?php previous_posts_link('Vorige'); ?>
                            </li>
                            
                            <li class="paging-navigation paging-left">
                                <?php next_posts_link('Volgende'); ?>
                            </li>
                            
                            <?php for ($i = 1; $i <= $count_post; $i++) { ?>
                            
                                <li class="page-number <?php if ($paged == $i) { echo ' active-page'; } ?>">
                                    <a href="<?php echo $uri . $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                                
                            <?php } ?>
                            
                        </ul>
                        
                        <?php }
                            // Reset
                            $wp_query = null;
                            $wp_query = $temp;
                        ?>
    
                    <?php } ?>
            
                <?php endif; ?>
                
            </div> <!-- .main-content -->
    
            <aside class="sidebar col col-3">
    
                <?php if ( !function_exists('dynamic_sidebar')
                    || !dynamic_sidebar('Widget') ) : ?>
                <?php endif; ?>
    
            </aside> <!-- .sidebar -->
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>