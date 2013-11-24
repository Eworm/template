<?php get_header(); ?>

<div id="content" class="wrapper wrapper-content">
    <div class="holder holder-content">
        <!-- <img src="<?php header_image(); ?>"> -->
        <article id="maincontent" class="grid-column grid-column-5">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                
                    <header class="maincontent-header">
                        <h1 class="maincontent-title"><?php the_title(); ?></h1>
                    </header>
                    
                    <?php the_content('Weiterlesen &raquo;'); ?>
                    
                <?php endwhile; ?>
            <?php endif; ?>
        </article>
    </div>
</div>

<?php get_footer(); ?>