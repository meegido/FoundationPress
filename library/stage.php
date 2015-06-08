<?php

function routes_taxonomy() {
	$labels = array(
	   'name'              => _x( 'Stage Categories', 'taxonomy general name' ),
	   'singular_name'     => _x( 'Stage Category', 'taxonomy singular name' ),
	   'search_items'      => __( 'Search Stage Categories' ),
	   'all_items'         => __( 'All Stage Categories' ),
	   'parent_item'       => __( 'Parent Stage Category' ),
	   'parent_item_colon' => __( 'Parent Stage Category:' ),
	   'edit_item'         => __( 'Edit Stage Category' ), 
	   'update_item'       => __( 'Update Stage Category' ),
	   'add_new_item'      => __( 'Add New Stage Category' ),
	   'new_item_name'     => __( 'New Stage Category' ),
	   'menu_name'         => __( 'Stage Categories' ),
	 );

  $args = array(
     'labels' => $labels,
     'hierarchical' => true,
   );
  
  register_taxonomy( 'stage_category', 'stage', $args );
}

add_action( 'init', 'routes_taxonomy', 0 );

function stage() {
	$labels = array(
    'name'               => _x( 'Stages', 'post type general name' ),
    'singular_name'      => _x( 'Stage', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Stage' ),
    'edit_item'          => __( 'Edit Stage' ),
    'new_item'           => __( 'New Stage' ),
    'all_items'          => __( 'All Stages' ),
    'view_item'          => __( 'View Stage' ),
    'search_items'       => __( 'Search Stages' ),
    'not_found'          => __( 'No stages found' ),
    'not_found_in_trash' => __( 'No stages found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Stages'
  );

	$args = array(
    'labels'        => $labels,
    'description'   => 'Stages',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'stage_category' ),
    'has_archive'   => true,
  );

	register_post_type('stage', $args);
}

add_action('init', 'stage');

?>