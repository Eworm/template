<?php get_header(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">

        <div class="main-content col col-5">

            <?php if (have_posts()) : ?>

                <?php /* Start the Loop */ ?>              
                <?php while (have_posts()) : the_post(); ?>

                    <article class="blogpost">

                        <header class="blogpost-header">
                        
                            <h1 class="blogpost-title">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?><?php the_title_attribute(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h1>
                            
                            <p class="blogpost-date">
                                <?php the_time('j F Y') ?> &mdash; <?php the_time('g:ia') ?> <?php edit_post_link('Artikel aanpassen','<strong> |</strong> ',''); ?>
                                <br>
                                <?php /* pages don't have categories or tags */ if (!is_page()) : ?>
                                    <?php _e( 'Categorie&euml;n', 'thema_vertalingen' ); ?>: <?php the_category(', '); ?>.
                                    <br>
                                    <?php if (get_the_tags()) the_tags('Tags: ', ', ', '.'); ?>
                                <?php endif; ?>
                            </p>

                        </header>

                        <div class="blogpost-entry">

                            <?php the_excerpt(); ?>

                            <span class="blogpost-options">

                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?>
                                    <?php the_title_attribute(); ?>"><?php _e( 'Verder lezen', 'thema_vertalingen' ); ?>
                                </a>&nbsp;|&nbsp;
                                
                                <?php comments_popup_link('Reageer als eerste', 'Er is 1 reactie', 'Er zijn % reacties'); ?>

                            </span>

                        </div>

                    </article>

                <?php endwhile; ?>
                
                <?php if (!is_single() && !is_page()) { ?>

                    <ul class="blogpost-navigation">
                        
                        <li class="goforward">
                            <?php previous_posts_link('&laquo; Nieuwere posts'); ?>
                        </li>
                        
                        <li class="goback">
                            <?php next_posts_link('Oudere posts &raquo;'); ?>
                        </li>

                    </ul>

                <?php } ?>
        
            <?php endif; ?>
            
        </div> <!-- .main-content -->

        <aside class="sidebar col col-3">

            <?php if ( !function_exists('dynamic_sidebar')
                || !dynamic_sidebar('Blog') ) : ?>
            <?php endif; ?>

        </aside> <!-- .sidebar -->

    </div> <!-- .core -->

</div> <!-- #content -->

<?php get_footer(); ?>