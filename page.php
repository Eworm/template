<?php get_header(); ?>

<div class="content divider divider-content">

    <div class="core core-content">
    
        <div class="row">

            <?php if (!$post->post_parent) :
                
                    // will display the subpages of this top level page
                    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
                
                else :
                    // diplays only the subpages of parent level
                    // $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
    
                    if ($post->ancestors) :
                    
                        // now you can get the the top ID of this page
                        // wp is putting the ids DESC, thats why the top level ID is the last one
                        $ancestors = end($post->ancestors);
                        $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
                        // you will always get the whole subpages list
                    
                    endif;
                
                endif;
    
                if ($children) : ?>
    
                    <div class="page-submenu col col-2">
                    
                        <ul>
                            <?php echo $children; ?>
                        </ul>
                    
                    </div>
    
                <?php endif; ?>
    
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
    
                <main class="main-content col col-6" role="main">
    
                    <h1 class="main-content-title">
                        <?php the_title(); ?>
                    </h1>
    
                    <div class="main-content-body">
                        <?php the_content('Lees meer &raquo;'); ?>
                    </div>
                    
<!--
                    <div id="thumbs">
                    
                        <?php
                            $args = array(
                                'order'          => 'ASC',
                                'orderby'       => 'menu_order',
                            	'post_type'   => 'attachment',
                                'numberposts' => -1,
                                'post_status' => null,
                                'post_parent' => $post->ID,
                                'exclude'     => get_post_thumbnail_id()
                                );
                                
                            $attachments = get_posts( $args );
                            
                            if ( $attachments ) :
                            
                                foreach ( $attachments as $attachment ) {
                                    $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'large' );
                                    echo '<a class="fancybox" rel="gallery" href="';
                                    echo $image_attributes[0];
                                    echo '">';
                                    echo wp_get_attachment_image( $attachment->ID ); 
                                    echo '</a>';
                                }
                            
                            endif;
                        ?>
                        
                    </div>
-->
    
                </main> <!-- .main-content -->
    
            <?php endwhile; ?>
    
            <?php else : ?>
    
                <article class="main-content col col-6 no-results not-found">
    
                    <h1 class="main-content-title">
                        <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>
                    </h1>
                    
                    <div class="main-content-body">
    
                        <p>
                            <?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?>
                        </p>
    
                        <?php get_search_form(); ?>
    
                    </div>
    
                </article> <!-- .main-content -->
    
            <?php endif; ?>
        
        </div> <!-- .row -->

    </div> <!-- .core -->

</div> <!-- .divider -->

<?php get_footer(); ?>