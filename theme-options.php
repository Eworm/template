<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
    register_setting( 'sample_options', 'template_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
    add_theme_page( __( 'Thema opties', 'thema_vertalingen' ), __( 'Thema opties', 'thema_vertalingen' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
    global $select_options, $radio_options;

    if ( ! isset( $_REQUEST['settings-updated'] ) )
        $_REQUEST['settings-updated'] = false;

    ?>
    
    <div class="wrap">
    
        <?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Thema opties', 'thema_vertalingen' ) . "</h2>"; ?>

        <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
        
            <div class="updated fade">
                <p>
                    <strong>
                        <?php _e( 'De wijzigingen zijn opgeslagen', 'thema_vertalingen' ); ?>
                    </strong>
                </p>
            </div>
        
        <?php endif; ?>

        <form method="post" action="options.php">
        
            <?php settings_fields( 'sample_options' ); ?>
            <?php $options = get_option( 'template_theme_options' ); ?>
            
            <table class="form-table">
            
                <tr valign="top">
                    <td colspan="2">
                        <h2>
                            <?php _e( 'Algemene opties', 'thema_vertalingen' ); ?>
                        </h2>
                    </td>
                </tr>
                
                <?php
                /**
                 * Address
                 */
                ?>                
                <tr valign="top">
                    <th scope="row">
                        <?php _e( 'Bedrijfsadres', 'thema_vertalingen' ); ?>
                    </th>
                    <td>
                        <input id="template_theme_options[theme_address]" class="regular-text" type="text" name="template_theme_options[theme_address]" value="<?php esc_attr_e( $options['theme_address'] ); ?>" />
                    </td>
                </tr>
                
            </table>
            
            <table class="form-table">
            
                <tr valign="top">
                    <td colspan="2">
                        <h2>
                            <?php _e( 'SEO', 'thema_vertalingen' ); ?>
                        </h2>
                    </td>
                </tr>
                
                <?php
                /**
                 * SEO
                 */
                ?>                
                <tr valign="top">
                    <th scope="row">
                        <?php _e( 'SEO keywords', 'thema_vertalingen' ); ?>
                    </th>
                    <td>
                        <input id="template_theme_options[seo_keywords]" class="regular-text" type="text" name="template_theme_options[seo_keywords]" value="<?php esc_attr_e( $options['seo_keywords'] ); ?>" />
                    </td>
                </tr>
                
            </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e( 'Opties opslaan', 'thema_vertalingen' ); ?>" />
            </p>
            
        </form>
        
    </div>
    <?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
    global $select_options, $radio_options;
    return $input;
}


/* Add javascript for the image uploader
==================================================================================================================================*/
function my_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_register_script('my-upload', get_template_directory_uri() .'/js/my-script.js', array('jquery','media-upload','thickbox'));
    wp_enqueue_script('my-upload');
}


/* Enqueue the overlay for img the uploader
==================================================================================================================================*/
function my_admin_styles() {
    wp_enqueue_style('thickbox');
}


/* Add the javascript
==================================================================================================================================*/
require_once ( get_template_directory() . '/theme-options.php' );

if (isset($_GET['page']) && $_GET['page'] == 'theme_options') {
    add_action('admin_print_scripts', 'my_admin_scripts');
    add_action('admin_print_styles', 'my_admin_styles');
}