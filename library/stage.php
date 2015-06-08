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

add_action( 'add_meta_boxes', 'stage_price_box' );

function stage_price_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'stage_price_box_content_nonce' );
  echo '<label for="stage_price"></label>';
  echo '<input type="text" id="stage_price" name="stage_price" placeholder="enter a price" />';
}

add_action( 'save_post', 'stage_price_box_save' );

function stage_price_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['stage_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $stage_price = $_POST['stage_price'];
  update_post_meta( $post_id, 'stage_price', $stage_price );
}

function stage_price_box() {
    add_meta_box( 
        'stage_price_box',
        __( 'Stage Price', 'myplugin_textdomain' ),
        'stage_price_box_content',
        'stage',
        'side',
        'high'
    );
}

function show_price($stage_id) {
	echo get_post_meta( $stage_id, 'stage_price', true );
}

?>