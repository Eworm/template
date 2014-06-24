<?php
/*
Template Name: Contactformulier
*/
?>
<?php

$emailSent = false;

// If the form is submitted
if (isset($_POST['submitted'])) :

    // Check to see if the honeypot captcha field was filled in
    if (trim($_POST['checking']) !== '') :
        $captchaError = true;
    else :

        //Check to make sure that the name field is not empty
        if (trim($_POST['naam']) === '') :
        
            $nameError = __( 'U bent vergeten uw naam in te vullen', 'thema_vertalingen' );
            $hasError = true;
        
        else :
        
            $name = trim($_POST['naam']);
        
        endif;

        // Check to make sure sure that a valid email address is submitted
        if (trim($_POST['emailadres']) === '') :
        
            $emailError = __( 'U bent vergeten uw e-mailadres in te vullen', 'thema_vertalingen' );
            $hasError = true;
        
        elseif (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['emailadres']))) :
        
            $emailError = __( 'U heeft een ongeldig e-mailadres ingevuld', 'thema_vertalingen' );
            $hasError = true;
        
        else :
        
            $email = trim($_POST['emailadres']);
        
        endif;

        // Check to make sure that the message field is not empty
        if (trim($_POST['message']) === '') :

            $messageError = __( 'U bent vergeten een bericht in te vullen', 'thema_vertalingen' );
            $hasError = true;

        else :

            $message = trim($_POST['message']);

        endif;


        // If there is no error, send the email
        if (!isset($hasError)) :

            require("class.phpmailer.php");
            $mail = new PHPMailer();
            
            // Add mails to the database
            $row = array(   'from' => $name,
                            'email' => $email,
                            'message' => $message
            );
			
			$wpdb->insert('maillog', $row);

            // Info for the actual email
            $mail->From         = $email;
            $mail->FromName     = $name;
            $mail->AddAddress("wout@woutmager.nl");

            $mail->IsHTML(false);    // set email format to HTML
            $mail->Subject      = "Contactformulier verstuurd door " . $name;
            $mail->Body         = "Naam: $name \n\nEmail: $email \n\nBericht: $message";

            // error_reporting(E_ALL);
            
            if (!$mail->Send()) :
            
                // echo "Mailer Error: " . $mail->ErrorInfo;
            
            else :
            
                // echo "Message sent!";
                $emailSent = true;
            
            endif;

        endif;
        
    endif;
    
endif;

?>

<?php get_header(); ?>

<?php if ($emailSent == true) : ?>
    
    <!-- Thanks page -->

    <div id="content" class="content divider divider-content">
    
        <div class="core core-content">
        
            <div class="row">
    
                <div class="main-content col col-5">
        
                    <header class="main-content-header">
                        <h1 class="main-content-title"><?php _e( 'Bedankt voor uw e-mail', 'thema_vertalingen' ); ?>, <?=$name;?></h1>
                    </header>
        
                    <p><?php _e( 'Uw e-mail is verstuurd. Ik neem zo snel mogelijk contact met u op.', 'thema_vertalingen' ); ?></p>
        
                    <p><a href="<?php echo get_settings('home'); ?>"><?php _e( 'Terug naar de homepage', 'thema_vertalingen' ); ?></a></p>
        
                </div> <!-- .main-content -->
                
            </div> <!-- .row -->
    
        </div> <!-- .core -->
    
    </div> <!-- .divider -->

<?php else : ?>

    <!-- The contact form -->

    <div id="content" class="content divider divider-content">
    
        <div class="core core-content">
        
            <div class="row">
    
                <div class="main-content col col-5">
        
                    <form action="#contactform" id="contactform" method="post" class="form" data-parsley-validate>
        
                        <header class="formheader">
                            <h1><?php the_title(); ?></h1>
                        </header>
        
                        <fieldset class="formcontainer">
                        
        
                            <div class="formrow">
                            
                                <label for="naam">
                                    <?php _e( 'Uw naam', 'thema_vertalingen' ); ?> <span class="req"><?php _e( '(Verplicht)', 'thema_vertalingen' ); ?></span>
                                </label>
                                <input value="<?php if (isset($_POST['naam'])) echo $_POST['naam'];?>" type="text" name="naam" id="naam" data-parsley-error-message="<?php _e( 'U bent vergeten uw naam in te vullen', 'thema_vertalingen' ); ?>" required>
                                
                                <?php if ($nameError != '') : ?>
                                    <div class="error">
                                        <?=$nameError;?>
                                    </div>
                                <?php endif; ?>
    
                            </div> <!-- .formrow -->
                            
        
                            <div class="formrow">
                            
                                <label for="emailadres">
                                    <?php _e( 'Uw e-mailadres', 'thema_vertalingen' ); ?> <span class="req"><?php _e( '(Verplicht)', 'thema_vertalingen' ); ?></span>
                                </label>
                                <input value="<?php if (isset($_POST['emailadres'])) echo $_POST['emailadres'];?>" type="email" name="emailadres" id="emailadres" data-parsley-trigger="change" data-parsley-required-message="<?php _e( 'U bent vergeten uw e-mailadres in te vullen', 'thema_vertalingen' ); ?>" data-parsley-error-message="<?php _e( 'U heeft een ongeldig e-mailadres ingevuld', 'thema_vertalingen' ); ?>" required>
    
                                <?php if ($emailError != '') : ?>
                                    <div class="error">
                                        <?=$emailError;?>
                                    </div>
                                <?php endif; ?>
    
                            </div> <!-- .formrow -->
                            
        
                            <div class="formrow">
                            
                                <label for="message">
                                    <?php _e( 'Omschrijf kort uw vraag', 'thema_vertalingen' ); ?> <span class="req"><?php _e( '(Verplicht)', 'thema_vertalingen' ); ?></span>
                                </label>
                                <textarea id="message" name="message" class="textarea" data-parsley-error-message="<?php _e( 'U bent vergeten een bericht in te vullen', 'thema_vertalingen' ); ?>" required></textarea>
    
                                <?php if ($messageError != '') : ?>
                                    <div class="error">
                                        <?=$messageError;?>
                                    </div>
                                <?php endif; ?>
    
                            </div> <!-- .formrow -->
                            
        
                            <div id="screenreader" class="formrow">
                            
                                <label for="checking">
                                    <?php _e( 'Als u dit formulier wilt versturen moet u dit invoerveld leeg laten', 'thema_vertalingen' ); ?>
                                </label>                                
                                <input type="text" name="checking" id="checking" value="<?php if (isset($_POST['checking'])) echo $_POST['checking'];?>">
                            
                            </div>
        
                            <div class="formrow">
                            
                                <input type="hidden" name="submitted" id="submitted" value="true">
                                <input type="hidden" name="about" value="<?php the_title(); ?>">
                                <input type="submit" value="<?php _e( 'Verzenden', 'thema_vertalingen' ); ?>" class="submit">
                            
                            </div>
        
                        </fieldset>
        
                    </form>
        
                </div> <!-- .main-content -->
        
                <aside class="sidebar col col-3">
        
                    <?php $options = get_option('template_theme_options');
                        if (($options['theme_address'])) : ?>
        
                        <section class="no-padding mob-hide">
                        
                            <script>
                                var company_address = [{location:"<?php echo $options["theme_address"]; ?>"}];
                            </script>
                        
                            <div id="map_address" style="width:100%; height:250px;"></div>
                        
                        </section>
        
                    <?php endif; ?>
        
                </aside> <!-- .sidebar -->
            
            </div> <!-- .row -->
    
        </div> <!-- .core -->
    
    </div> <!-- .divider -->

<?php endif; ?>

<?php get_footer(); ?>