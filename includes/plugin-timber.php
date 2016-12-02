<?php

if (!class_exists('Timber'))
{

	add_action('admin_notices', function()
	{

		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url('plugins.php#timber') ) . '">' . esc_url( admin_url('plugins.php') ) . '</a></p></div>';
	
	});

	return;
}

class MyTimberSite extends TimberSite
{

	function __construct()
	{

        add_filter('timber_context', array($this, 'add_to_context'));
		add_filter('get_twig', array($this, 'add_to_twig'));

		parent::__construct();

	}
	
	function add_to_context($context)
	{

		$context['menu'] = new TimberMenu('main');

		return $context;
		
	}

	function add_to_twig($twig)
	{
		
		$twig->addFunction
		(

			new Twig_SimpleFunction
			(
		
				'include_critical_css',
				[$this, 'include_critical_css'],
				['is_safe' => ['html']]

			)
		
		);

		$twig->addFunction
		(

			new Twig_SimpleFunction
			(
		
				'include_svg',
				[$this, 'include_svg'],
				['is_safe' => ['html']]

			)
		
		);

		return $twig;

	}

	function include_critical_css($path)
	{

		$path = get_template_directory() . '/' . $path;

		if (file_exists($path))
		{
			
		    $css = file_get_contents($path);
		    $css = str_replace('/fonts/', get_bloginfo('stylesheet_directory') . '/fonts/', $css);

		    return $css;

		}

	}

	function include_svg($path)
	{

		$path = get_template_directory() . '/' . $path;

		if (file_exists($path))
		{
			
			$svg = file_get_contents($path);

			return $svg;

		}

	}

}

new MyTimberSite();

?>
