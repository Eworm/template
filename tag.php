<?php get_header(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <main class="main-content col col-5" role="main">
    
                <?php if ( have_posts() ) : ?>
        
                    <h1 class="main-content-title">
                        <?php _e( 'Tag', 'thema_vertalingen' ); ?>: <?php single_cat_title() ?>
                    </h1>
        
                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>
    
                        <article <?php post_class(); ?>>
    
                            <h1 class="post-title">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h1>
                            
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
                                
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>">
                                        <?php _e( 'Verder lezen', 'thema_vertalingen' ); ?>
                                    </a>&nbsp;|&nbsp;
                                
                                    <?php comments_popup_link('Reageer als eerste', 'Er is 1 reactie', 'Er zijn % reacties'); ?>
                                
                                </span>
    
                            </div>
                            
                        </article>
    
                    <?php endwhile; ?>    
    
                <?php else : ?>
    
                    <article <?php post_class(); ?>>
    
                        <h1 class="post-title">
                            <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>
                        </h1>
        
                        <div class="post-entry">
    
                            <p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>
    
                            <?php get_search_form(); ?>
    
                        </div>
    
                    </article>
    
                <?php endif; ?>
                
            </main> <!-- .main-content -->
    
            <aside class="sidebar col col-3" role="complementary">
    
                <?php if ( !function_exists('dynamic_sidebar')
                    || !dynamic_sidebar('Widget') ) : ?>
                <?php endif; ?>
    
            </aside> <!-- .sidebar -->
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>