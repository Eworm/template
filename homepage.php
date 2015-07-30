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

            <main class="main-content col col-6" role="main">
    
                <?php if (have_posts()) : ?>
    
                    <?php while (have_posts()) : the_post(); ?>
                
                        <h1 class="main-content-title">
                            <?php the_title(); ?>
                        </h1>
                        
                        <div class="main-content-body">
                            
                            <?php the_content('Weiterlesen &raquo;'); ?>
                            
                        </div>
                                                    
                    <?php endwhile; ?>
    
                <?php endif; ?>
    
            </main> <!-- .main-content -->
            
            <aside class="sidebar col col-2" role="complementary">
                
                
                
            </aside>
            
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>
