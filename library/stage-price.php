<?php

add_action( 'add_meta_boxes', 'stage_price_box' );

function stage_price_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'stage_price_box_content_nonce' );
  echo '<label for="stage_price"></label>';
  echo '<input type="text" id="stage_price" name="stage_price" placeholder="enter a price" />';
}

add_action( 'save_post', 'stage_price_box_save' );

function stage_price_box_save( $post_id ) {

  // if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  // return;

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

?>