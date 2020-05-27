<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package ProjectsGenerator
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  exit;
}

$custom_post_types = array( 'project' );
$custom_options = array( 'facebook_url', 'twitter_url', 'instagram_url', 'sidebar_title', 'sidebar_text', 'footer_text' );

global $wpdb;
global $table_prefix;

$posts = $table_prefix.'posts';
$meta = $table_prefix.'postmeta';
$relationships = $table_prefix.'term_relationships';
$options = $table_prefix.'options';

foreach($custom_post_types as $custom_post_type) {
    // Deletes all meta data related to the current post type from the DB.
    $wpdb->query( "DELETE FROM $meta WHERE post_id IN (SELECT id FROM $posts WHERE post_type = '$custom_post_type')" );

    // Deletes all relationships related to the current post type from the DB.
    $wpdb->query( "DELETE FROM $relationships WHERE object_id IN (SELECT id FROM $posts WHERE post_type = '$custom_post_type')" );

    // Deletes all posts with the current post type from the DB.
    $wpdb->query( "DELETE FROM $posts WHERE post_type = '$custom_post_type'" );
}

foreach( $custom_options as $custom_option ) {
    // Deletes the custom option added through the plugin.
    $wpdb->query( "DELETE FROM $options WHERE option_name = '$custom_option'" );
}

