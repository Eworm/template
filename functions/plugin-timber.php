<?php

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });

    return;
}

class MyTimberSite extends \Timber
{
    private $vite_manifest = null;

    public function __construct()
    {
        add_filter('timber/context', array($this, 'add_to_context'));
        add_filter('timber/twig', array($this, 'add_to_twig'));

        parent::__construct();
    }

    /**
     * Get the Vite manifest and cache it
     *
     * @return array|null
     */
    private function get_vite_manifest()
    {
        if ($this->vite_manifest !== null) {
            return $this->vite_manifest;
        }

        $manifest_path = get_template_directory() . '/.vite/manifest.json';

        if (file_exists($manifest_path)) {
            $this->vite_manifest = json_decode(file_get_contents($manifest_path), true);
        }

        return $this->vite_manifest;
    }

    /**
     * Get a hashed asset URL from the Vite manifest
     *
     * @param string $entry The entry point key (e.g. 'js-src/base/template.init.js')
     *
     * @return string|null
     */
    public function get_vite_asset($entry)
    {
        $manifest = $this->get_vite_manifest();

        if (!$manifest || !isset($manifest[$entry])) {
            return null;
        }

        return get_template_directory_uri() . '/' . $manifest[$entry]['file'];
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
        $context['menu'] = Timber::get_menu('main');

        // Make hashed JS URLs available in all Twig templates
        $context['vite'] = [
            'functions' => $this->get_vite_asset('js-src/base/template.init.js'),
            'lab'       => $this->get_vite_asset('js-src/base/lab-loader.js'),
        ];

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

        // Twig function to get a hashed Vite asset URL directly in templates
        $twig->addFunction(
            new Twig\TwigFunction(
                'vite_asset',
                [$this, 'get_vite_asset']
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
    */
    public function include_svg($path)
    {
        $path = get_template_directory() . '/' . $path;

        if (file_exists($path)) {
            return file_get_contents($path);
        }
    }

    /**
    * Inline a favicon svg as a data URI
    */
    public function include_fav($path)
    {
        if (file_exists($path)) {
            $svg = file_get_contents($path);
            return str_replace(['<', '>', '#', '"'], ['%3C', '%3E', '%23', "'"], $svg);
        }
    }

    /**
    * Inline a javascript file in html
    *
    * @param string $entry The manifest entry key or a direct path
    *
    * @return javascript
    */
    public function include_js($entry)
    {
        $manifest = $this->get_vite_manifest();

        if ($manifest && isset($manifest[$entry])) {
            $path = get_template_directory() . '/' . $manifest[$entry]['file'];
        } else {
            $path = get_template_directory() . '/' . $entry;
        }

        if (file_exists($path)) {
            $script = file_get_contents($path);

            // Replace any unhashed JS references with their hashed manifest equivalents
            if ($manifest) {
                foreach ($manifest as $key => $asset) {
                    if (isset($asset['file']) && isset($asset['isEntry']) && $asset['isEntry']) {
                        $unhashed = '/' . preg_replace('/\.[a-zA-Z0-9]{8}\.js$/', '.js', $asset['file']);
                        $hashed   = get_bloginfo('stylesheet_directory') . '/' . $asset['file'];
                        $script   = str_replace($unhashed, $hashed, $script);
                    }
                }
            }

            return $script;
        }
    }

    /**
    * If is woo
    */
    public function is_woo()
    {
        if (is_woocommerce()) return is_woocommerce();
        if (is_cart())        return is_cart();
        if (is_checkout())    return is_checkout();
        if (is_account_page()) return is_account_page();
    }
}

new MyTimberSite();
