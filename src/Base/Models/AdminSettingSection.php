<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base\Models;

class AdminSettingSection
{
    protected $settings = array();

    public function __construct( string $page_slug, array $settingSection )
    {
        $this->page = $page_slug;
        $this->id = $settingSection['id'];
        $this->title = $settingSection['title']; 
        $this->section_text = $settingSection['section_text']; 
        $this->option_group = $settingSection['option_group'];

        foreach( $settingSection['settings'] as $setting_data ) {
            $setting = new AdminSetting( $this->id, $this->page, $this->option_group, $setting_data );
            array_push( $this->settings, $setting );
        }
    }

    /**
     * Calls register method for any settings registered in the $settings property,
     * then calls register method this section.
     *
     * @return void
     */
    public function register()
    {
        foreach( $this->settings as $setting ) {
            $setting->registerSetting();
            $setting->registerField();
        }

        $this->registerSection();
    }

    /**
     * Registers this section in WordPress.
     *
     * @return void
     */
    public function registerSection()
    {
        add_settings_section(
            $this->id,
            $this->title,
            array( $this, 'callback' ),
            $this->page
        );
    }

    /**
     * Callback function for $this->registerSection().
     *
     * @return void
     */
    public function callback()
    {
        echo $this->section_text;
    }
}