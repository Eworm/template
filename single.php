<?php get_header(); ?>

<div id="content" class="wrapper">
    <div class="holder">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <article class="column column-5">

                <header>
                    <h1><?php the_title(); ?></h1>
                </header>
                
                <div class="entry">
                    <?php the_content('Lees meer &raquo;'); ?>
                </div>
                
                <p class="postdate">
                    <?php the_time('j F Y')?>. <?php edit_post_link('Dit artikel aanpassen.', '', ''); ?>
                    <br>
                    <?php /* pages don't have categories or tags */ if (!is_page()) { ?> <?php _e( 'Categorie&euml;n', 'thema_vertalingen' ); ?>: <?php the_category(', '); ?>. <?php /* } */?>
				    <br>
				    <?php if (get_the_tags()) the_tags('Tags: ', ', ', '.'); ?><?php } ?>
                </p>
                
                <a id="toggle-comments" href="#comments-holder">
                    <?php
                        $comments_count = get_comments_number( $post_id );
                        if ($comments_count >= 1) {
                            _e( 'Alle reacties tonen', 'thema_vertalingen' );
                            echo ' (';
                            echo $comments_count;
                            echo ')';
                        } else {
                            _e( 'Er zijn nog geen reacties', 'thema_vertalingen' );
                        }
                    ?>
                </a>
                
                <div id="comments-holder">
                    <?php comments_template(); ?>
                </div>
                
            </article>

        <?php endwhile; ?>
        <?php else : ?>
            
            <article id="post-0" class="post no-results not-found">
				<header>
					<h1 class="entry-title"><?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?></h1>
				</header>

				<div class="entry">
					<p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</article>
			
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>