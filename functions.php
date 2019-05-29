<?php
/**
 * The functions template of our theme
 */ ?>

<?php if ( ! function_exists( 'gmail_genius' ) ) {

	function gmail_genius() {

		// register menus
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'gmail-genius' ),
		));

		// declare theme supports
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'post-formats', array(
			'video', 'audio', 'quote', 'gallery', 'link'
		) );

	}
	add_action( 'after_setup_theme', 'gmail_genius' );
}

if ( ! function_exists( 'gmail_genius_styles_scripts' ) ) {

	function gmail_genius_styles_scripts() {

		$PATH = get_template_directory_uri();

		/* for css */
		wp_enqueue_style( 'bootstrap-min-css', $PATH .'/assets/vendors/css/bootstrap.min.css', false, '3.3.7', 'all' );

		wp_enqueue_style( 'google-font-dosis', 'https://fonts.googleapis.com/css?family=Dosis:300,400,600' );

		wp_enqueue_style( 'google-font-source-sans-pro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' );

		wp_enqueue_style( 'font-awesome', $PATH .'/assets/vendors/css/font-awesome.min.css', false, '4.5.0', 'all' );

		wp_enqueue_style( 'gmail_genius-css', get_stylesheet_uri() );

		/* for js */
		
		wp_deregister_script( 'jquery' );

	    wp_enqueue_script( 'jquery', $PATH .'/assets/vendors/js/jquery-3.2.1.min.js', array(), '3.2.1', true );

	    wp_enqueue_script( 'jquery-migrate', 'jquery-migrate-3.0.0.js', array(), '3.0.0', true );
		
		wp_enqueue_script( 'ie10-viewport', $PATH .'/assets/vendors/js/ie10-viewport-bug-workaround.js', array(), '20171121', true );

		wp_enqueue_script( 'app', $PATH .'/assets/resources/js/app.js', array('jquery'), '20171121', true );

	}
	add_action( 'wp_enqueue_scripts', 'gmail_genius_styles_scripts' );
}

if ( ! function_exists( 'gmail_genius_widgets_init' ) ) {

	function gmail_genius_widgets_init() {
		register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'gmail-genius' ),
			'id'            => 'sidebar-primary',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		register_sidebar( array(
			'name'          => __( 'Single Post Sidebar', 'gmail-genius' ),
			'id'            => 'sidebar-single-post',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action( 'widgets_init', 'gmail_genius_widgets_init' );
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Gmail Genius',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true 
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media Settings',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
}

require_once("inc/widgets_override.php");

function gmail_genius_widgets_override(){
  register_widget("WP_Widget_Recent_Posts_Override");
}
add_action("widgets_init", "gmail_genius_widgets_override");

function gmail_genius_new_excerpt( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'gmail_genius_new_excerpt', 21 );

function gmail_genius_excerpt_link( $excerpt ) {
    $post = get_post();

    $excerpt .= '<a href="'. get_permalink($post->ID) .'">Continue reading &raquo; </a>.';
    return $excerpt;
}
add_filter( 'the_excerpt', 'gmail_genius_excerpt_link', 21 );

if( ! function_exists( 'gmail_genius_fix_editor_posts_page' ) ) {
    /**
     * Add the wp-editor back into WordPress after it was removed in 4.2.2.
     *
     * @param Object $post
     * @return void
     */
    function gmail_genius_fix_editor_posts_page( $post ) {
        if( isset( $post ) && $post->ID != get_option('page_for_posts') ) {
            return;
        }

        remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
        add_post_type_support( 'page', 'editor' );
    }
    add_action( 'edit_form_after_title', 'gmail_genius_fix_editor_posts_page', 0 );
 }

 // When search returns 1 redirect to post..
function gmail_genius_redirect_post_result() {
  if (is_search()) {
    global $wp_query;
    if ($wp_query->post_count == 1) {
      wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    }
  }
}
add_action('template_redirect', 'gmail_genius_redirect_post_result');
