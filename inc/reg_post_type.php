<?php
$single = strtolower($single);
$label_single = ucfirst($single);
$single = str_replace(' ', '_', $single);
$plural = ucfirst(strtolower($plural));
	$labels = array(
		'name'               => _x( $plural, 'post type general name', 'wobble' ),
		'singular_name'      => _x( $label_single, 'post type singular name', 'wobble' ),
		'menu_name'          => _x( $plural, 'admin menu', 'wobble' ),
		'name_admin_bar'     => _x( $label_single, 'add new on admin bar', 'wobble' ),
		'add_new'            => _x( 'Add New', 'slide', 'wobble' ),
		'add_new_item'       => __( "Add New $label_single", 'wobble' ),
		'new_item'           => __( "New $label_single", 'wobble' ),
		'edit_item'          => __( "$label_single Settings", 'wobble' ),
		'view_item'          => __( "View $label_single", 'wobble' ),
		'all_items'          => __( "All $plural", 'wobble' ),
		'search_items'       => __( "Search $plural", 'wobble' ),
		'parent_item_colon'  => __( "Parent $label_single:", 'wobble' ),
		'not_found'          => __( "No $plural found.", 'wobble' ),
		'not_found_in_trash' => __( "No $plural found in Trash.", 'wobble' )
	);	

function wobblex_post_type_init() {
global $labels;
global $single;
global $args;
if(!$args) {
	$args = array(
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null
	);
}

$args['labels'] = $labels;
$args['rewrite'] = $single;

	$labels = array(
		'name'              => _x( 'wxSliders', 'taxonomy general name' ),
		'singular_name'     => _x( 'wxSlider', 'taxonomy singular name' ),
		'search_items'      => __( 'Search wxSliders' ),
		'all_items'         => __( 'All wxSliders' ),
		'parent_item'       => __( 'Parent wxSlider' ),
		'parent_item_colon' => __( 'Parent wxSlider:' ),
		'edit_item'         => __( 'Edit wxSlider' ),
		'update_item'       => __( 'Update wxSlider' ),
		'add_new_item'      => __( 'Add New wxSlider' ),
		'new_item_name'     => __( 'New wxSlider Name' ),
		'menu_name'         => __( 'wxSliders' ),
	);
  

	register_post_type( $single, $args );
	   register_taxonomy( 	
        'wxsliders',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        $single,        //post type name
        array(  
        	'labels' => $labels,
            'hierarchical' => true,  
            'label' => 'wxsliders',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'wxsliders', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    ); 
}
add_action( 'init', 'wobblex_post_type_init' );