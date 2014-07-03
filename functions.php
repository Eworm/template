<?php

setlocale(LC_TIME, 'nl_NL');

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


/* Widget
==================================================================================================================================*/
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Widget',
    'before_widget' => '<section class="sidebar-section">',
    'after_widget' => '</section>',
    'before_title' => '<header class="sidebar-section-header"><h1 class="sidebar-section-title">',
    'after_title' => '</h1></header>',
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


/* Theme options
==================================================================================================================================*/
require_once ( get_template_directory() . '/theme-options.php' );


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


?>