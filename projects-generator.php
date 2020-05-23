<?php
/**
 * @package ProjectsGenerator
 */

/*
 Plugin Name:     Projects Generator
 Plugin URI:      https://github.com/jmeriksson/wp-projects-generator.git
 Description:     A simple WordPress plugin that generates a 'project' custom post type with predefined styling.
 Version:         1.0.0
 Author:          Mikael Eriksson
 Author URI:      https://mikaeleriksson.nu
 License:         GPL-3.0+
 LicenseURI:      https://www.gnu.org/licenses/gpl-3.0.txt
 */

 // Prevents public access to the plugin via URL  
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Defines an access name to the plugin's path
define( 'PROJECTS_GENERATOR_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

if ( file_exists( PROJECTS_GENERATOR_PLUGIN_PATH . 'vendor/autoload.php' ) ) {
    require_once( PROJECTS_GENERATOR_PLUGIN_PATH . 'vendor/autoload.php' );
}

use Src\Main;

if ( class_exists( 'Src\Main' ) ) {

    Main::register();

    // Plugin activation
    register_activation_hook( __FILE__, array( 'Src\Main', 'activate' ) );

    // Plugin deactivation
    register_deactivation_hook( __FILE__, array( 'Src\Main', 'deactivate' ) );

}