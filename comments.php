<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<div class="comments-area">

    <?php if ( have_comments() ) : ?>
    
        <h2 class="comments-area__title">
            
            <?php
                printf( _nx( 'E&eacute;n reactie op &ldquo;%2$s&rdquo;', '%1$s reacties op &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'thema_vertalingen' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
            
        </h2>

        <ol class="comments-area__list">
            
            <?php
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                ) );
            ?>
            
        </ol> <!-- .comments-area__list -->

        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        
        <div class="navigation comments-area__navigation">
        
            <h1 class="screen-reader-text section-heading">
                
                <?php _e( 'Navigatie', 'thema_vertalingen' ); ?>
                
            </h1>
            
            <div class="comments-area__navigation__prev">
                
                <?php previous_comments_link( __( 'Oudere reacties', 'thema_vertalingen' ) ); ?>
                
            </div>
            
            <div class="comments-area__navigation__next">
                
                <?php next_comments_link( __( 'Nieuwere reacties', 'thema_vertalingen' ) ); ?>
                
            </div>
            
        </div> <!-- .comments-area__navigation -->
        
        <?php endif; // Check for comment navigation ?>

        <?php if ( ! comments_open() && get_comments_number() ) : ?>
        
            <p class="no-comments">
                
                <?php _e( 'Het reageren is gesloten.' , 'thema_vertalingen' ); ?>
                
            </p>
        
        <?php endif; ?>

    <?php endif; // have_comments() ?>

    <?php $comment_args = array( 'title_reply'=>'Geef een reactie',
        'fields' => apply_filters( 'comment_form_default_fields', array(                
                'author' => '<div class="form__row comment-form-author">' . '<label for="author">' . __( 'Je naam <span class="req">(verplicht)</span>', 'thema_vertalingen' ) . '</label> '.
                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' required data-parsley-error-message="' . __( 'Je hebt geen naam ingevuld', 'thema_vertalingen' ) . '"></div>',
                
                'email'  => '<div class="form__row comment-form-email">' .
                '<label for="email">' . __( 'Je e-mailadres  <span class="req">(verplicht, wordt niet gepubliceerd)</span>', 'thema_vertalingen' ) . '</label> ' .
                '<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . '  required data-parsley-trigger="change" data-parsley-required-message="' . __( 'Je hebt geen e-mailadres ingevuld', 'thema_vertalingen' ) . '" data-parsley-error-message="' . __( 'Dit is een ongeldig e-mailadres', 'thema_vertalingen' ) . '">'.'</div>',
                
                'url' => '<div class="form__row comment-form-url">' . '<label for="url">' . __( 'Je website', 'thema_vertalingen' ) . '</label> '.
                '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' ></div>',
            )),
            'comment_notes_before' => '',
            'comment_field' => '<div class="form__row">' .
            '<label for="comment">' . __( 'Je reactie <span class="req">(verplicht)</span>', 'thema_vertalingen' ) . '</label>' .
            '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required data-parsley-error-message="' . __( 'Je hebt geen reactie ingevuld', 'thema_vertalingen' ) . '"></textarea>' .
            '</div>',
            'comment_notes_after' => '',
        );
        comment_form($comment_args);
    ?>

</div> <!-- #comments -->
