<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add desktop menu walker */
require_once( 'library/menu-walker.php' );

/** Add off-canvas menu walker */
require_once( 'library/offcanvas-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Header image */
require_once( 'library/custom-header.php' );

function show_date($stage_id) {
  echo get_post_meta( $stage_id, 'stage_date', true );
}

function show_hour($stage_id) {
  echo get_post_meta( $stage_id, 'stage_hour', true );
}

function show_meeting($stage_id) {
  echo get_post_meta( $stage_id, 'stage_meeting', true );
}

function show_maxpeople($stage_id) {
  echo get_post_meta( $stage_id, 'stage_maxpeople', true );
}

function show_price($stage_id) {
  echo get_post_meta( $stage_id, 'stage_price', true );
}

function show_district($stage_id) {
    echo get_post_custom_values('stage-district', $stage_id)[0];
}

?>