<?php
/**
 * @package ProjectsGenerator
 */

/**
 * An array of all admin pages that will be generated.
 */
$admin_pages_api = array(
    array(
        'page_title' => 'Projects Generator Plugin',
        'menu_title' => 'Projects Generator',
        'capabilities' => 'manage_options',
        'menu_slug' => 'projects_generator_plugin',
        'icon_url' => 'dashicons-images-alt',
        'position' => 110,
        'template_path' => PROJECTS_GENERATOR_PLUGIN_PATH . 'src/assets/admin-templates/main-admin.php'
    )
);
