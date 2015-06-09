<?php

add_action( 'add_meta_boxes', 'stage_meeting_box' );

function stage_meeting_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'stage_meeting_box_content_nonce' );
  echo '<label for="stage_meeting"></label>';
  echo '<input type="text" id="stage_meeting" name="stage_meeting" placeholder="enter a meeting" />';
}

add_action( 'save_post', 'stage_meeting_box_save' );

function stage_meeting_box_save( $post_id ) {

  // if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  // return;

  if ( !wp_verify_nonce( $_POST['stage_meeting_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $stage_meeting = $_POST['stage_meeting'];
  update_post_meta( $post_id, 'stage_meeting', $stage_meeting );
}

function stage_meeting_box() {
    add_meta_box( 
        'stage_meeting_box',
        __( 'Stage meeting', 'myplugin_textdomain' ),
        'stage_meeting_box_content',
        'stage',
        'side',
        'high'
    );
}

?>