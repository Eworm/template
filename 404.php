<?php get_header(); ?>

<div class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <main class="page-content col col-5 not-found" role="main">
    
                <h1 class="page-content__title">
                    
                    <?php _e( 'Deze pagina bestaat niet (meer)', 'thema_vertalingen' ); ?>
                    
                </h1>
                
                <div class="page-content__body">
    
                    <p>
                        
                        <?php _e( 'Misschien helpt het als je een kijkje op onze', 'thema_vertalingen' ); ?> <a href="<?php echo get_settings('home'); ?>"><?php _e( 'homepage', 'thema_vertalingen' ); ?></a> <?php _e( 'neemt? Of probeer anders te zoeken', 'thema_vertalingen' ); ?>:
                        
                    </p>
    
                    <?php get_search_form(); ?>
                    
                </div>
    
            </main> <!-- .page-content -->
        
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>
