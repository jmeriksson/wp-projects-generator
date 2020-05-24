<?php
/**
 * @package ProjectsGenerator
 */

/**
 * An array of all custom post types that will be generated.
 */
$custom_post_types_api = array(
    array(
        'name' => 'project',
        'label' => 'Projekt',
        'labels' => array(
            'name' => 'Projekt',
            'singular_name' => 'Projekt',
            'add_new' => 'Lägg till projekt',
            'add_new_item' => 'Lägg till projekt',
            'edit_item' => 'Redigera projekt',
            'new_item' => 'Projekt',
            'view_item' => 'Visa projekt',
            'view_items' => 'Visa projekt',
            'search_items' => 'Sök projekt',
            'not_found' => 'Inga projekt hittades',
            'not_found_in_trash' => 'Inga projekt hittades i papperskorgen',
            'all_items' => 'Alla projekt'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'has_archive' => true,
        'template_path' => PROJECTS_GENERATOR_PLUGIN_PATH . 'src/assets/custom-post-types/project/template/project-single.php',
        'stylesheet_url' => PROJECTS_GENERATOR_PLUGIN_URL . 'src/assets/custom-post-types/project/styles/project-style.css',
        'scripts_url' => PROJECTS_GENERATOR_PLUGIN_URL . 'src/assets/custom-post-types/project/scripts/project-script.js'
    )
);