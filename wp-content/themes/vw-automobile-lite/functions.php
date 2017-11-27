<?php
/**
 * VW Automobile Lite functions and definitions
 *
 * @package VW Automobile Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'vw_automobile_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 
/* Breadcrumb Begin */
function vw_automobile_lite_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url();
		echo '">';
		bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
				the_title();
		}
	}
}

/* Theme Setup */
function vw_automobile_lite_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('vw-automobile-lite-homepage-thumb',240,145,true);
	
       register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vw-automobile-lite' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_automobile_lite_font_url() ) );
}
endif;
add_action( 'after_setup_theme', 'vw_automobile_lite_setup' );

/* Theme Widgets Setup */
function vw_automobile_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-automobile-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on page sidebar', 'vw-automobile-lite' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Sidebar', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on sidebar', 'vw-automobile-lite' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on footer 1', 'vw-automobile-lite' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on footer 2', 'vw-automobile-lite' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on footer 3', 'vw-automobile-lite' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'vw-automobile-lite' ),
		'description'   => __( 'Appears on footer 4', 'vw-automobile-lite' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'vw_automobile_lite_widgets_init' );

/* Theme Font URL */
function vw_automobile_lite_font_url() {
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by PT Sans, translate this to off, do not
		* translate into your own language.
		*/
		$ptsans = _x('on', 'PT Sans font:on or off','vw-automobile-lite');
		
		/* Translators: If there are any character that are
		* not supported by Roboto, translate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on', 'Roboto font:on or off','vw-automobile-lite');
		
		/* Translators: If there are any character that are
		* not supported by Roboto Condensed, translate this to off, do not
		* translate into your own language.
		*/
		$roboto_cond = _x('on', 'Roboto Condensed font:on or off','vw-automobile-lite');

		/* Translators: If there are any character that are
		* not supported by Roboto Condensed, translate this to off, do not
		* translate into your own language.
		*/
		$Montserrat = _x('on', 'Montserrat:300,400,600,700,800,900','vw-automobile-lite');
		
		if('off' !== $ptsans || 'off' !==  $roboto || 'off' !== $roboto_cond){
			$font_family = array();
			
			if('off' !== $ptsans){
				$font_family[] = 'PT Sans:300,400,600,700,800,900';
			}
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:400,700';
			}
			
			if('off' !== $roboto_cond){
				$font_family[] = 'Roboto Condensed:400,700';
			}
			
			if('off' !== $Montserrat){
				$font_family[] = 'Montserrat:300,400,600,700,800,900';
			}
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}		
	return $font_url;
}
	
/* Theme enqueue scripts */
function vw_automobile_lite_scripts() {
	wp_enqueue_style( 'vw-automobile-lite-font', vw_automobile_lite_font_url(), array() );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'vw-automobile-lite-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'effect', get_template_directory_uri().'/css/effect.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.css' );
	wp_enqueue_style( 'vw-automobile-lite-customcss', get_template_directory_uri() . '/css/custom.css' );
	if ( is_home() || is_front_page() ) { 
		wp_enqueue_style( 'nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
		wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
		wp_enqueue_script( 'custom-front', get_template_directory_uri() . '/js/custom-front.js', array('jquery') ,'',true);
	}
	wp_enqueue_script( 'vw-automobile-lite-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Enqueue the Dashicons script */
	wp_enqueue_style( 'dashicons' );

}
add_action( 'wp_enqueue_scripts', 'vw_automobile_lite_scripts' );

function vw_automobile_lite_ie_stylesheet(){
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('vw-automobile-lite-ie', get_template_directory_uri().'/css/ie.css');
	wp_style_add_data( 'vw-automobile-lite-ie', 'conditional', 'IE' );
}
add_action('wp_enqueue_scripts','vw_automobile_lite_ie_stylesheet');


define('vw_automobile_lite_CREDIT','https://www.vwthemes.com','vw-automobile-lite');

if ( ! function_exists( 'vw_automobile_lite_credit' ) ) {
	function vw_automobile_lite_credit(){
			echo "<a href=".esc_url(vw_automobile_lite_CREDIT)." target='_blank' rel='nofollow'>VWThemes</a>";
	}
}

define('vw_automobile_lite_CREDIT1','https://www.vwthemes.com/premium/automobile-wordpress-theme/','vw-automobile-lite');

if ( ! function_exists( 'vw_automobile_lite_credit1' ) ) {
	function vw_automobile_lite_credit1(){
			echo "<a href=".esc_url(vw_automobile_lite_CREDIT1)." target='_blank' rel='nofollow'>Automobile WordPress Theme</a>";
	}
}

/*radio button sanitization*/

 function vw_automobile_lite_sanitize_choices( $input, $setting ) {

    global $wp_customize; 

    $control = $wp_customize->get_control( $setting->id ); 

    if ( array_key_exists( $input, $control->choices ) ) {

        return $input;

    } else {

        return $setting->default;

    }
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';


?>