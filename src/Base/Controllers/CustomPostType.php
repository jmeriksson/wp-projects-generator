<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base\Controllers;

use Src\Base\Models;

/**
 * class CustomPostType
 * 
 * CustomPostType controller
 */
class CustomPostType
{
    protected $custom_post_types = array();

    public function __construct()
    {
        require_once( PROJECTS_GENERATOR_PLUGIN_PATH . 'src/assets/api/custom-post-types.php' );
        $this->custom_post_types = $custom_post_types_api;
    }

    /**
     * Loops through the custom post types in the API and registers them.
     * 
     * NOTE: Currently hooks flush_rewrite_rules to init. This is probably
     * not best practice since flush_rewrite_rules is a rather heavy operation
     * but I couldn't get the rewrite rules to be properly flushed in plugin
     * activation using the Src\Activate::activate method.
     *
     * @return void
     */
    public function register()
    {
        foreach ( $this->custom_post_types as $cpt_data ) {
            $custom_post_type = new Models\CustomPostType($cpt_data);
            add_action( 'init', array( $custom_post_type, 'register' ) );
            add_filter( 'single_template', array( $custom_post_type, 'getTemplatePath') );
            add_action( 'wp_enqueue_scripts', array( $custom_post_type, 'enqueueScripts' ) );
        }
        
        add_action( 'init', 'flush_rewrite_rules' );
    }
}