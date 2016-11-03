<?php
/*
 *
 * Plugin Name: Common - Production CPT
 * Description: Wordpress Plugin for Production Custom Post Type to be used on applicable UCF College of Arts and Humanities websites
 * Author: Austin Tindle & Alessandro Vecchi
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
	      	'taxonomies' => array('category'),
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
	add_meta_box("production-options-meta", "Options", "production_meta_options", "production", "normal", "high");
	add_meta_box("production-performances-meta", "Performances", "production_meta_performances", "production", "normal", "low");
	add_meta_box("production-synopsis-meta", "Synopsis", "production_meta_synopsis", "production", "normal", "low");
	add_meta_box("production-press-meta", "Press", "production_meta_press", "production", "normal", "low");
	add_meta_box("production-reading-meta", "Further Reading", "production_meta_reading", "production", "normal", "low");
	add_meta_box("production-program-meta", "Program", "production_meta_program", "production", "normal", "low");
}

// Meta box functions
function production_meta_options() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    // Form markup 
    include_once('views/options.php');
}

function production_meta_performances() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    // Form markup 
    include_once('views/performances.php');
}

function production_meta_synopsis() {
	global $post; // Get global WP post var
	global $settings;
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    wp_editor($custom['description'][0], 'description', $settings['md']);
}

function production_meta_press() {
	global $post; // Get global WP post var
	global $settings;
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    wp_editor($custom['press'][0], 'press', $settings['md']);
}

function production_meta_reading() {
	global $post; // Get global WP post var
	global $settings;
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    wp_editor($custom['furtherread'][0], 'furtherread', $settings['md']);
}

function production_meta_program() {
	global $post; // Get global WP post var
	global $settings;
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    wp_editor($custom['castcrew'][0], 'castcrew', $settings['md']);
}

// Save our variables
function production_save() {
	global $post;
	$i = 0;

	update_post_meta($post->ID, "subtitle", $_POST["subtitle"]);
	update_post_meta($post->ID, "blurb", $_POST["blurb"]);
	update_post_meta($post->ID, "venue", $_POST["venue"]);
	update_post_meta($post->ID, "venue_url", $_POST["venue_url"]);
	update_post_meta($post->ID, "start_date", $_POST["start_date"]);
	update_post_meta($post->ID, "end_date", $_POST["end_date"]);
	update_post_meta($post->ID, "description", $_POST["description"]);
	update_post_meta($post->ID, "press", $_POST["press"]);
	update_post_meta($post->ID, "furtherread", $_POST["furtherread"]);
	update_post_meta($post->ID, "castcrew", $_POST["castcrew"]);
	update_post_meta($post->ID, "ticket_url", $_POST["ticket_url"]);

	update_post_meta($post->ID, "num_dates", $_POST["num_dates"]);

	for($i = 0; $i < $_POST["num_dates"]; $i++) {
		update_post_meta($post->ID, "event_date_".$i, $_POST["event_date_".$i]);
		update_post_meta($post->ID, "event_start_".$i, $_POST["event_start_".$i]);
		update_post_meta($post->ID, "event_end_".$i, $_POST["event_end_".$i]);
		update_post_meta($post->ID, "event_url_".$i, $_POST["event_url_".$i]);
	}


}

// Settings array. This is so I can retrieve predefined wp_editor() settings to keep the markup clean
$settings = array (
	'sm' => array('textarea_rows' => 3),
	'md' => array('textarea_rows' => 6),
);


?>