<?php

add_action( 'add_meta_boxes', 'stage_maxpeople_box' );

function stage_maxpeople_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'stage_maxpeople_box_content_nonce' );
  echo '<label for="stage_maxpeople"></label>';
  echo '<input type="text" id="stage_maxpeople" name="stage_maxpeople" placeholder="enter a maxpeople" />';
}

add_action( 'save_post', 'stage_maxpeople_box_save' );

function stage_maxpeople_box_save( $post_id ) {

  // if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  // return;

  if ( !wp_verify_nonce( $_POST['stage_maxpeople_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $stage_maxpeople = $_POST['stage_maxpeople'];
  update_post_meta( $post_id, 'stage_maxpeople', $stage_maxpeople );
}

function stage_maxpeople_box() {
    add_meta_box( 
        'stage_maxpeople_box',
        __( 'Stage maxpeople', 'myplugin_textdomain' ),
        'stage_maxpeople_box_content',
        'stage',
        'side',
        'high'
    );
}

?>