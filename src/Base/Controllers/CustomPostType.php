<?php
/**
 * @package ProjectsGenerator
 */

namespace Src\Base\Controllers;

/**
 * class CustomPostType
 */
class CustomPostType
{
    /**
     * Hooks the registerCustomPostTypes method to init.
     * 
     * NOTE: Currently hooks flush_rewrite_rules to init. I am not sure if this is best practice
     * but I couldn't get the rewrite rules to be properly flushed on plugin activation using the
     * Src\Activate::activate method.
     *
     * @return void
     */
    public function register()
    {
        add_action( 'init', array( $this, 'registerCustomPostTypes' ));
        add_action( 'init', 'flush_rewrite_rules' );
    }

    public function registerCustomPostTypes()
    {
        register_post_type( 'project', array(
            'public' => true,
            'label' => 'Projekt' 
        ) );
    }
}