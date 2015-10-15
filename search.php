<?php get_header(); ?>

<?php $search_query = get_search_query(); ?>

<div class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <main class="main-content col col-5" role="main">
            
                <?php if (have_posts()) : ?>
                
                    <h1 class="main-content-title">
                        <?php _e( 'Zoekresultaten voor', 'thema_vertalingen' ); ?> <em>&#8216;<?php echo $search_query ?>&#8217;</em>
                    </h1>
                
                    <?php while (have_posts()) : the_post(); ?>
                
                        <!-- This function uses post.php -->
                        <?php get_template_part( 'includes/post', '' ); ?>
                        
                    <?php endwhile; ?>
                        
                        <ul class="post-navigation">
                            
                            <li class="goforward">
                                <?php previous_posts_link('&laquo; Nieuwere artikelen'); ?>
                            </li>
                            
                            <li class="goback">
                                <?php next_posts_link('Oudere artikelen &raquo;'); ?>
                            </li>
    
                        </ul>
                    
                    <?php else : ?>
                    
                    <section class="search-result">
              
                        <h1 class="search-result-title post-title">
                            <?php _e( 'Helaas..', 'thema_vertalingen' ); ?>
                        </h1>
                        
                        <p>
                            <?php _e( 'We hebben niks gevonden dat lijkt op', 'thema_vertalingen' ); ?> <em>&#8216;<?php echo $search_query ?>&#8217;</em>. <?php _e( 'Misschien helpt overnieuw zoeken?', 'thema_vertalingen' ); ?>
                        </p>
                    
                    </section>
              
                <?php endif; ?>
                
            </main> <!-- .main-content -->
            
        </div> <!-- .row -->
        
    </div> <!-- .core -->
    
</div> <!-- .divider -->

<?php get_footer(); ?>
