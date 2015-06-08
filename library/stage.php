<?php

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
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'has_archive'   => true,
  );

	register_post_type('stage', $args);
}

add_action('init', 'stage');

?>