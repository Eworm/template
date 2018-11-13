<?php

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });

    return;
}

class MyTimberSite extends TimberSite
{
    public function __construct()
    {
        add_filter('timber_context', array($this, 'add_to_context'));
        add_filter('get_twig', array($this, 'add_to_twig'));

        parent::__construct();
    }

    public function add_to_context($context)
    {
        $context['menu'] = new TimberMenu('main');

        return $context;
    }

    public function add_to_twig($twig)
    {
        $twig->addFunction(

            new Twig_SimpleFunction(

                'include_critical_css',
                [$this, 'include_critical_css'],
                ['is_safe' => ['html']]

            )

        );

        $twig->addFunction(

            new Twig_SimpleFunction(

                'include_svg',
                [$this, 'include_svg'],
                ['is_safe' => ['html']]

            )

        );

        $twig->addFunction(

            new Twig_SimpleFunction(

                'include_js',
                [$this, 'include_js'],
                ['is_safe' => ['html']]

            )

        );

        return $twig;
    }

    public function include_critical_css($path)
    {
        $path = get_template_directory() . '/' . $path;

        if (file_exists($path)) {
            $css = file_get_contents($path);
            $css = str_replace('/fonts/', get_bloginfo('stylesheet_directory') . '/fonts/', $css);

            return $css;
        }
    }

    public function include_svg($path)
    {
        $path = get_template_directory() . '/' . $path;

        if (file_exists($path)) {
            $svg = file_get_contents($path);

            return $svg;
        }
    }

    public function include_js($path)
    {
        $path = get_template_directory() . '/' . $path;

        if (file_exists($path)) {
            $script = file_get_contents($path);
            $script = str_replace('/js/', get_bloginfo('stylesheet_directory') . '/js/', $script);

            return $script;
        }
    }
}

new MyTimberSite();
