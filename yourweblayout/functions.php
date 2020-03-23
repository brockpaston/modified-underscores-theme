<?php
/**
 * yourweblayout functions and definitions
 *
 * @package yourweblayout
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750; /* pixels */
}

if ( ! function_exists( 'yourweblayout_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function yourweblayout_setup() {
    /*
	 * Adds custom logo option in WP dashboard Appearance > Customize
	 */ 
	add_theme_support('custom-logo');

    /*
	 * Add default posts and comments RSS feed links to head.
	 */ 
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails (Leaderboard Image) on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
	
    /*
	 * This theme uses wp_nav_menu() in multiple locations.
	 */ 
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'yourweblayout' ),
		'secondary' => __( 'Secondary Menu', 'yourweblayout' ),
	) );
	
}
endif; // yourweblayout_setup
add_action( 'after_setup_theme', 'yourweblayout_setup' );


/*
* Function allows Customizer logo to be shown in header
*/
function yourweblayout_custom_logo() {
    // Try to retrieve the Custom Logo
    $output = '';
    if (function_exists('get_custom_logo'))
        $output = get_custom_logo();

    // Nothing in the output: Custom Logo is not supported, or there is no selected logo
    // In both cases we display the site's name
    if (empty($output))
        $output = '<h2><a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a></h2>';
    echo $output;
}


/**
 * Enqueue scripts and styles.
 */
function yourweblayout_scripts() {
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/all.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/all.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.css' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css' );
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.css' );
	wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover.min.css' );
	wp_enqueue_style( 'smartmenus-css', get_template_directory_uri() . '/css/jquery.smartmenus.bootstrap.css' );
	wp_enqueue_style( 'yourweblayout-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.1.js' );
	wp_enqueue_script( 'bootstrap-javascript', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'smartmenus-javascript', get_template_directory_uri() . '/js/jquery.smartmenus.js' );
	wp_enqueue_script( 'smartmenus-bootstrap-javascript', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js' );
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array( 'jquery' ) );
	//wp_enqueue_script( 'viewportchecker', get_stylesheet_directory_uri() . '/js/jquery.viewportchecker.min.js', array( 'jquery' ) );
	//wp_enqueue_script( 'viewportchecker', get_stylesheet_directory_uri() . '/js/jquery.viewportchecker.min.js.map.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'yourweblayout_scripts' );


/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function yourweblayout_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'yourweblayout' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'yourweblayout' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'yourweblayout_widgets_init' );


/**
 * Allows shortcodes to be used in widgets
 */ 
add_filter('widget_text', 'do_shortcode');


/**
 * Show Font Awesome icons in visual editor
 */
add_editor_style( 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );


/**
 * Replaces the excerpt "more" text by a link
 */ 
function new_excerpt_more($more) {
       global $post;
    return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read more &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Hide theme editor link.
 */
function remove_menu_elements() {
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
}
add_action( 'admin_init', 'remove_menu_elements', 102 );


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Register Bootstrap navigation walker. Feb 10, 2018 last Bootstrap 3 update: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 */ 
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';


/**
 * Removes admin color scheme options under Personal Options section from Profile of Users
 */
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
//Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
add_action( 'admin_head', function () {
	ob_start( function( $subject ) {
		$subject = preg_replace( '#<h[0-9]>'.__("Personal Options").'</h[0-9]>.+?/table>#s', '', $subject, 1 );
		return $subject;
	});
});
add_action( 'admin_footer', function(){
	ob_end_flush();
}); 