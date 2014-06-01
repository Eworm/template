<?php get_header(); ?>

<div id="content" class="wrapper wrapper-content">

    <div class="holder holder-content">

        <div class="maincontent grid-column grid-column-5">

            <?php if (have_posts()) : ?>
    		  
    			<?php while (have_posts()) : the_post(); ?>

                    <article class="l-post">

            			<header class="l-post-header">
                            <h1 class="l-post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <p class="l-postdate">
                                <?php the_time('j F Y') ?> &mdash; <?php the_time('g:ia') ?> <?php edit_post_link('Artikel aanpassen','<strong> |</strong> ',''); ?>
                                <br>
                                <?php /* pages don't have categories or tags */ if (!is_page()) { ?> Categorie&euml;n: <?php the_category(', '); ?>. <?php /* } */?>
            				    <br>
            				    <?php if (get_the_tags()) the_tags('Tags: ', ', ', '.'); ?><?php } ?>
                            </p>
                        </header>

                        <div class="l-post-entry">
            				<?php the_excerpt(); ?>
            				<span class="l-post-options">
                				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>"><?php _e( 'Verder lezen', 'thema_vertalingen' ); ?></a>&nbsp;|&nbsp;
                				<?php comments_popup_link('Reageer als eerste', 'Er is 1 reactie', 'Er zijn % reacties'); ?>
                            </span>
                        </div>

                    </article>

    			<?php endwhile; ?>
    			
    			<?php if (!is_single() && !is_page()) { ?>

        			<ul class="l-post-navigation">
                        <li class="goforward"><?php previous_posts_link('&laquo; Nieuwere posts'); ?></li>
        				<li class="goback"><?php next_posts_link('Oudere posts &raquo;'); ?></li>						
        			</ul>

        		<?php } ?>
		
    		<?php endif; ?>
    		
        </div> <!-- #maincontent -->

        <aside class="sidebar grid-column grid-column-3 no-margin">

            <?php if ( !function_exists('dynamic_sidebar')
                || !dynamic_sidebar('Blog') ) : ?>
            <?php endif; ?>

        </aside> <!-- #sidebar -->

    </div> <!-- #holder-content -->

</div> <!-- #wrapper-content -->

<?php get_footer(); ?>