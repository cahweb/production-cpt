<?php

/*
 *
 * Plugin Name: Common - 
 * Description: 
 * Author: Austin Tindle
 *
 */

/* Custom Post Type ------------------- */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Load our CSS
function production_load_plugin_css() {
    wp_enqueue_style( 'production-plugin-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action( 'admin_enqueue_scripts', 'production_load_plugin_css' );

// Add create function to init
add_action('init', 'production_create_type');

// Create the custom post type and register it
function production_create_type() {
	$args = array(
	      'label' => 'Productions',
	        'public' => true,
	        'show_ui' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'rewrite' => array('slug' => 'production'),
			'menu_icon'  => 'dashicons-tickets-alt',
	        'query_var' => true,
	        'supports' => array(
	            'title',
	            'thumbnail')
	    );
	register_post_type( 'production' , $args );
}

add_action("admin_init", "production_init");
add_action('save_post', 'production_save');

// Add the meta boxes to our CPT page
function production_init() {
	add_meta_box("production-required-meta", "Required Information", "production_meta_required", "production", "normal", "high");
}

// Meta box functions
function production_meta_required() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    // Form markup 
    include_once('views/required.php');
}

// Save our variables
function production_save() {
	global $post;

	update_post_meta($post->ID, "production", $_POST["production"]);
}

// Settings array. This is so I can retrieve predefined wp_editor() settings to keep the markup clean
$settings = array (
	'sm' => array('textarea_rows' => 3),
	'md' => array('textarea_rows' => 6),
);


?>