<article <?php post_class('post'); ?>>

    <h1 class="post__header">

        <a href="<?php the_permalink() ?>" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?><?php the_title_attribute(); ?>">

            <?php the_title(); ?>

        </a>

    </h1>

    <div class="post__meta">

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

    <div class="post__entry">

        <?php the_excerpt(); ?>

        <span class="post__options">

            <!-- <?php comments_popup_link('Reageer als eerste', 'Er is 1 reactie', 'Er zijn % reacties'); ?> -->

        </span>

    </div>

</article>
