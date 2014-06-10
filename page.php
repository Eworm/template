<?php get_header(); ?>

<div id="content" class="content wrapper wrapper-content">

    <div class="holder holder-content">

        <?php if (!$post->post_parent) :
            
                // will display the subpages of this top level page
                $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
            
            else :
                // diplays only the subpages of parent level
                //$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");

                if ($post->ancestors) :
                
                    // now you can get the the top ID of this page
                    // wp is putting the ids DESC, thats why the top level ID is the last one
                    $ancestors = end($post->ancestors);
                    $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
                    // you will always get the whole subpages list
                
                endif;
            
            endif;

            if ($children) : ?>

                <div id="submenu" class="col col-2">
                
                    <ul>
                        <?php echo $children; ?>
                    </ul>
                
                </div>

            <?php endif; ?>

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <article class="maincontent col col-6 <?php if ($children) { ?>no-margin<?php } ?>">

                <header class="maincontent-header">
                    
                    <h1 class="maincontent-title">
                        <?php the_title(); ?>
                    </h1>

                </header>

                <div class="maincontent-body">
                    <?php the_content('Lees meer &raquo;'); ?>
                </div>
                
                <p class="maincontent col col-palm-4 col-lap-6 col-12">
                    <strong>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.</strong>
                </p>
                
                <p class="maincontent col col-palm-4 col-lap-2 col-12 no-margin">
                    <strong>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Excepteur sint obcaecat cupiditat non proident culpa. Mercedem aut nummos unde unde extricat, amaras. Praeterea iter est quasdam res quas ex communi.</strong>
                </p>
                    

                
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

            </article> <!-- .maincontent -->

        <?php endwhile; ?>

        <?php else : ?>

            <article class="maincontent col col-6 no-results not-found">

                <header class="maincontent-header">
                    
                    <h1 class="maincontent-title">
                        <?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?>
                    </h1>

                </header>

                <div class="maincontent-body">

                    <p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>

                    <?php get_search_form(); ?>

                </div>

            </article> <!-- .maincontent -->

        <?php endif; ?>

    </div> <!-- .holder -->

</div> <!-- #content -->

<?php get_footer(); ?>