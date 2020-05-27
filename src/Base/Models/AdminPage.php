<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base\Models;

/**
 * class AdminPage
 * 
 * AdminPage model.
 */
class AdminPage
{
    protected $is_subpage;
    protected $parent_menu_slug;
    protected $page_title;
    protected $menu_title;
    protected $capabilities;
    protected $menu_slug;
    protected $icon_url;
    protected $position;
    protected $template_path;
    protected $custom_setting_sections;

    public function __construct( $admin_page_array )
    {
        $this->is_subpage = $admin_page_array['is_subpage'];
        $this->page_title = $admin_page_array['page_title'];
        $this->menu_title = $admin_page_array['menu_title'];
        $this->capabilities = $admin_page_array['capabilities'];
        $this->menu_slug = $admin_page_array['menu_slug'];
        $this->position = $admin_page_array['position'];
        $this->template_path = $admin_page_array['template_path'];

        if ( key_exists( 'icon_url', $admin_page_array ) ) {
            $this->icon_url = $admin_page_array['icon_url'];
        }

        if ( key_exists( 'custom_setting_sections', $admin_page_array ) ) {
            $this->custom_setting_sections = $admin_page_array['custom_setting_sections'];
        }

        if ( !$this->is_subpage ) {
            $this->parent_menu_slug = $this->menu_slug;
        }
    }

    /**
     * Registers this admin page. If this admin page is top level admin page,
     * it is added as both a menu page and a submenu page. Else, it is only
     * added as a submenu page.
     *
     * @return void
     */
    public function register()
    {
        if ( !$this->is_subpage ) {
            add_menu_page(
                $this->page_title,
                $this->menu_title,
                $this->capabilities,
                $this->menu_slug,
                array( $this, 'requireTemplate' ),
                $this->icon_url,
                $this->position
            );
            add_submenu_page(
                $this->parent_menu_slug,
                $this->page_title,
                $this->menu_title,
                $this->capabilities,
                $this->menu_slug,
                array( $this, 'requireTemplate' ),
                $this->position
            );
        } else {
            add_submenu_page(
                $this->parent_menu_slug,
                $this->page_title,
                $this->menu_title,
                $this->capabilities,
                $this->menu_slug,
                array( $this, 'requireTemplate' ),
                $this->position
            );
        }
    }

    /**
     * If this admin page has custom fields (retrieved from the API), they are
     * registered here.
     *
     * @return void
     */
    public function registerCustomFields()
    {
        if ( !isset( $this->custom_setting_sections ) ) {
            return;
        }

        foreach ( $this->custom_setting_sections as $section_data ) {
            $section = new AdminSettingSection($this->menu_slug, $section_data);
            $section->register();
        }
    }

    // NOTE: Simple methods such as setters and getters are left undocumented.

    public function requireTemplate()
    {
        require_once $this->template_path;
    }

    public function isSubpage()
    {
        return $this->is_subpage;
    }

    public function getMenuSlug()
    {
        return $this->menu_slug;
    }

    public function setParentMenuSlug(string $menu_slug)
    {
        $this->parent_menu_slug = $menu_slug;
    }
    
}