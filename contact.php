<?php
/*
Template Name: Contactformulier
*/
?>
<?php


// The default sent variable
$emailSent = false;


// If the form is submitted
if (isset($_POST['submitted'])) :

    // Check to see if the honeypot captcha field was filled in
    if (trim($_POST['checking']) !== '') :
        $captchaError = true;
    else :


        //Check to make sure that the name field is not empty
        if (trim($_POST['naam']) === '') :
        
            $nameError = __( $nameError_message, 'thema_vertalingen' );
            $hasError = true;
        
        else :
        
            $name = trim($_POST['naam']);
        
        endif;


        // Check to make sure sure that a valid email address is submitted
        if (trim($_POST['emailadres']) === '') :
        
            $emailError = __( $emailRequired_message, 'thema_vertalingen' );
            $hasError = true;
        
        elseif (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['emailadres']))) :
        
            $emailError = __( $emailError_message, 'thema_vertalingen' );
            $hasError = true;
        
        else :
        
            $email = trim($_POST['emailadres']);
        
        endif;


        // Check to make sure that the message field is not empty
        if (trim($_POST['message']) === '') :

            $messageError = __( $messageError_message, 'thema_vertalingen' );
            $hasError = true;

        else :

            $message = trim($_POST['message']);

        endif;


        // If there is no error, send the email
        if (!isset($hasError)) :

            require("class.phpmailer.php");
            $mail = new PHPMailer();
            
            // Add mail to the database
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

    <div class="content divider divider-content">
    
        <div class="core core-content">
        
            <div class="row">
    
                <main class="main-content col col-5" role="main">
        
                    <h1 class="main-content-title">
                        <?php _e( 'Bedankt voor Je e-mail', 'thema_vertalingen' ); ?>, <?=$name;?>
                    </h1>
        
                    <p>
                        <?php _e( 'Je e-mail is verstuurd. Ik neem zo snel mogelijk contact met u op.', 'thema_vertalingen' ); ?>
                    </p>
        
                    <p>
                        <a href="<?php echo get_settings('home'); ?>">
                            <?php _e( 'Terug naar de homepage', 'thema_vertalingen' ); ?>
                        </a>
                    </p>
        
                </main> <!-- .main-content -->
                
            </div> <!-- .row -->
    
        </div> <!-- .core -->
    
    </div> <!-- .divider -->

<?php else : ?>

    <!-- The contact form -->

    <div class="content divider divider-content">
    
        <div class="core core-content">
        
            <div class="row">
    
                <main class="main-content col col-5" role="main">
        
                    <form action="#contactform" id="contactform" method="post" class="form" data-parsley-validate>
        
                        <h1>
                            <?php the_title(); ?>
                        </h1>
        
                        <fieldset class="formcontainer">
                                
                            <div class="formrow">
                            
                                <label for="naam">
                                    <?php _e( 'Je naam', 'thema_vertalingen' ); ?> <span class="req"><?php _e( '(Verplicht)', 'thema_vertalingen' ); ?></span>
                                </label>
                                <input value="<?php if (isset($_POST['naam'])) echo $_POST['naam'];?>" type="text" name="naam" id="naam" data-parsley-error-message="<?php _e( $nameError_message, 'thema_vertalingen' ); ?>" required>
                                
                                <?php if ($nameError != '') : ?>
                                    <div class="error">
                                        <?=$nameError;?>
                                    </div>
                                <?php endif; ?>
    
                            </div> <!-- .formrow -->
        
                            <div class="formrow">
                            
                                <label for="emailadres">
                                    <?php _e( 'Je e-mailadres', 'thema_vertalingen' ); ?> <span class="req"><?php _e( '(Verplicht)', 'thema_vertalingen' ); ?></span>
                                </label>
                                <input value="<?php if (isset($_POST['emailadres'])) echo $_POST['emailadres'];?>" type="email" name="emailadres" id="emailadres" data-parsley-trigger="change" data-parsley-required-message="<?php _e( $emailError_message, 'thema_vertalingen' ); ?>" data-parsley-error-message="<?php _e( $emailError_message, 'thema_vertalingen' ); ?>" required>
                                <small class="input-exp"><?php _e( 'We gebruiken Je e-mailadres om contact met u op te kunnen nemen', 'thema_vertalingen' ); ?></small>
    
                                <?php if ($emailError != '') : ?>
                                    <div class="error">
                                        <?=$emailError;?>
                                    </div>
                                <?php endif; ?>
    
                            </div> <!-- .formrow -->
                            
                            <div class="formrow">
                            
                                <label for="message">
                                    <?php _e( 'Omschrijf kort Je vraag', 'thema_vertalingen' ); ?> <span class="req"><?php _e( '(Verplicht)', 'thema_vertalingen' ); ?></span>
                                </label>
                                <textarea id="message" name="message" class="textarea" data-parsley-error-message="<?php _e( $messageError_message, 'thema_vertalingen' ); ?>" required></textarea>
    
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
                            
                            </div> <!-- .formrow -->
                            
                            <div class="formrow">
                            
                                <input type="hidden" name="submitted" id="submitted" value="true">
                                <input type="hidden" name="about" value="<?php the_title(); ?>">
                                <input type="submit" value="<?php _e( 'Verzenden', 'thema_vertalingen' ); ?>" class="submit">
                            
                            </div> <!-- .formrow -->
        
                        </fieldset>
        
                    </form>
        
                </main> <!-- .main-content -->
        
                <aside class="sidebar col col-3" role="complementary">
        
                    <?php $options = get_option('template_theme_options');
                        if (($options['theme_address'])) : ?>
        
                        <section class="no-padding mob-hide">
                        
                            <script>
                                var company_address = [{location:"<?php echo $options["theme_address"]; ?>"}];
                            </script>
                        
                            <div id="js-map_address" style="width:100%; height:250px;"></div>
                        
                        </section>
        
                    <?php endif; ?>
        
                </aside> <!-- .sidebar -->
            
            </div> <!-- .row -->
    
        </div> <!-- .core -->
    
    </div> <!-- .divider -->

<?php endif; ?>

<?php get_footer(); ?>
