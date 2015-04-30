<?php
/**
 * Plugin Name: Wobble Sliderx
 * Description: Customisable Slider
 * Author: Richard Miles
 * Version: 0.1
 * Author URI: http://wobble.co.za
 */
error_reporting(E_ALL);
if (! defined( 'CMB_DEV')) {
	require_once( 'cmb/custom-meta-boxes.php' );
}

require_once( 'inc/cmb.php' );
require_once( 'inc/category_options.php' );
add_action( 'admin_enqueue_scripts', 'wobble_sliderx_enqueue_color_picker' );
function wobble_sliderx_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');
	wp_enqueue_style( 'font-picker-style', plugins_url( 'css/fontawesome-iconpicker.min.css', __FILE__ ) );
	wp_enqueue_script( 'font-picker-js',  plugins_url( 'js/fontawesome-iconpicker.min.js', __FILE__ ) , array('jquery'), '1.0.0', true );
	
}

add_action( 'wp_enqueue_scripts', 'wobble_sliderx_scripts' );

function wobble_sliderx_scripts() {
	wp_enqueue_style( 'bxslider-css', plugins_url( 'css/bxslider.css', __FILE__ ) );
	wp_enqueue_script( 'bxslider-js',  plugins_url( 'js/bxslider.min.js', __FILE__ ) , array('jquery'), '1.0.0', true );	
}

// [wxslides slug="foo-value"]
function wobblex_slides_func( $atts ) {

  // query_posts( array( 'post_type' => 'listing', 'listing_category' => 'acupuncture-naturopathic' ) );
	$posts_array = get_posts( $atts );
	$a = shortcode_atts( array(
		'slug' => 'slideshow'
		), $atts );
	if (!query_posts( array( 'post_type' => 'wxslide' ,'wxslider' => $a['slug'] ) )) {
		echo  'No Slideshows could be found';
		return;
	}
	require_once( 'template/shortcode.php' );
}
add_shortcode( 'wxslider', 'wobblex_slides_func' );

//Single name for Post Type
$single = 'wxslide';
//Plural Name for post type
$plural = 'wxslides';

$args = array(
	'public'             => true,
	'publicly_queryable' => true,
	'show_ui'            => true,
	'show_in_menu'       => true,
	'query_var'          => true,
	'capability_type'    => 'post',
	'has_archive'        => true,
	'hierarchical'       => false,
	'menu_position'      => null,
	'supports'           => array('title'),
	'menu_icon' 		 => 'dashicons-images-alt2'
	);

require_once 'inc/reg_post_type.php';