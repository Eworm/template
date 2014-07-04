<?php get_header(); ?>

<main id="content" class="content divider divider-content" role="main">

    <div class="core core-content">
    
        <div class="row">

            <div class="col col-5">
    
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
        
                    <article <?php post_class('main-content single-post'); ?>>
        
                        <header class="post-header single-post-header">
    
                            <h1 class="post-title maincontent-title single-post-title">
                                <?php the_title(); ?>
                            </h1>
    
                        </header>
                        
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
                        
                    </article> <!-- .main-content -->
                    
                    <?php comments_template(); ?>
        
                <?php endwhile; ?>
                <?php else : ?>
                    
                    <article <?php post_class('main-content single-post no-results not-found'); ?>>
    
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

</main> <!-- .divider -->

<?php get_footer(); ?>