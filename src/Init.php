<?php
/**
 * @package ProjectsGenerator
 */

namespace Src;

use stdClass;

/**
 * class Init
 * 
 * This class is consciously constructed so that more than one controller could be added.
 */
class Init
{
    /**
     * Array of controllers for the plugin
     */
    private static $controllers = [ Base\Controllers\CustomPostType::class ];

    /**
     * Calls the register method (if exists) on all controllers.
     *
     * @return void
     */
    public static function register()
    {
        foreach (self::getControllers() as $controller) {
            $c = self::instantiateController($controller);
            if ( method_exists( $c, 'register' ) ) {
                $c->register();
            }
        }
    }

    /**
     * Returns the array of controller.
     *
     * @return array
     */
    public static function getControllers()
    {
        return self::$controllers;
    }

    /**
     * Instatiate a controller class object and returns it.
     *
     * @param [class] $class The controller class to be instatiated.
     * @return class
     */
    public static function instantiateController( $class )
    {
        $controller = new $class();

        return $controller;
    }

    /* public static function generateCustomPostType()
    {
        register_post_type( 'project', array(
            'public' => true,
            'label' => 'Projekt',
            'rewrite' => array(
                'slug' => 'projekt'
            )    
        ) );
    } */
}