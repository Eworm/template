<?php get_header(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <div class="col col-5">
    
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
        
                    <article class="main-content single-post blogpost">
        
                        <header class="post-header single-post-header">
    
                            <h1 class="post-title maincontent-title single-post-title">
                                <?php the_title(); ?>
                            </h1>
    
                        </header>
                        
                        <div class="post-entry">
                            <?php the_content('Lees meer &raquo;'); ?>
                        </div>
                        
                        <p class="post-date">
                            <?php the_time('j F Y') ?> &mdash; <?php the_time('g:ia') ?> <?php edit_post_link('Artikel aanpassen','<strong> |</strong> ',''); ?>
                            <br>
                            <?php /* pages don't have categories or tags */ if (!is_page()) : ?>
                                <?php _e( 'Categorie&euml;n', 'thema_vertalingen' ); ?>: <?php the_category(', '); ?>.
                                <br>
                                <?php if (get_the_tags()) the_tags('Tags: ', ', ', '.'); ?>
                            <?php endif; ?>
                        </p>
                        
                    </article> <!-- .main-content -->
                    
                    <a id="l-toggle-comments" href="#l-comments-core">
                        <?php
                            $comments_count = get_comments_number( $post_id );
                            
                            if ($comments_count >= 1) :
                            
                                _e( 'Alle reacties tonen', 'thema_vertalingen' );
                                echo ' (';
                                echo $comments_count;
                                echo ')';
                            
                            else :
                                _e( 'Er zijn nog geen reacties', 'thema_vertalingen' );
                            
                            endif;
                        ?>
                    </a>
                    
                    <div id="l-comments-core">
                        <?php comments_template(); ?>
                    </div>
        
                <?php endwhile; ?>
                <?php else : ?>
                    
                    <article class="main-content blogpost single-post no-results not-found">
    
                        <header class="post-header maincontent-header single-post-header">
                            
                            <h1 class="post-title maincontent-title single-post-title">
                                <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>
                            </h1>
    
                        </header>
        
                        <div class="post-entry">
                            <p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
    
                    </article> <!-- .main-content -->
                    
                <?php endif; ?>
            
            </div>
            
            <aside class="sidebar col col-3">

                <?php if ( !function_exists('dynamic_sidebar')
                    || !dynamic_sidebar('Widget') ) : ?>
                <?php endif; ?>
    
            </aside> <!-- .sidebar -->
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>