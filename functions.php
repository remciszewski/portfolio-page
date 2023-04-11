<?php
/**
 * remmie_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package remmie_theme
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
function remmie_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on remmie_theme, use a find and replace
		* to change 'remmie_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'remmie_theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'remmie_theme' ),
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
			'remmie_theme_custom_background_args',
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
add_action( 'after_setup_theme', 'remmie_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function remmie_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'remmie_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'remmie_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function remmie_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'remmie_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'remmie_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'remmie_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function read_template_files()
{
	$template_dir = get_stylesheet_directory() . '/templates/'; // Change 'templates' to your folder name
	$files = scandir($template_dir);
	$template_files = array();

	foreach ($files as $file) {
		if (strpos($file, '.php') !== false) {
			$template_files[] = $file;
		}
	}

	return $template_files;
}
function wpdocs_codex_education_init()
{
	$labels = array(
		'name'                  => _x('education', 'Post type general name', 'textdomain'),
		'singular_name'         => _x('education', 'Post type singular name', 'textdomain'),
		'menu_name'             => _x('education', 'Admin Menu text', 'textdomain'),
		'name_admin_bar'        => _x('education', 'Add New on Toolbar', 'textdomain'),
		'add_new'               => __('Add New', 'textdomain'),
		'add_new_item'          => __('Add New education', 'textdomain'),
		'new_item'              => __('New education', 'textdomain'),
		'edit_item'             => __('Edit education', 'textdomain'),
		'view_item'             => __('View education', 'textdomain'),
		'all_items'             => __('All education', 'textdomain'),
		'search_items'          => __('Search education', 'textdomain'),
		'parent_item_colon'     => __('Parent education:', 'textdomain'),
		'not_found'             => __('No education found.', 'textdomain'),
		'not_found_in_trash'    => __('No education found in Trash.', 'textdomain'),
		'featured_image'        => _x('Obraz do education', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
		'set_featured_image'    => _x('Ustaw obraz', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'remove_featured_image' => _x('Usuń obraz', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'use_featured_image'    => _x('Użyj jako obraz education', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'archives'              => _x('education archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
		'insert_into_item'      => _x('Insert into education', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
		'uploaded_to_this_item' => _x('Uploaded to this education', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
		'filter_items_list'     => _x('Filter education list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
		'items_list_navigation' => _x('education list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
		'items_list'            => _x('education list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'education'),
		'capability_type'    => 'post',
		'taxonomies'  		 => array('category', 'post_tag'),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-text-page',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'tags'),
	);

	register_post_type('education', $args);
}
add_action('init', 'wpdocs_codex_education_init');
function wpdocs_codex_skills_init()
{
	$labels = array(
		'name'                  => _x('skills', 'Post type general name', 'textdomain'),
		'singular_name'         => _x('skills', 'Post type singular name', 'textdomain'),
		'menu_name'             => _x('skills', 'Admin Menu text', 'textdomain'),
		'name_admin_bar'        => _x('skills', 'Add New on Toolbar', 'textdomain'),
		'add_new'               => __('Add New', 'textdomain'),
		'add_new_item'          => __('Add New skills', 'textdomain'),
		'new_item'              => __('New skills', 'textdomain'),
		'edit_item'             => __('Edit skills', 'textdomain'),
		'view_item'             => __('View skills', 'textdomain'),
		'all_items'             => __('All skills', 'textdomain'),
		'search_items'          => __('Search skills', 'textdomain'),
		'parent_item_colon'     => __('Parent skills:', 'textdomain'),
		'not_found'             => __('No skills found.', 'textdomain'),
		'not_found_in_trash'    => __('No skills found in Trash.', 'textdomain'),
		'featured_image'        => _x('Obraz do skills', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
		'set_featured_image'    => _x('Ustaw obraz', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'remove_featured_image' => _x('Usuń obraz', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'use_featured_image'    => _x('Użyj jako obraz skills', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'archives'              => _x('skills archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
		'insert_into_item'      => _x('Insert into skills', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
		'uploaded_to_this_item' => _x('Uploaded to this skills', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
		'filter_items_list'     => _x('Filter skills list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
		'items_list_navigation' => _x('skills list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
		'items_list'            => _x('skills list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'skills'),
		'capability_type'    => 'post',
		'taxonomies'  		 => array('category', 'post_tag'),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-text-page',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'tags'),
	);

	register_post_type('skills', $args);
}

add_action('init', 'wpdocs_codex_skills_init');

function wpdocs_codex_certificates_init()
{
	$labels = array(
		'name'                  => _x('certificates', 'Post type general name', 'textdomain'),
		'singular_name'         => _x('certificates', 'Post type singular name', 'textdomain'),
		'menu_name'             => _x('certificates', 'Admin Menu text', 'textdomain'),
		'name_admin_bar'        => _x('certificates', 'Add New on Toolbar', 'textdomain'),
		'add_new'               => __('Add New', 'textdomain'),
		'add_new_item'          => __('Add New certificates', 'textdomain'),
		'new_item'              => __('New certificates', 'textdomain'),
		'edit_item'             => __('Edit certificates', 'textdomain'),
		'view_item'             => __('View certificates', 'textdomain'),
		'all_items'             => __('All certificates', 'textdomain'),
		'search_items'          => __('Search certificates', 'textdomain'),
		'parent_item_colon'     => __('Parent certificates:', 'textdomain'),
		'not_found'             => __('No certificates found.', 'textdomain'),
		'not_found_in_trash'    => __('No certificates found in Trash.', 'textdomain'),
		'featured_image'        => _x('Obraz do certificates', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
		'set_featured_image'    => _x('Ustaw obraz', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'remove_featured_image' => _x('Usuń obraz', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'use_featured_image'    => _x('Użyj jako obraz certificates', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'archives'              => _x('certificates archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
		'insert_into_item'      => _x('Insert into certificates', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
		'uploaded_to_this_item' => _x('Uploaded to this certificates', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
		'filter_items_list'     => _x('Filter certificates list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
		'items_list_navigation' => _x('certificates list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
		'items_list'            => _x('certificates list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'certificates'),
		'capability_type'    => 'post',
		'taxonomies'  		 => array('category', 'post_tag'),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-text-page',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'tags'),
	);

	register_post_type('certificates', $args);
}

add_action('init', 'wpdocs_codex_certificates_init');

function wpdocs_codex_interests_init()
{
	$labels = array(
		'name'                  => _x('interests', 'Post type general name', 'textdomain'),
		'singular_name'         => _x('interests', 'Post type singular name', 'textdomain'),
		'menu_name'             => _x('interests', 'Admin Menu text', 'textdomain'),
		'name_admin_bar'        => _x('interests', 'Add New on Toolbar', 'textdomain'),
		'add_new'               => __('Add New', 'textdomain'),
		'add_new_item'          => __('Add New interests', 'textdomain'),
		'new_item'              => __('New interests', 'textdomain'),
		'edit_item'             => __('Edit interests', 'textdomain'),
		'view_item'             => __('View interests', 'textdomain'),
		'all_items'             => __('All interests', 'textdomain'),
		'search_items'          => __('Search interests', 'textdomain'),
		'parent_item_colon'     => __('Parent interests:', 'textdomain'),
		'not_found'             => __('No interests found.', 'textdomain'),
		'not_found_in_trash'    => __('No interests found in Trash.', 'textdomain'),
		'featured_image'        => _x('Obraz do interests', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
		'set_featured_image'    => _x('Ustaw obraz', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'remove_featured_image' => _x('Usuń obraz', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'use_featured_image'    => _x('Użyj jako obraz interests', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
		'archives'              => _x('interests archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
		'insert_into_item'      => _x('Insert into interests', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
		'uploaded_to_this_item' => _x('Uploaded to this interests', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
		'filter_items_list'     => _x('Filter interests list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
		'items_list_navigation' => _x('interests list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
		'items_list'            => _x('interests list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'interests'),
		'capability_type'    => 'post',
		'taxonomies'  		 => array('category', 'post_tag'),
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' 		 => 'dashicons-text-page',
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'tags'),
	);

	register_post_type('interests', $args);
}

add_action('init', 'wpdocs_codex_interests_init');

function remmie_theme_scripts() {
	wp_enqueue_style( 'remmie_theme-style', get_stylesheet_uri(), array(), time() );
	wp_style_add_data( 'remmie_theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'remmie_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'remmie_theme_scripts' );

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

