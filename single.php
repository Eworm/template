<?php get_header(); ?>

<div id="content" class="wrapper wrapper-content">
    <div class="holder holder-content">
        <div class="grid-column grid-column-5">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
    
                <article id="maincontent" class="single-post">
    
                    <header class="maincontent-header single-post-header">
                        <h1 class="maincontent-title single-post-title"><?php the_title(); ?></h1>
                    </header>
                    
                    <div class="maincontent-body">
                        <?php the_content('Lees meer &raquo;'); ?>
                    </div>
                    
                    <p class="postdate">
                        <?php the_time('j F Y')?>. <?php edit_post_link('Dit artikel aanpassen.', '', ''); ?>
                        <br>
                        <?php /* pages don't have categories or tags */ if (!is_page()) { ?> <?php _e( 'Categorie&euml;n', 'thema_vertalingen' ); ?>: <?php the_category(', '); ?>. <?php /* } */?>
    				    <br>
    				    <?php if (get_the_tags()) the_tags('Tags: ', ', ', '.'); ?><?php } ?>
                    </p>
                    
                </article>
                
                <a id="l-toggle-comments" href="#l-comments-holder">
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
                
                <div id="l-comments-holder">
                    <?php comments_template(); ?>
                </div>
    
            <?php endwhile; ?>
            <?php else : ?>
                
                <article class="single-post no-results not-found">
    				<header class="maincontent-header single-post-header">
    					<h1 class="maincontent-title single-post-title"><?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?></h1>
    				</header>
    
    				<div class="entry">
    					<p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>
    					<?php get_search_form(); ?>
    				</div>
    			</article>
    			
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>