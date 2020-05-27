<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base\Controllers;

use Src\Base\Models;

/**
 * class AdminPage
 * 
 * AdminPage controller.
 */
class AdminPage
{
    protected $admin_pages = array();
    protected $parent_menu_slug = '';

    public function __construct()
    {
        require_once( PROJECTS_GENERATOR_PLUGIN_PATH . 'src/assets/api/admin-pages.php' );
        $this->admin_pages = $admin_pages_api;
    }

    /**
     * Loops through all admin pages in the API and registers them. If more
     * than one admin page exists in API, subpages is added. Then adds a
     * plugin settings action link which redirects to the first admin page
     * in the API. Also registers any custom setting fields that exists in
     * the API.
     *
     * @return void
     */
    public function register()
    {
        foreach ( $this->admin_pages as $admin_page_data ) {
            $admin_page = new Models\AdminPage($admin_page_data);

            if ( !$admin_page->isSubpage() ) {
                $this->parent_menu_slug = $admin_page->getMenuSlug();
            } else {
                $admin_page->setParentMenuSlug($this->parent_menu_slug);
            }

            add_action( 'admin_menu', array( $admin_page, 'register' ) );
            add_action( 'admin_init', array( $admin_page, 'registerCustomFields') );
        }
        add_action( 'plugin_action_links_' . PROJECTS_GENERATOR_PLUGIN_BASENAME, array( $this, 'addSettingsLink' ) );
    }

    /**
     * Creates a settings link and adds to the action links of the plugin. The created link
     * will redirect to the first admin page in the admin pages API.
     *
     * @param [array] $links
     * @return void
     */
    public function addSettingsLink ( array $links )
    {
        $settings_link = '<a href="admin.php?page=' . $this->admin_pages[0]['menu_slug'] . '">Inställningar</a>';
        array_push( $links, $settings_link);
        return $links;
    }
}