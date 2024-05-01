<?php

/**
 * shapiro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shapiro
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function shapiro_setup()
{
	/*
	 * to change 'shapiro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('shapiro', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 */
	add_theme_support('title-tag');

	/*
				 * Enable support for Post Thumbnails on posts and pages.
				 
				 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'citywide'),
			// 'footer-menu' => esc_html__('Footer Menu', 'shapiro'),
		)
	);

	/*
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'shapiro_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'shapiro_setup');

/**
 * @global int $content_width
 */
function shapiro_content_width()
{
	$GLOBALS['content_width'] = apply_filters('shapiro_content_width', 640);
}
add_action('after_setup_theme', 'shapiro_content_width', 0);

/**
 * Register widget area.

 */
function shapiro_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'shapiro'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'shapiro'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Header Top', 'shapiro'),
			'id'            => 'header-top',
			'description'   => esc_html__('Add widgets here.', 'shapiro'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name' => esc_html__('Footer', 'shapiro'),
			'id' => 'footer-1',
			'description' => esc_html__('Add widgets here.', 'shapiro'),
			'before_widget' => '<div id="%1$s" class="footer-widget %2$s dynamic-classes">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		),
	);
}
add_action('widgets_init', 'shapiro_widgets_init');


if (!function_exists('shapiro_widget_classes')) {

	function shapiro_widget_classes($params)
	{

		global $sidebars_widgets;

		/*
		 * When the corresponding filter is evaluated on the front end
		 * this takes into account that there might have been made other changes.
		 */
		$sidebars_widgets_count = apply_filters('sidebars_widgets', $sidebars_widgets);

		// Only apply changes if sidebar ID is set and the widget's classes depend on the number of widgets in the sidebar.
		if (isset($params[0]['id']) && strpos($params[0]['before_widget'], 'dynamic-classes')) {
			$sidebar_id   = $params[0]['id'];
			$widget_count = count($sidebars_widgets_count[$sidebar_id]);

			$widget_classes = 'widget-count-' . $widget_count;
			if (0 === $widget_count % 4 || $widget_count > 6) {
				// Four widgets per row if there are exactly four or more than six.
				$widget_classes .= ' col-md-3';
			} elseif (6 === $widget_count) {
				// If two widgets are published.
				$widget_classes .= ' col-md-2';
			} elseif ($widget_count >= 3) {
				// Three widgets per row if there's three or more widgets.
				$widget_classes .= ' col-md-4';
			} elseif (2 === $widget_count) {
				// If two widgets are published.
				$widget_classes .= ' col-md-6';
			} elseif (1 === $widget_count) {
				// If just on widget is active.
				$widget_classes .= ' col-md-12';
			}

			// Replace the placeholder class 'dynamic-classes' with the classes stored in $widget_classes.
			$params[0]['before_widget'] = str_replace('dynamic-classes', $widget_classes, $params[0]['before_widget']);
		}

		return $params;
	}
}
add_filter('dynamic_sidebar_params', 'shapiro_widget_classes');

/**
 * Enqueue scripts and styles.
 */
function shapiro_scripts()
{



	wp_enqueue_style('pt-serif-font', 'https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), _S_VERSION);
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), _S_VERSION);
	wp_enqueue_style('nice-select-css', get_template_directory_uri() . '/assets/css/nice-select.css', array(), _S_VERSION);
	wp_enqueue_style('shapiro-theme-style', get_template_directory_uri() . '/assets/css/shapiro-theme.css', array(), _S_VERSION);

	wp_enqueue_style('shapiro-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('shapiro-style', 'rtl', 'replace');

	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
	// wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('proper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('nice-select-js', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('shapiro-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('script-js', get_template_directory_uri() . '/assets/js/script-active.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'shapiro_scripts');


// Enable to Classic Widget

/* function citywide_widgets_block_remove() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'citywide_widgets_block_remove' );
 */

/**
 * Implement the Header Menu Dropdown in bootstrap feature.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Header Menu Dropdown in bootstrap feature.
 */
require get_template_directory() . '/inc/about-info-widget.php';
require get_template_directory() . '/inc/contact-address-widget.php';


require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/inc/customizer.php';
// kirki customizer
require get_template_directory() . '/inc/kirki-customizer.php';

if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// unction filter_wpcf7_response_output( $output ){
//     // Replace Success CSS Class
//     $output = str_replace( ' wpcf7-mail-sent-ok', ' alert alert-success', $output );
//     return $output; 
// }
// add_filter( 'wpcf7_form_response_output', 'filter_wpcf7_response_output', 10, 1 );