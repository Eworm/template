<?php get_header(); ?>

<div id="content" class="wrapper wrapper-content">
    <div class="holder holder-content">
        <div id="maincontent" class="grid-column grid-column-5">
            <?php if ( have_posts() ) : ?>
    
    			<header class="maincontent-header">
    				<h1 class="maincontent-title">
    					<?php if ( is_day() ) : ?>
    						<?php printf( __( 'Dagarchief: %s', 'thema_vertalingen' ), '<span>' . get_the_date() . '</span>' ); ?>
    					<?php elseif ( is_month() ) : ?>
    						<?php printf( __( 'Maandarchief: %s', 'thema_vertalingen' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'thema_vertalingen' ) ) . '</span>' ); ?>
    					<?php elseif ( is_year() ) : ?>
    						<?php printf( __( 'Jaararchief: %s', 'thema_vertalingen' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'thema_vertalingen' ) ) . '</span>' ); ?>
    					<?php else : ?>
    						<?php _e( 'Blogarchief', 'thema_vertalingen' ); ?>
    					<?php endif; ?>
    				</h1>
    			</header>
    
    			<?php /* Start the Loop */ ?>
    			<?php while (have_posts()) : the_post(); ?>
                    <article class="post">
            			<header class="post-header">
                            <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                            <time datetime="<?php the_time('Y-m-d') ?>" pubdate="pubdate">
                                <?php the_time('j F Y') ?> &mdash; <?php the_time('g:ia') ?> <?php edit_post_link('Edit','<strong> |</strong> ',''); ?>
                            </time>
                        </header>
                        
                        <div class="entry">
            				<?php the_excerpt(); ?>
            				<span class="post-options">
                				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Directe link naar', 'thema_vertalingen' ); ?> <?php the_title_attribute(); ?>"><?php _e( 'Verder lezen', 'thema_vertalingen' ); ?></a>&nbsp;|&nbsp;
                                <?php comments_popup_link('Reageer als eerste', 'Er is 1 reactie', 'Er zijn % reacties'); ?>
                            </span>
                        </div>
                        
                    </article>
    			<?php endwhile; ?>
    			
    			<ul class="navigation">
                    <li class="goforward"><?php previous_posts_link('&laquo; Nieuwere posts'); ?></li>
    				<li class="goback"><?php next_posts_link('Oudere posts &raquo;'); ?></li>						
    			</ul>
    
    		<?php else : ?>
    
    			<article class="post no-results not-found">
    				<header class="post-header">
    					<h1 class="post-title"><?php _e( 'Deze pagina bestaat niet', 'thema_vertalingen' ); ?></h1>
    				</header>
    
    				<div class="entry">
    					<p><?php _e( 'Sorry, we hebben deze pagina niet gevonden. Maar misschien kun je zoeken om de juiste pagina te vinden:', 'thema_vertalingen' ); ?></p>
    					<?php get_search_form(); ?>
    				</div>
    			</article>
    
    		<?php endif; ?>
        </div>
        <aside id="sidebar" class="grid-column grid-column-3 no-margin">
            <?php if ( !function_exists('dynamic_sidebar')
                || !dynamic_sidebar('Blog') ) : ?>
            <?php endif; ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>