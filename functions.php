<?php
/**
 * agency functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package agency
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function agency_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on agency, use a find and replace
		* to change 'agency' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'agency', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'agency' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
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
			'agency_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'agency_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agency_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'agency_content_width', 640 );
}
add_action( 'after_setup_theme', 'agency_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agency_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'agency' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'agency' ),
			'before_widget' => '<div class="single-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'agency' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add Footer Widget here.', 'agency' ),
			'before_widget' => '<div class="single-footer footer-logo">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
	array(
		'name'          => esc_html__( 'Footer 2', 'agency' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add Footer Widget here.', 'agency' ),
		'before_widget' => '<div class="single-footer">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	)
);


register_sidebar(
array(
	'name'          => esc_html__( 'Footer 3', 'agency' ),
	'id'            => 'footer-3',
	'description'   => esc_html__( 'Add Footer Widget here.', 'agency' ),
	'before_widget' => '<div class="single-footer">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 style="font-size: 18px;
	margin-bottom: 15px;">',
	'after_title'   => '</h4>',
)
);

register_sidebar(
	array(
		'name'          => esc_html__( 'Footer 4', 'agency' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add Footer Widget here.', 'agency' ),
		'before_widget' => '<div class="single-footer contact-box">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 style="font-size: 18px;
		margin-bottom: 15px;">',
		'after_title'   => '</h4>',
	)
	);


}
add_action( 'widgets_init', 'agency_widgets_init' );





/**
 * Register Post Type
 */

function agency_custom_post_type() {
    register_post_type('agency_slider',
        array(
            'labels'      => array(
                'name'          => __('Slider', 'agency'),
                'singular_name' => __('Slider', 'agency'),
				'add_new'               => __( 'Add New Slider', 'agency' ),
				'add_new_item'          => __( 'Add New Slider', 'agency' ),
				'new_item'              => __( 'New Slider', 'agency' ),
				'edit_item'             => __( 'Edit Slider', 'agency' ),
				'view_item'             => __( 'View Slider', 'agency' ),
				'all_items'             => __( 'All Slider', 'agency' ),
				'search_items'          => __( 'Search Slider', 'agency' ),
				'featured_image'        => _x( 'Slider Image','recipe' ),
				'set_featured_image'    => _x( 'Add Slider Image','agency' ),
				'remove_featured_image'    => _x( 'remove slider image','agency' ),
            ),
                'public'      => true,
                'has_archive' => true,
				'menu_icon'	  => 'dashicons-slides',
 				
				'supports'   => array( 'title', 'editor', 'thumbnail', ),
        )
    );


	register_post_type('agency_service',
	array(
		'labels'      => array(
			'name'          => __('Services', 'agency'),
			'singular_name' => __('Services', 'agency'),
			'add_new'               => __( 'Add New Service', 'agency' ),
			'add_new_item'          => __( 'Add New Service', 'agency' ),
			'new_item'              => __( 'New Service', 'agency' ),
			'edit_item'             => __( 'Edit Service', 'agency' ),
			'view_item'             => __( 'View Service', 'agency' ),
			'all_items'             => __( 'All Services', 'agency' ),
			'search_items'          => __( 'Search Service', 'agency' ),
		),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'	  => 'dashicons-admin-tools',
			'supports'   => array( 'title', 'editor','custom-fields'),
	)
);

register_post_type('agency_counter',
	array(
		'labels'      => array(
			'name'          => __('Counter', 'agency'),
			'singular_name' => __('Counter', 'agency'),
			'add_new'               => __( 'Add New Counter', 'agency' ),
			'add_new_item'          => __( 'Add New Counter', 'agency' ),
			'new_item'              => __( 'New Counter', 'agency' ),
			'edit_item'             => __( 'Edit Counter', 'agency' ),
			'view_item'             => __( 'View Counter', 'agency' ),
			'all_items'             => __( 'All Counters', 'agency' ),
			'search_items'          => __( 'Search Counter', 'agency' ),
		),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'	  => 'dashicons-clock',
			'supports'   => array( 'title','custom-fields'),
	)
);

register_post_type('agency_team',
	array(
		'labels'      => array(
			'name'          => __('Team', 'agency'),
			'singular_name' => __('Team', 'agency'),
			'add_new'               => __( 'Add New Team', 'agency' ),
			'add_new_item'          => __( 'Add New Team', 'agency' ),
			'new_item'              => __( 'New Team', 'agency' ),
			'edit_item'             => __( 'Edit Team', 'agency' ),
			'view_item'             => __( 'View Team', 'agency' ),
			'all_items'             => __( 'All Team', 'agency' ),
			'search_items'          => __( 'Search Team', 'agency' ),
			'featured_image'        => _x( 'Team Image','recipe' ),
			'set_featured_image'    => _x( 'Add Team Image','agency' ),
			'remove_featured_image'    => _x( 'remove Team image','agency' ),
		),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'	  => 'dashicons-groups',
			'supports'   => array( 'title','thumbnail','custom-fields'),
	)
);

register_post_type('agency_testimonail',
	array(
		'labels'      => array(
			'name'          => __('Testimonail', 'agency'),
			'singular_name' => __('Testimonail', 'agency'),
			'add_new'               => __( 'Add New Testimonail', 'agency' ),
			'add_new_item'          => __( 'Add New Testimonail', 'agency' ),
			'new_item'              => __( 'New Testimonail', 'agency' ),
			'edit_item'             => __( 'Edit Testimonail', 'agency' ),
			'view_item'             => __( 'View Testimonail', 'agency' ),
			'all_items'             => __( 'All Testimonails', 'agency' ),
			'search_items'          => __( 'Search Testimonail', 'agency' ),
			'featured_image'        => _x( 'Testimonail Image','recipe' ),
			'set_featured_image'    => _x( 'Add Testimonail Image','agency' ),
			'remove_featured_image'    => _x( 'remove Testimonail image','agency' ),
		),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'	  => 'dashicons-testimonial',
			'supports'   => array( 'title','editor','thumbnail','custom-fields'),
	)
);



register_post_type('agency_portfolio',
	array(
		'labels'      => array(
			'name'          => __('Portfolio', 'agency'),
			'singular_name' => __('Porfolio', 'agency'),
			'add_new'               => __( 'Add New Porfolio', 'agency' ),
			'add_new_item'          => __( 'Add New Porfolio', 'agency' ),
			'new_item'              => __( 'New Porfolio', 'agency' ),
			'edit_item'             => __( 'Edit Porfolio', 'agency' ),
			'view_item'             => __( 'View Porfolio', 'agency' ),
			'all_items'             => __( 'All Porfolios', 'agency' ),
			'search_items'          => __( 'Search Porfolio', 'agency' ),
			'featured_image'        => _x( 'Porfolio Image','recipe' ),
			'set_featured_image'    => _x( 'Add Porfolio Image','agency' ),
			'remove_featured_image'    => _x( 'remove Porfolio image','agency' ),
		),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'	  => 'dashicons-portfolio',
			'supports'   => array( 'title','editor','thumbnail'),
			
	),


);
register_post_type('agency_gallery',
	array(
		'labels'      => array(
			'name'          => __('Gallery', 'agency'),
			'singular_name' => __('Gallery', 'agency'),
			'add_new'               => __( 'Add New Gallery', 'agency' ),
			'add_new_item'          => __( 'Add New Gallery', 'agency' ),
			'new_item'              => __( 'New Gallery', 'agency' ),
			'edit_item'             => __( 'Edit Gallery', 'agency' ),
			'view_item'             => __( 'View Gallery', 'agency' ),
			'all_items'             => __( 'All Gallerys', 'agency' ),
			'search_items'          => __( 'Search Gallery', 'agency' ),
			'featured_image'        => _x( 'Gallery Image','recipe' ),
			'set_featured_image'    => _x( 'Add Gallery Image','agency' ),
			'remove_featured_image'    => _x( 'remove Gallery image','agency' ),
		),
			'public'      => true,
			'has_archive' => true,
			'menu_icon'	  => 'dashicons-format-gallery',
			'supports'   => array( 'title','thumbnail'),
			
	),


);

}
add_action('init', 'agency_custom_post_type');


function agency_portfolio_category() {
    register_taxonomy( 'portfolio-cat', 'agency_portfolio', array(
        'label'        => __( 'Portfoliol Category', 'agency' ),
        'hierarchical' => true,
    ) );
}
add_action( 'init', 'agency_portfolio_category', 0 );




/**
 * Enqueue scripts and styles.
 */
function agency_scripts() {
	wp_enqueue_style( 'agency-style', get_stylesheet_uri(), array(), '1.0.0' );

	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'magnific-css', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'carousel-css', get_template_directory_uri() .'/assets/css/owl.carousel.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() .'/assets/css/style.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() .'/assets/css/responsive.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'font-css','//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'font-mont-css','fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
    wp_enqueue_style( 'fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all' );
	
	wp_style_add_data( 'agency-style', 'rtl', 'replace' );

	
	wp_enqueue_script( 'jquery-js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'magnific-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'onepagenav-js', get_template_directory_uri() . '/assets/js/onepagenav.js.js', array(), '1.0.0', true );
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/js/isotope.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'imageloaded-js', get_template_directory_uri() . '/assets/js/imageloaded.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'counterup-js', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'waypoint-js', get_template_directory_uri() . '/assets/js/waypoint.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'agency_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Codestar additions.
 */
require_once get_theme_file_path() .'/inc/codestar-framework-master/codestar-framework.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


require_once get_template_directory(). '/inc/agency-plugin-activation.php';
require_once get_template_directory(). '/inc/agency-demo/agency-demo-content.php';