<?php
/**
 * @package ProjectsGenerator
 */

/**
 * An array of all admin pages that will be generated.
 * 
 * IMPORTANT: Only yhe first entry should have is_subpage set til false.
 * 
 * NOTE: Only the parent page (i.e. where is_subpage = false) need to
 * have icon_url. It is ignored for subpages (i.e. where is_subpage = true).
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
        'template_path' => PROJECTS_GENERATOR_PLUGIN_PATH . 'src/assets/admin-templates/main-admin.php',
        'custom_setting_sections' => array(
            array(
                'id' => 'projects_generator_pluging_main',
                'title' => 'Globala inställningar',
                'section_text' => 'Här anger du inställningar som är globala för Project Generator Plugin.',
                'option_group' => 'projetcs_generator_plugin_main_options',
                'settings' => array(
                    array(
                        'option_name' => 'facebook_url', 
                        'field_title' => 'Facebook URL'
                    ),
                    array(
                        'option_name' => 'twitter_url',
                        'field_title' => 'Twitter URL'
                    ),
                    array(
                        'option_name' => 'instagram_url',
                        'field_title' => 'Instagram URL'
                    )
                )
            )
        )
    )
);
