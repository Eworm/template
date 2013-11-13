<?php get_header(); ?>

<div id="content" class="wrapper">
    <div class="holder">
        <div class="column column-5">
            <?php if (have_posts()) : ?>
    		  
    			<?php while (have_posts()) : the_post(); ?>
                    <article class="posts blogpost">
            			<header>
                            <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <p class="postdate">
                                <?php the_time('j F Y') ?> &mdash; <?php the_time('g:ia') ?> <?php edit_post_link('Artikel aanpassen','<strong> |</strong> ',''); ?>
                                <br>
                                <?php /* pages don't have categories or tags */ if (!is_page()) { ?> Categorie&euml;n: <?php the_category(', '); ?>. <?php /* } */?>
            				    <br>
            				    <?php if (get_the_tags()) the_tags('Tags: ', ', ', '.'); ?><?php } ?>
                            </p>
                        </header>
                        <div class="entry">
            				<?php the_excerpt(); ?>
            				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>"><?php _e( 'Verder lezen', 'thema_vertalingen' ); ?> &raquo;</a>
                            <p>
                                <?php comments_popup_link('Er zijn nog geen reacties... &#187;', '1 reactie... &#187;', '% reacties... &#187;', 'comments-link', ''); ?>
                            </p>
                        </div>
                    </article>
    			<?php endwhile; ?>
    			
    			<?php if (!is_single() && !is_page()) { ?>
        			<ul class="navigation">
                        <li class="goforward"><?php previous_posts_link('&laquo; Nieuwere posts'); ?></li>
        				<li class="goback"><?php next_posts_link('Oudere posts &raquo;'); ?></li>						
        			</ul>
        		<?php } ?>
		
    		<?php endif; ?>
        </div>
        <aside class="column column-3 no-margin">
            <?php if ( !function_exists('dynamic_sidebar')
                || !dynamic_sidebar('Blog') ) : ?>
            <?php endif; ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>