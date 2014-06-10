<?php get_header(); ?>

<div id="content" class="content wrapper wrapper-content">

    <div class="holder holder-content">

        <!-- <img src="<?php header_image(); ?>"> -->

        <article class="maincontent col col-5">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>
                
                    <header class="maincontent-header">
                        
                        <h1 class="maincontent-title">
                            <?php the_title(); ?>
                        </h1>
                        
                    </header>
                    
                    <div class="maincontent-body">
                        <?php the_content('Weiterlesen &raquo;'); ?>
                    </div>
                    
                <?php endwhile; ?>

            <?php endif; ?>

        </article> <!-- .maincontent -->

    </div> <!-- .holder -->

</div> <!-- #content -->

<?php get_footer(); ?>