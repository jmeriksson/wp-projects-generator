<?php
/**
 * @package ProjectsGenerator
 */

/**
 * An array of all admin pages that will be generated.
 * 
 * IMPORTANT: ONLY THE FIRST ENTRY SHOULD HAVE is_subpage SET TO FALSE.
 * 
 * NOTE: ONLY THE PARENT PAGE (I.E. WHERE is_subpage = FALSE) NEED TO
 * HAVE icon_url. IT IS IGNORED FOR SUB PAGES (I.E. WHERE is_subpage = TRUE).
 */
$admin_pages_api = array(
    array(
        'is_subpage' => false,
        'page_title' => 'Projects Generator Plugin',
        'menu_title' => 'Projects Generator',
        'capabilities' => 'manage_options',
        'menu_slug' => 'projects_generator_plugin',
        'icon_url' => 'dashicons-images-alt',
        'position' => 110,
        'template_path' => PROJECTS_GENERATOR_PLUGIN_PATH . 'src/assets/admin-templates/main-admin.php'
    )
);
