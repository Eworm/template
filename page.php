<?php get_header(); ?>

<div id="content" class="wrapper wrapper-content">

    <div class="holder holder-content">

        <?php
            if(!$post->post_parent){
                // will display the subpages of this top level page
                $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
            }else{
                // diplays only the subpages of parent level
                //$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");

                if($post->ancestors)
                {
                    // now you can get the the top ID of this page
                    // wp is putting the ids DESC, thats why the top level ID is the last one
                    $ancestors = end($post->ancestors);
                    $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");
                    // you will always get the whole subpages list
                }
            }

            if ($children) { ?>

            <div id="submenu" class="grid-column grid-column-2">
            
                <ul>
                    <?php echo $children; ?>
                </ul>
            
            </div>

        <?php } ?>

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <article class="maincontent grid-column grid-column-6 <?php if ($children) { ?>no-margin<?php } ?>">

                <header class="maincontent-header">
                    <h1 class="maincontent-title"><?php the_title(); ?></h1>
                </header>

                <div class="maincontent-body">
                    <?php the_content('Lees meer &raquo;'); ?>
                </div>
                
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
                        if ( $attachments ) {
                        	foreach ( $attachments as $attachment ) {
                                $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'large' );
                                echo '<a class="fancybox" rel="gallery" href="';
                                echo $image_attributes[0];
                                echo '">';
                                echo wp_get_attachment_image( $attachment->ID ); 
                                echo '</a>';
                        	}
                        }
                    ?>
                    
                </div>

            </article> <!-- #maincontent -->

        <?php endwhile; ?>

        <?php else : ?>

            <article class="no-results not-found">

				<header class="maincontent-header">
					<h1 class="maincontent-title"><?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?></h1>
				</header>

				<div class="entry">
					<p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>
					<?php get_search_form(); ?>
				</div>

			</article>

        <?php endif; ?>

    </div> <!-- #holder-content -->

</div> <!-- #wrapper-content -->

<?php get_footer(); ?>