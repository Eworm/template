<?php get_header(); ?>

<div class="content divider divider--content">

    <div class="core core--content">

        <?php the_breadcrumb(); ?>

        <div class="row">

            <?php if (!$post->post_parent) :

                    // will display the subpages of this top level page
                    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

                else :
                    // diplays only the subpages of parent level
                    // $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");

                    if ($post->ancestors) :

                        // now you can get the the top ID of this page
                        // wp is putting the ids DESC, thats why the top level ID is the last one
                        $ancestors = end($post->ancestors);
                        $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
                        // you will always get the whole subpages list

                    endif;

                endif;

                if ($children) : ?>

                    <div class="pagemenu col col--2">

                        <ul>
                            <?php echo $children; ?>
                        </ul>

                    </div>

                <?php endif; ?>

            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <main class="page-content col col--6" role="main">

                    <h1 class="page-content__title">

                        <?php the_title(); ?>

                    </h1>

                    <div class="page-content__body">

                        <?php the_content('Lees meer &raquo;'); ?>

                    </div>

                </main>

            <?php endwhile; ?>

            <?php else : ?>

                <main class="page-content col col--6 no-results not-found" role="main">

                    <h1 class="page-content__title">

                        <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>

                    </h1>

                    <div class="page-content__body">

                        <p>

                            <?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?>

                        </p>

                        <?php get_search_form(); ?>

                    </div>

                </main>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php get_footer(); ?>
