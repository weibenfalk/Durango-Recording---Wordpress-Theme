<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Durango_Recording
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function durango_recording_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'durango_recording_body_classes' );


/************************************** Custom functions below ****************************************/

function enqueue_my_scripts() {
wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', array('jquery'), '2.2.0', true); // we need the jquery library for bootsrap js to function
    wp_enqueue_script('theme_js', get_template_directory_uri() . '/js/bootstrap.min.js' ); // Import Bootstrap JS
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' ); // Import Bootstrap CSS
}

add_action('wp_enqueue_scripts', 'enqueue_my_scripts');

function enqueue_my_styles() {
    wp_enqueue_style( 'my-style', get_template_directory_uri() . '/custom_style.css');
}

add_action('wp_enqueue_scripts', 'enqueue_my_styles');

/** Remove nasty admin bar when previewing page */

add_filter('show_admin_bar', '__return_false');


add_theme_support( 'post-thumbnails' );

add_theme_support( 'html5', array( 'search-form' ) );


function themeslug_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'themeslug_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
) ) );
}
add_action('customize_register', 'themeslug_theme_customizer');


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}


// ******************* CUSTOM POST TYPES CREATED HERE ******************* //
// ********************************************************************** //

register_post_type('equipment',
	array(
		'labels' => array(
			'name' => __('Equipment'),
			'singular_name' => __('Equipment')
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),

		)
	);

function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('equipment_types', 'equipment', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => __('Equipment Types', 'taxonomy general name'),
      'singular_name' => _x( 'Equipment Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Equipment Type' ),
      'all_items' => __( 'All Equipment Types' ),
      'parent_item' => __( 'Parent Equipment Type' ),
      'parent_item_colon' => __( 'Parent Equipment Type:' ),
      'edit_item' => __( 'Edit Equipment Type' ),
      'update_item' => __( 'Update Equipment Type' ),
      'add_new_item' => __( 'Add New Equipment Type' ),
      'new_item_name' => __( 'New Equipment Type Name' ),
      'menu_name' => __( 'Equipment Types' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'equipment_types', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
   ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

register_post_type('durango_pages',
	array(
		'labels' => array(
			'name' => __('Durango Pages'),
			'singular_name' => __('Durango Page')
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		'register_meta_box_cb' => 'add_pages_link_metaboxes'

		)
	);

register_post_type('quotes',
	array(
		'labels' => array(
			'name' => __('Durango Quotes'),
			'singular_name' => __('Durango Quote')
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor'),

		)
	);

register_post_type('artists',
	array(
		'labels' => array(
			'name' => __('Durango Artists'),
			'singular_name' => __('Durango Artist')
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor'),

		)
	);
	
// ********************************************************************** //

// ******************* CUSTOM META BOXES CREATED HERE ******************* //
// ********************************************************************** //

// Add the Durango Pages Link Meta Box

function add_pages_link_metaboxes() {
	add_meta_box('page_link', 'Link to this page', 'page_link_metaboxes_location', 'durango_pages', 'normal', 'default'); //Set "normal" if the metabox should appear below to the left instead of side to right
}

// Function for creating the content in the Durango Pages Metabox

function page_link_metaboxes_location() {
	global $post;	
    $custom = get_post_custom($post->ID);
	$page_link = $custom["page_link"][0]; // Retrieve Custom Meta Box data for display
?>

Link to this post
<input type="text" size="100" name="page_link" value="<?php echo $page_link ?>"> 

<?php

}

// Function for saving the custom Meta Box data

function save_details($post_ID = 0) {
    $post_ID = (int) $post_ID;
    $post_type = get_post_type( $post_ID );
    $post_status = get_post_status( $post_ID );

    if ($post_type) {
    update_post_meta($post_ID, "page_link", $_POST["page_link"]);
    }
   return $post_ID;
}

add_action('save_post', 'save_details');

// ********************************************************************** //

// ******************* CUSTOM SHORTCODES CREATED HERE ******************* //
// ********************************************************************** //

// [durango_equipment]
function durango_equipment_func( $atts ) {
	
	ob_start();

	get_template_part( 'inc/equipment' );

	return ob_get_clean();
}
add_shortcode( 'durango_equipment', 'durango_equipment_func' );

// [durango_artists]
function durango_artists_func( $atts ) {
	
	ob_start();

	get_template_part( 'inc/artists' );

	return ob_get_clean();
}
add_shortcode( 'durango_artists', 'durango_artists_func' );

// ********************************************************************** //