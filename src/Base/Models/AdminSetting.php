<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base\Models;

class AdminSetting
{
    public function __construct( string $section_id, string $page, string $option_group, array $setting )
    {
        $this->option_group = $option_group;
        $this->option_name = $setting['option_name'];
        $this->field_id = $setting['option_name'];
        $this->field_title = $setting['field_title'];
        $this->field_page = $page;
        $this->field_section = $section_id;
        $this->field_args = array(
            'label_for' => $this->field_id
        );
    }

    /**
     * Registers this setting in WordPress.
     *
     * @return void
     */
    public function registerSetting()
    {
        register_setting(
            $this->option_group,
            $this->option_name,
            array( $this, 'settingCallback' )
        );
    }

    /**
     * Registers this setting's field in WordPress.
     *
     * @return void
     */
    public function registerField()
    {
        add_settings_field(
            $this->option_name,
            $this->field_title,
            array( $this, 'fieldCallback' ),
            $this->field_page,
            $this->field_section,
            $this->field_args
        );
    }

    /**
     * Callback function for $this->registerSetting().
     * Currently only returns the input. Can be used to validate input.
     *
     * @param $input
     * @return void
     */
    public function settingCallback( $input )
    {
        return $input;
    }

    /**
     * Callback function for $this->registerField().
     * Echoes an input field for this setting.
     *
     * @return void
     */
    public function fieldCallback()
    {
        $value = esc_attr( get_option( $this->option_name ) );
        echo '<input type="text" class="regular-text" name="' . $this->option_name . '" value="' . $value . '">';
    }
}