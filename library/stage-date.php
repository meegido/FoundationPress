<?php

add_action( 'add_meta_boxes', 'stage_date_box' );

function stage_date_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'stage_date_box_content_nonce' );
  echo '<label for="stage_date"></label>';
  echo '<input type="text" id="stage_date" name="stage_date" placeholder="enter a date" />';
}

add_action( 'save_post', 'stage_date_box_save' );

function stage_date_box_save( $post_id ) {

  // if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  // return;

  if ( !wp_verify_nonce( $_POST['stage_date_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $stage_date = $_POST['stage_date'];
  update_post_meta( $post_id, 'stage_date', $stage_date );
}

function stage_date_box() {
    add_meta_box( 
        'stage_date_box',
        __( 'Stage date', 'myplugin_textdomain' ),
        'stage_date_box_content',
        'stage',
        'side',
        'high'
    );
}

?>