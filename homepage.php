<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div class="content divider divider-content">

    <div class="core core-content">

        <!-- <img src="<?php header_image(); ?>"> -->
        
        <div class="row">

            <main class="page-content col col-6" role="main">
    
                <?php if (have_posts()) : ?>
    
                    <?php while (have_posts()) : the_post(); ?>
                
                        <h1 class="page-title">
                            
                            <?php the_title(); ?>
                            
                        </h1>
                        
                        <div class="page-body">
                            
                            <?php the_content('Weiterlesen &raquo;'); ?>
                            
                        </div>
                                                    
                    <?php endwhile; ?>
    
                <?php endif; ?>
    
            </main> <!-- .page-content -->
            
            <aside class="sidebar col col-2" role="complementary">
                
                Aside
                
            </aside>
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>
