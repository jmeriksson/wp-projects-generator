<?php
/**
 * @package ProjectsGenerator
 */

namespace Src;

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
    private static $controllers = [ 
        Base\Controllers\CustomPostType::class,
        Base\Controllers\AdminPage::class
    ];

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
     * Instatiate a controller class object and returns it.
     *
     * @param [class] $class The controller class to be instatiated
     * @return class an instantiated controller
     */
    public static function instantiateController( $class )
    {
        $controller = new $class();

        return $controller;
    }

    // NOTE: Simple methods such as setters and getters are left undocumented.

    public static function getControllers()
    {
        return self::$controllers;
    }
}