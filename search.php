<?php get_header(); ?>

<?php $search_query = get_search_query(); ?>

<div id="content" class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <div class="main-content col col-8 no-margin">
            
                <?php if (have_posts()) : ?>
                
                    <header class="main-content-header">
                        
                        <h1>
                            <?php _e( 'Zoekresultaten voor', 'thema_vertalingen' ); ?> <em>&#8216;<?php echo $search_query ?>&#8217;</em>
                        </h1>
    
                    </header>
                
                    <?php while (have_posts()) : the_post(); ?>
                
                        <section class="search-result">
                        
                            <header class="search-result-header">
    
                                <h1 class="search-result-title">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanente link naar', 'thema_vertalingen' ); ?><?php the_title(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h1>
    
                            </header>
                        
                            <?php the_excerpt('Continue reading &raquo;'); ?>
                        
                            <span class="post-options">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>">
                                    <?php _e( 'Verder lezen', 'thema_vertalingen' ); ?>
                                </a>
                            </span>
                
                        </section>
                    <?php endwhile; ?>
                        
                        <ul class="blogpost-navigation">
                            
                            <li class="goforward">
                                <?php previous_posts_link('&laquo; Nieuwere posts'); ?>
                            </li>
                            
                            <li class="goback">
                                <?php next_posts_link('Oudere posts &raquo;'); ?>
                            </li>
    
                        </ul>
                    
                    <?php else : ?>
                    
                    <section class="search-result">
              
                        <header class="search-result-header">
    
                            <h1 class="search-result-title">
                                <?php _e( 'Helaas..', 'thema_vertalingen' ); ?>
                            </h1>
    
                        </header>
                        
                        <p><?php _e( 'We hebben niks gevonden dat lijkt op', 'thema_vertalingen' ); ?> <em>&#8216;<?php echo $search_query ?>&#8217;</em>. <?php _e( 'Misschien helpt overnieuw zoeken?', 'thema_vertalingen' ); ?></p>
                    
                    </section>
              
                <?php endif; ?>
                
            </div> <!-- .main-content -->
            
        </div> <!-- .row -->
        
    </div> <!-- .core -->
    
</div> <!-- .divider -->

<?php get_footer(); ?>