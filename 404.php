<?php
/*
    $message = "";
    if(isset($_SERVER['HTTP_REFERER'])):
    $message .= "Gebruiker kwam van: ".$_SERVER['HTTP_REFERER']."\r\n";
    endif;
    $message.="URL die ze zochten: ".$_SERVER['REQUEST_URI']."\r\n";
    $admin_email = get_option('admin_email');
    @wp_mail($admin_email,"404 error",$message);
    
*/
    get_header();
?>

<div id="content" class="content wrapper wrapper-content">

    <div class="holder holder-content">
    
        <div class="row">

            <article class="main-content col col-5 not-found">
    
                <header class="main-content-header">
    
                    <h1 class="main-content-title">
                        <?php _e( 'Deze pagina bestaat niet (meer)', 'thema_vertalingen' ); ?>
                    </h1>
    
                </header>
    
                <p><?php _e( 'Misschien helpt het als je een kijkje op onze', 'thema_vertalingen' ); ?> <a href="<?php echo get_settings('home'); ?>"><?php _e( 'homepage', 'thema_vertalingen' ); ?></a> <?php _e( 'neemt? Of probeer anders te zoeken', 'thema_vertalingen' ); ?>:</p>
    
                <?php get_search_form(); ?>
    
            </article> <!-- .main-content -->
        
        </div> <!-- .row -->

    </div> <!-- .holder -->

</div> <!-- #content -->

<?php get_footer(); ?>