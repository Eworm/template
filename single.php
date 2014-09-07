<?php get_header(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <div class="col col-5">
    
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
        
                    <main <?php post_class('main-content single-post'); ?> role="main">
        
                        <h1 class="post-title maincontent-title single-post-title">
                            <?php the_title(); ?>
                        </h1>
                    
                        <div class="post-entry">
                            <?php the_content('Lees meer &raquo;'); ?>
                        </div>
                        
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
                        
                    </main> <!-- .main-content -->
                    
                    <?php comments_template(); ?>
        
                <?php endwhile; ?>
                <?php else : ?>
                    
                    <main <?php post_class('main-content single-post no-results not-found'); ?> role="main">
    
                        <h1 class="post-title maincontent-title single-post-title">
                            <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>
                        </h1>
        
                        <div class="post-entry">
                        
                            <p>
                                <?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?>
                            </p>
                        
                            <?php get_search_form(); ?>
                        
                        </div>
    
                    </main> <!-- .main-content -->
                    
                <?php endif; ?>
            
            </div>
            
            <aside class="sidebar col col-3" role="complementary">

                <?php if ( !function_exists('dynamic_sidebar')
                    || !dynamic_sidebar('Widget') ) : ?>
                <?php endif; ?>
    
            </aside> <!-- .sidebar -->
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>