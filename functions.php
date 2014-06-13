<?php
/* String Theory setup and base functions.
 * Updated for 2014 and beyond from the ever-evolving 2008 version by Utopian.net
 *
 *
 *
 *
 */
 
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}
 
if ( ! function_exists( 'string_theory_setup' ) ) : 
function string_theory_setup() { 
/*
 * Gettext i18n.
 * load_theme_textdomain( $domain, $path )
 * $path relative from / of URL space.
 */
$dir = basename(dirname(__FILE__));

/* Internationalization */
	load_theme_textdomain('stringtheory', 'wp-content/themes/' . $dir . '/languages');
	

/* RSS and ATOM Feeds */
	add_theme_support( 'automatic-feed-links' );

/* Post Formats */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );

/* Custom Image Header */
	$args = array(
		'flex-width'    => true,
		'width'         => 1600,
		'flex-height'    => true,
		'height'        => 1016,
		'default-image' => get_template_directory_uri() . '/img/defaultheader.jpg',
	);
	add_theme_support( 'custom-header', $args );


/* Custom Background */	
	$defaults = array(
		'default-color'          => '#ffffff',
		'default-image'          => ''
	);
	add_theme_support( 'custom-background', $defaults );

/* HTML5 */
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

}
endif; // string_theory_setup
add_action( 'after_setup_theme', 'string_theory_setup' );


function stringtheory_styles() {
	?>
<style>
header { 
<?php if ( get_header_image() ) { ?>
	background-image: url('<?php header_image(); ?>'); 
	<?php } else { ?>
	background-image: url('<?php echo get_template_directory_uri() ?>/img/defaultheader.jpg');
	<?php } ?>
	 	background-size: cover;	
}
</style>
	<?php
}
add_action( 'wp_head', 'stringtheory_styles' );

/* Filter wp_title() to give each page a unique title */


function filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', 'stringtheory' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}
	add_filter( 'wp_title', 'filter_wp_title' );

/* Custom Post Excerpts */
	function new_excerpt_more($post) {
		global $post;
		return '<a href="'. get_permalink( $post->ID ) . '">' . 'read more >>' . '</a>';
	}
	add_filter( 'excerpt_more', 'new_excerpt_more' );	
	
	
	
/* Post Thumbnails Support */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 100, 100, true ); // Normal post thumbnails
	add_image_size( 'photostream-thumbnail', 60, 60, true ); // Permalink thumbnail size

/* and some legacy post thumbnail support

the_post_thumbnail(array(100,100), array('class' => 'alignleft'));

the_post_thumbnail( $size, $attr ); 

Parameters

$size
    (string/array) (Optional) Image size.

        Default: 'post-thumbnail', which theme sets using set_post_thumbnail_size( $width, $height, $crop_flag );. Either a string keyword(thumbnail, medium, large or full) or a 2-item array representing width and height in pixels, e.g. array(32,32). 
*/

// If user refuses to set Featured Images, get the first image attached to the current post
function st_get_post_image($size = 'thumbnail') {
	global $post;

	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

	if ($photos) {
		$photo = array_shift($photos);
		return wp_get_attachment_image($photo->ID, $size);
	}

	return false;
}

/* Menus */
function register_st_menus() {

	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
			  'top_menu' => 'Top Menu',
			  'main_menu' => 'Radio Menu'
			)
		);
	}
}

	add_action( 'init', 'register_st_menus' );
	
/* Register Sidebars and Widgets */
function string_theory_sidebar_init() {

	register_sidebar( array(
		'name'          => __( 'Top Sidebar', 'stringtheory' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Horizontal sidebar that appears on the top.', 'stringtheory' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'stringtheory' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Column sidebar that appears on the right.', 'stringtheory' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'stringtheory' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'stringtheory' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'string_theory_sidebar_init' );
	
/* Register Google fonts */

function string_theory_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by these fonts, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google Web font: on or off', 'stringtheory' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Josefin Sans|Merriweather' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}
	
function string_theory_scripts() {
	// Add Amatic font, used in the main stylesheet.
	wp_enqueue_style( 'string-theory-amatic', string_theory_font_url(), array(), null );

	// Add Font Awesome font, used in the main stylesheet.
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '3.2.1' );

	// Load our main stylesheet.
	wp_enqueue_style( 'string-theory-style', get_stylesheet_uri(), array( 'fontawesome' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	wp_enqueue_script( 'string_theory-script', get_template_directory_uri() . '/js/customizer.js', array( 'jquery' ), '20140501', true );
}
add_action( 'wp_enqueue_scripts', 'string_theory_scripts' );

function string_theory_add_editor_styles() {
    add_editor_style( '/css/editor-style.css' );
}
add_action( 'init', 'string_theory_add_editor_styles' );

/* Handy is_child function for submenus and page parents in eShop */
function is_child($parent) {
		global $wp_query;
		if ($wp_query->post->post_parent == $parent) {
			$return = true;
		}
		else {
			$return = false;
		}
		return $return;
}
?>
