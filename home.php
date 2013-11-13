<?php get_header(); ?>

<div id="content" class="wrapper">
    <div class="holder">
        <!-- <img src="<?php header_image(); ?>"> -->
        <article class="column column-5">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                
                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header>
                    
                    <?php the_content('Weiterlesen &raquo;'); ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>
        </article>
    </div>
</div>

<?php get_footer(); ?>