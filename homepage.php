<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div class="content divider divider--content">

    <div class="core core--content">

        <!-- <img src="<?php header_image(); ?>"> -->

        <div class="row">

            <main class="content col col--6" role="main">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <h1 class="content__title">

                            <?php the_title(); ?>

                        </h1>

                        <div class="content__body">

                            <?php the_content('Weiterlesen &raquo;'); ?>

                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            </main>

            <aside class="sidebar col col--2" role="complementary">

                Aside

            </aside>

        </div>

    </div>

</div>

<?php get_footer(); ?>
