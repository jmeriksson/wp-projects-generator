<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package ProjectsGenerator
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
  exit;
}

// Clear DB data
global $wpdb;
global $table_prefix;

$posts = $table_prefix.'posts';
$meta = $table_prefix.'postmeta';
$relationships = $table_prefix.'term_relationships';

// Deletes all meta data related to the 'project' post type from the DB.
$wpdb->query( "DELETE FROM $meta WHERE post_id IN (SELECT id FROM $posts WHERE post_type = 'project')" );

// Deleted all relationships related to the 'project' post type from the DB.
$wpdb->query( "DELETE FROM $relationships WHERE object_id IN (SELECT id FROM $posts WHERE post_type = 'project')" );

// Dete all posts with the 'project' post type from the DB.
$wpdb->query( "DELETE FROM $posts WHERE post_type = 'project'" );
