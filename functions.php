<?php

setlocale(LC_TIME, 'nl_NL');


/* Required plugins
==================================================================================================================================*/
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'template_register_required_plugins' );

function template_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
    	
    	array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => true,
		),
		
		array(
			'name'      => 'EWWW Image Optimizer',
			'slug'      => 'ewww-image-optimizer',
			'required'  => true,
		),
		
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		
    );
    
    /*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'template',              // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'template' ),
			'menu_title'                      => __( 'Install Plugins', 'template' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'template' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'template' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'template' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'template'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'template'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'template'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'template'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'template'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'template'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'template'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'template'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'template'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'template' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'template' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'template' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'template' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'template' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'template' ),
			'dismiss'                         => __( 'Dismiss this notice', 'template' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'template' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'template' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}



/* Optional code to change the url
==================================================================================================================================*/
/*
update_option('siteurl','http://10.0.1.17/_htmltemplate/');
update_option('home','http://10.0.1.17/_htmltemplate/');
*/


/* Error messages
==================================================================================================================================*/
$nameError_message = 'Je bent vergeten je naam in te vullen';
$emailRequired_message = 'Je bent vergeten je e-mailadres in te vullen';
$emailError_message = 'Je hebt een ongeldig e-mailadres ingevuld';
$messageError_message = 'Je bent vergeten een bericht in te vullen';


/* Deregister jquery
==================================================================================================================================*/
function load_jquery() {
    if ( ! is_admin() ) {
        wp_deregister_script('jquery');
    }
}
add_action('template_redirect', 'load_jquery');


/* Remove some ugly wp meta data
==================================================================================================================================*/
remove_filter('term_description','wpautop');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

function disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'disable_embeds_init', 9999);


/* Widget
==================================================================================================================================*/
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Widget',
    'before_widget' => '<section class="sidebar-section">',
    'after_widget' => '</section>',
    'before_title' => '<h1 class="sidebar-section-title">',
    'after_title' => '</h1>',
));


/* Register menu
==================================================================================================================================*/
function register_my_menus() {
    register_nav_menus(
        array(
            'main-menu' => 'Hoofdmenu'
        )
    );
}
add_action( 'init', 'register_my_menus' );


/* Add page excerpt support
==================================================================================================================================*/
if ( function_exists( 'add_post_type_support' ) ) {
    add_post_type_support( 'page', 'excerpt' );
}


/* Add Post thumbnail support
==================================================================================================================================*/
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}


/* Add custom header support
==================================================================================================================================*/
if ( function_exists( 'add_theme_support' ) ) {
    $defaults = array(
        'default-image' => get_template_directory_uri() . '/img/header.jpg',
        'random-default'         => false,
        'width'                  => 980,
        'height'                 => 330,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
    );
    add_theme_support( 'custom-header', $defaults );
}


/* Add rel to gallery links
==================================================================================================================================*/
add_filter('wp_get_attachment_link', 'add_gallery_id_rel');
function add_gallery_id_rel($link) {
    global $post;
    return str_replace('<a href', '<a rel="gallery" href', $link);
}


/* Remove inline width of captions
==================================================================================================================================*/
add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');

function fixed_img_caption_shortcode($attr, $content = null) {
    // Allow plugins/themes to override the default caption template.
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);

    if ( $output != '' ) return $output;
        extract(shortcode_atts(array(
            'id'=> '',
            'align'    => 'alignnone',
            'width'    => '',
            'caption' => ''), $attr));

    if ( 1 > (int) $width || empty($caption) )
        //return $content;
        extract(shortcode_atts(array(
            'id'=> '',
            'align'    => 'alignnone',
            'width'    => '',
            'caption' => ''), $attr));

    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
        return '<div ' . $id . 'class="wp-caption ' . esc_attr($align)
        . '">'
        . do_shortcode( $content ) . '<p class="wp-caption-text">'
        . $caption . '</p></div>';

}


/* Add "has-submenu" CSS class to navigation menu items that have children in a submenu
==================================================================================================================================*/
function nav_menu_item_parent_classing($classes,$item) {
    global $wpdb;
    $has_children = $wpdb -> get_var("SELECT COUNT(meta_id) FROM wp_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='" . $item->ID . "'");
    
    if ( $has_children > 0 ) {
        array_push($classes,'has-submenu');
    }
    return $classes;
}
add_filter('nav_menu_css_class','nav_menu_item_parent_classing', 10, 2);


/* Minifies HTML (source: http://www.intert3chmedia.net/2011/12/minify-html-javascript-css-without.html)
==================================================================================================================================*/
class WP_HTML_Compression
{
        // Settings
        protected $compress_css = true;
        protected $compress_js = false;
        protected $info_comment = true;
        protected $remove_comments = true;

        // Variables
        protected $html;
        public function __construct($html)
        {
                if (!empty($html))
                {
                        $this->parseHTML($html);
                }
        }
        public function __toString()
        {
                return $this->html;
        }
        protected function bottomComment($raw, $compressed)
        {
                $raw = strlen($raw);
                $compressed = strlen($compressed);
                
                $savings = ($raw-$compressed) / $raw * 100;
                
                $savings = round($savings, 2);
                
                return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
        }
        protected function minifyHTML($html)
        {
                $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
                preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
                $overriding = false;
                $raw_tag = false;
                // Variable reused for output
                $html = '';
                foreach ($matches as $token)
                {
                        $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
                        
                        $content = $token[0];
                        
                        if (is_null($tag))
                        {
                                if ( !empty($token['script']) )
                                {
                                        $strip = $this->compress_js;
                                }
                                else if ( !empty($token['style']) )
                                {
                                        $strip = $this->compress_css;
                                }
                                else if ($content == '<!--wp-html-compression no compression-->')
                                {
                                        $overriding = !$overriding;
                                        
                                        // Don't print the comment
                                        continue;
                                }
                                else if ($this->remove_comments)
                                {
                                        if (!$overriding && $raw_tag != 'textarea')
                                        {
                                                // Remove any HTML comments, except MSIE conditional comments
                                                $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
                                        }
                                }
                        }
                        else
                        {
                                if ($tag == 'pre' || $tag == 'textarea')
                                {
                                        $raw_tag = $tag;
                                }
                                else if ($tag == '/pre' || $tag == '/textarea')
                                {
                                        $raw_tag = false;
                                }
                                else
                                {
                                        if ($raw_tag || $overriding)
                                        {
                                                $strip = false;
                                        }
                                        else
                                        {
                                                $strip = true;
                                                
                                                // Remove any empty attributes, except:
                                                // action, alt, content, src
                                                $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
                                                
                                                // Remove any space before the end of self-closing XHTML tags
                                                // JavaScript excluded
                                                $content = str_replace(' />', '/>', $content);
                                        }
                                }
                        }
                        
                        if ($strip)
                        {
                                $content = $this->removeWhiteSpace($content);
                        }
                        
                        $html .= $content;
                }
                
                return $html;
        }
                
        public function parseHTML($html)
        {
                $this->html = $this->minifyHTML($html);
                
                if ($this->info_comment)
                {
                        $this->html .= "\n" . $this->bottomComment($html, $this->html);
                }
        }
        
        protected function removeWhiteSpace($str)
        {
                $str = str_replace("\t", ' ', $str);
                $str = str_replace("\n",  '', $str);
                $str = str_replace("\r",  '', $str);
                
                while (stristr($str, '  '))
                {
                        $str = str_replace('  ', ' ', $str);
                }
                
                return $str;
        }
}

function wp_html_compression_finish($html) {
        return new WP_HTML_Compression($html);
}

function wp_html_compression_start() {
        ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');


/* ADD SEND CONTACTINFO SUBMENU
==================================================================================================================================*/
add_action('admin_menu', 'mt_add_pages');
function mt_add_pages() {
    add_management_page(__('Contactaanvragen','menu-contactrequest'), __('Contactaanvragen','menu-contactrequest'), 'manage_options', 'overview-contactrequest.php', 'mt_contactrequest_page');
};


/* GET SEND CONTACTINFO
==================================================================================================================================*/
function mt_contactrequest_page () {

    global $wpdb;
    
    $requests = $wpdb->get_results( 
    "SELECT *
    FROM maillog
    "
    );
    
    echo '<pre>';
    echo '</pre>';
    
    echo '<table cellspacing="10">';
    echo '<tr>';
    echo '<th align="left">Van</th>';
    echo '<th align="left">Emailadres</th>';
    echo '<th align="left">Bericht</th>';
    echo '<th align="left">Tijd</th>';
    echo '<tr>';
    
    foreach ( $requests as $request ) {
        echo '<tr>';
        echo '<td valign="top">';
        echo $request->from;
        echo '</td>';
        echo '<td valign="top">';
        echo $request->email;
        echo '</td>';
        echo '<td valign="top">';
        echo $request->message;
        echo '</td>';
        echo '<td valign="top">';
        echo '<div style="white-space: nowrap;">'  .$request->time . '</div>';
        echo '</td>';
        echo '</tr>';
        echo '<tr><td colspan="4"><hr></td></tr>';
    }  
    echo '</table>';
    
}


/* AJAX categories
==================================================================================================================================*/
add_action( 'wp_ajax_nopriv_load-filter', 'prefix_load_cat_posts' );
add_action( 'wp_ajax_load-filter', 'prefix_load_cat_posts' );

function prefix_load_cat_posts () {

    $cat_id = $_POST['cat'];
    $args = array (
        'cat' => $cat_id,
        'posts_per_page' => 10,
        'order' => 'DESC'
    );

    global $post;
    $posts = get_posts($args);

    ob_start ();

    foreach ($posts as $post) {
        setup_postdata($post);
    ?>

        <?php get_template_part( 'post', '' ); ?>
        
    <?php }
        
    wp_reset_postdata();

    $response = ob_get_contents();
    ob_end_clean();

    echo $response;
    die(1);
}


/* Breadcrumbs without a plugin
==================================================================================================================================*/
function the_breadcrumb() {
    global $post;
    echo '<ul class="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '" title="Naar de homepage">';
        echo 'Home';
        echo '</a></li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category('</li><li>');
            if (is_single()) {
                echo '</li><li><span>';
                the_title();
                echo '<span></li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
                }
                echo $output;
                // echo '<li><span>';
                // echo $title;
                // echo '</span></li>';
            } else {
                // echo '<li><span>' . get_the_title() . '</span></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

?>
