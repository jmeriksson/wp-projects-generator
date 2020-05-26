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
    protected $page_title;
    protected $menu_title;
    protected $capabilities;
    protected $menu_slug;
    protected $icon_url;
    protected $position;
    protected $template_path;

    public function __construct( $admin_page_array )
    {
        $this->page_title = $admin_page_array['page_title'];
        $this->menu_title = $admin_page_array['menu_title'];
        $this->capabilities = $admin_page_array['capabilities'];
        $this->menu_slug = $admin_page_array['menu_slug'];
        $this->icon_url = $admin_page_array['icon_url'];
        $this->position = $admin_page_array['position'];
        $this->template_path = $admin_page_array['template_path'];
    }

    /**
     * Registers this admin page.
     *
     * @return void
     */
    public function register()
    {
        add_menu_page(
            $this->page_title,
            $this->menu_title,
            $this->capabilities,
            $this->menu_slug,
            array( $this, 'addTemplate' ),
            $this->icon_url,
            $this->position
        );
    }

    /**
     * Requires the template of this admin page.
     *
     * @return void
     */
    public function addTemplate()
    {
        require_once $this->template_path;
    }
    
}