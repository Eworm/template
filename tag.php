<?php get_header(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <div class="main-content col col-5">
    
                <?php if ( have_posts() ) : ?>
        
                    <header class="main-content-header">
                    
                        <h1 class="main-content-title">
                            <?php _e( 'Tag', 'thema_vertalingen' ); ?>: <?php single_cat_title() ?>
                        </h1>
                    
                    </header>
        
                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>
    
                        <article class="blogpost">
    
                            <header class="blogpost-header">
                                
                                <h1 class="blogpost-title">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h1>
                                
                                <time datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate">
                                    <?php the_time('j F Y') ?> &mdash; <?php the_time('g:ia') ?> <?php edit_post_link('Edit','<strong> |</strong> ',''); ?>
                                </time>
                                
                            </header>
                            
                            <div class="blogpost-entry">
                                
                                <?php the_excerpt(); ?>
                                
                                <span class="blogpost-options">
                                
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>">
                                        <?php _e( 'Verder lezen', 'thema_vertalingen' ); ?>
                                    </a>&nbsp;|&nbsp;
                                
                                    <?php comments_popup_link('Reageer als eerste', 'Er is 1 reactie', 'Er zijn % reacties'); ?>
                                
                                </span>
    
                            </div>
                            
                        </article>
    
                    <?php endwhile; ?>    
    
                <?php else : ?>
    
                    <article class="blogpost no-results not-found">
    
                        <header class="blogpost-header">
    
                            <h1 class="blogpost-title">
                                <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>
                            </h1>
    
                        </header>
        
                        <div class="blogpost-entry">
    
                            <p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>
    
                            <?php get_search_form(); ?>
    
                        </div>
    
                    </article>
    
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