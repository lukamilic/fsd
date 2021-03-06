<?php
/**
 * FSD functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FSD
 */

if ( ! function_exists( 'fsd_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fsd_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on FSD, use a find and replace
		 * to change 'fsd' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fsd', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'fsd' ),
		) );

		register_nav_menus( array(
			'footer-menu' => esc_html__('Footer-menu', 'fsd'),
		 ));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fsd_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fsd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fsd_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fsd_content_width', 640 );
}
add_action( 'after_setup_theme', 'fsd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fsd_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fsd' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fsd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fsd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fsd_scripts() {
	wp_enqueue_style( 'btcss', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'fawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fsd-style', get_stylesheet_uri() );
	wp_enqueue_style( 'lato','https://fonts.googleapis.com/css?family=Lato:700&display=swap"');
	wp_enqueue_style('owlcss','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fsd_scripts' );

function footer_script() {
	wp_enqueue_script( 'jquery','src="https://code.jquery.com/jquery-3.4.1.min.js"
	integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
	crossorigin="anonymous"' );
	wp_enqueue_script( 'custom-js' , get_template_directory_uri() . '/js/main.js', array('jquery') );
	wp_enqueue_script('owljs','https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js');
	wp_enqueue_script( 'btjs','https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js' );
	wp_enqueue_script( 'fsd-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'fsd-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

}

add_action('wp_footer', 'footer_script');
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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function home_slider() {
	$args = array(
           'post_type' => 'home_slider',
           'posts_per_page' => 3,
           'orderby' => 'date',
           'order' => 'ASC'
       );
	$query = new WP_Query($args);
	$output = "";
	$sep = "'";
	
	$output .= '<div class="owl-carousel owl-theme head-slider">';
	while( $query->have_posts() ) : $query->the_post(); global $post;
	$id = $post->ID;
	$slider_image = get_field('image');
	$slider_heading = get_field('title', $id);
	$slider_subheader = get_field('subtitle', $id);
	$url = get_field('link', $id);
	$link = '#'; 
	$output .= '<div class="container-fluid bimg" style="background-image: url( ' . $sep  . $slider_image['url'] . $sep . ' )"">';
	$output .= '<div class="container">';
	$output .= '<div class="row h-100">';
    $output .= '<div class="item my-auto">';
	$output .= '<div class="header-text mx-auto">';
	$output .= '<h1 class="main-heading delay-1s">' . $slider_heading . '</h1>';
	$output .= '<h4 class="main-subheading delay-2s">' . $slider_subheader . '</h4>';
	$output .= '</div>';
	$output .= '<div class="info"><a href="'.$link.'">'.$url.'</a></div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	endwhile;
	wp_reset_query();
	$output .= '</div>';
	return $output;
}

add_shortcode("home_slider", "home_slider");

function content() {
	$args = array(
           'post_type' => 'content',
           'posts_per_page' => 3,
           'orderby' => 'date',
           'order' => 'ASC'
	   );
	   
	$query = new WP_Query($args);
	$output = "";
	$output .= '<div class="container-fluid about">';
	$output .= '<div class="container">';
	$output .= '<h2 class="text-center line mb-5">Lorem ipsum dolor sit amet consectetur</h2>';
	$output .= '<div class="row">';
	
	while( $query->have_posts() ) : $query->the_post(); global $post;
	$id = $post->ID;
	$icon = get_field('icon',$id);
	$image = get_field('img',$id);
	$title = get_field('title', $id);
	$text = get_field('text', $id);
	$output .= '<div class="col-sm-12 col-md-4 mb-4">';
	$output .= '<div class="row">';
	$output .= '<div class="col-sm-12 col-md-3 col-lg-2">';
	$output .= '<img src="'.$icon['url'].'">';
	$output .= '</div>';
	$output .= '<div class="col-sm-12 col-md-9 col-lg-10">';
	$output .= '<h2 class="subheading">'.$title.'</h2>';
	$output .= '<img class="main-img" src="'.$image['url'].'">';
	$output .= '<p>'.$text.'</p>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	endwhile;
	wp_reset_query();
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	return $output;

	}

add_shortcode("content", "content");

function testimonial() {
	$args = array(
           'post_type' => 'testimonial',
           'posts_per_page' => 3,
           'orderby' => 'date',
           'order' => 'ASC'
       );
	$query = new WP_Query($args);
	$output = "";
	$sep = "'";
	
	$output .= '<div class="owl-carousel owl-carousel1 owl-theme">';
	
	while( $query->have_posts() ) : $query->the_post(); global $post;
	$id = $post->ID;
	$title = get_field('title', $id);
	$subtitle = get_field('subtitle', $id);
	$output .= '<div class="container">';
	$output .= '<div class="row">';
    $output .= '<div class="item">';
	$output .= '<div class="header-text">';
	$output .= '<h2 class="main-heading line">' . $title . '</h2>';
	$output .= '<h5 class="main-subheading pl-3 pl-sm-3 pr-3 pr-sm-3 pl-md-0">' . $subtitle . '</h5>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	
	endwhile;
	wp_reset_query();
	$output .= '</div>';
	return $output;
}

add_shortcode("testimonial", "testimonial");