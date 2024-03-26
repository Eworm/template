<?php

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });

    return;
}

class MyTimberSite extends \Timber
{
    public function __construct()
    {
        add_filter('timber/context', array($this, 'add_to_context'));
        add_filter('timber/twig', array($this, 'add_to_twig'));

        parent::__construct();
    }

    /**
    * Add a variable to the context
    *
    * @param string $context
    *
    * @return $context
    */
    public function add_to_context($context)
    {
        // $context['menu'] = new TimberMenu('main');
        $context['menu'] = Timber::get_menu('main');

        return $context;
    }

    /**
    * Add functions to twig
    *
    * @param string $twig
    *
    * @return $twig
    */
    public function add_to_twig($twig)
    {
        $twig->addFunction(

            new Twig\TwigFunction(

                'include_critical_css',
                [$this, 'include_critical_css'],
                ['is_safe' => ['html']]

            )

        );

        $twig->addFunction(

            new Twig\TwigFunction(

                'include_svg',
                [$this, 'include_svg'],
                ['is_safe' => ['html']]

            )

        );

        $twig->addFunction(

            new Twig\TwigFunction(

                'include_fav',
                [$this, 'include_fav'],
                ['is_safe' => ['html']]

            )

        );

        $twig->addFunction(

            new Twig\TwigFunction(

                'include_js',
                [$this, 'include_js'],
                ['is_safe' => ['html']]

            )

        );

        $twig->addFunction(

            new Twig\TwigFunction(

                'is_woo',
                [$this, 'is_woo']

            )

        );

        return $twig;
    }

    /**
    * Inline a css file in html
    *
    * @param string $path Path to a css file
    *
    * @return css
    */
    public function include_critical_css($path)
    {
        $path = get_template_directory() . '/' . $path;

        if (file_exists($path)) {
            $css = file_get_contents($path);
            $css = str_replace('/fonts/', get_bloginfo('stylesheet_directory') . '/fonts/', $css);
            $css = str_replace('/images/', get_bloginfo('stylesheet_directory') . '/images/', $css);

            return $css;
        }
    }

    /**
    * Inline an svg file in html
    *
    * @param string $path Path to a svg file
    *
    * @return svg
    */
    public function include_svg($path)
    {
        $path = get_template_directory() . '/' . $path;

        if (file_exists($path)) {
            $svg = file_get_contents($path);

            return $svg;
        }
    }

    /**
    * Inline an svg file in html
    *
    * @param string $path Path to a svg file
    *
    * @return svg
    */
    public function include_fav($path)
    {

        if (file_exists($path)) {
            $svg = file_get_contents($path);
            $svg_decoded = str_replace(array('<', '>', '#', '"'), array('%3C', '%3E', '%23', "'"), $svg);
            return $svg_decoded;
        }
    }

    /**
    * Inline a javascript file in html
    *
    * @param string $path Path to a javascript file
    *
    * @return javascript
    */
    public function include_js($path)
    {
        $path = get_template_directory() . '/' . $path;

        if (file_exists($path)) {
            $script = file_get_contents($path);
            $script = str_replace('/js/', get_bloginfo('stylesheet_directory') . '/js/', $script);

            return $script;
        }
    }

    /**
    * If is woo
    *
    * @return boolean
    */
    public function is_woo()
    {
        if (is_woocommerce()) {
            return is_woocommerce();
        }
        if (is_cart()) {
            return is_cart();
        }
        if (is_checkout()) {
            return is_checkout();
        }
        if (is_account_page()) {
            return is_account_page();
        }
    }
}

new MyTimberSite();
