<?php
/**
 * @package ProjectsGenerator
 */

namespace Src;

/**
 * class Main
 */
class Main
{
    public static function register() 
    {
        add_action( 'init', array('Src\Main', 'generateCustomPostType' ) );
    }

    public static function activate()
    {
        flush_rewrite_rules();
    }

    public static function deactivate()
    {
        flush_rewrite_rules();
    }

    public static function generateCustomPostType(): void 
    {
        register_post_type( 'project', array(
            'public'  =>  true,
            'label'   =>  'Projekt'
        ) );
    }
}