<?php get_header(); ?>

<div class="content divider divider--content">

    <div class="core core--content">

        <div class="row">

            <main class="page-content col col--5" role="main">

                <?php if ( have_posts() ) : ?>

                    <h1 class="page-content__title">

                        <?php if ( is_day() ) : ?>

                            <?php printf( __( 'Dagarchief: %s', 'thema_vertalingen' ), '<span>' . get_the_date() . '</span>' ); ?>

                        <?php elseif ( is_month() ) : ?>

                            <?php printf( __( 'Maandarchief: %s', 'thema_vertalingen' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'thema_vertalingen' ) ) . '</span>' ); ?>

                        <?php elseif ( is_year() ) : ?>

                            <?php printf( __( 'Jaararchief: %s', 'thema_vertalingen' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'thema_vertalingen' ) ) . '</span>' ); ?>

                        <?php else : ?>

                            <?php _e( 'Blogarchief', 'thema_vertalingen' ); ?>

                        <?php endif; ?>

                    </h1>

                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <!-- Using templates/post -->
                        <?php get_template_part( 'templates/post', '' ); ?>

                    <?php endwhile; ?>

                    <ul class="post-navigation">

                        <li class="post-navigation__next">

                            <?php previous_posts_link('&laquo; Nieuwere artikelen'); ?>

                        </li>

                        <li class="post-navigation__prev">

                            <?php next_posts_link('Oudere artikelen &raquo;'); ?>

                        </li>

                    </ul>

                <?php else : ?>

                    <article <?php post_class(); ?>>

                        <h1 class="post__title">

                            <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>

                        </h1>

                        <div class="post__entry">

                            <p>

                                <?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?>

                            </p>

                            <?php get_search_form(); ?>

                        </div>

                    </article>

                <?php endif; ?>

            </main>

            <aside class="sidebar col col--3" role="complementary">

                <?php if ( !function_exists('dynamic_sidebar')
                    || !dynamic_sidebar('Widget') ) : ?>
                <?php endif; ?>

            </aside>

        </div>

    </div>

</div>

<?php get_footer(); ?>
