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

 // Prevents public access to the plugin via URL. 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Defines an access name to the plugin's path.
define( 'PROJECTS_GENERATOR_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

 // Defines an access name to the plugin's url.
define( 'PROJECTS_GENERATOR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Defines an access name to the plugin's basename.
define( 'PROJECTS_GENERATOR_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Requires the Composer Autoload.
if ( file_exists( PROJECTS_GENERATOR_PLUGIN_PATH . '/vendor/autoload.php' ) ) {
	require_once PROJECTS_GENERATOR_PLUGIN_PATH . '/vendor/autoload.php';
}

/**
 * Runs on plugin activation.
 *
 * @return void
 */
function activate_projects_generator_plugin() {
    Src\Base\Activate::activate();
}
register_activation_hook(  __FILE__, 'activate_projects_generator_plugin' );

/**
 * Runs on plugin deactivation.
 *
 * @return void
 */
function deactivate_projects_generator_plugin() {
    Src\Base\Deactivate::deactivate();
}
register_deactivation_hook(  __FILE__, 'deactivate_projects_generator_plugin' );

/**
 * Initializes the classes of the plugin.
 */
if ( class_exists( 'Src\\Init' ) ) {
    Src\Init::register();
}
