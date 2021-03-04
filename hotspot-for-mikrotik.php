<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/mbezuidenhout/
 * @since             1.0.0
 * @package           Hotspot_For_Mikrotik
 *
 * @wordpress-plugin
 * Plugin Name:       Hotspot for Mikrotik routers
 * Plugin URI:        https://github.com/mbezuidenhout/wordpress-hotspot-for-mirkotik
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Requires at least: 4.9
 * Tested up to:      5.6.2
 * Author:            Marius Bezuidenhout
 * Author URI:        https://profiles.wordpress.org/mbezuidenhout/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hotspot-for-mikrotik
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HOTSPOT_FOR_MIKROTIK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-hotspot-for-mikrotik-activator.php
 */
function activate_hotspot_for_mikrotik() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hotspot-for-mikrotik-activator.php';
	Hotspot_For_Mikrotik_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-hotspot-for-mikrotik-deactivator.php
 */
function deactivate_hotspot_for_mikrotik() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-hotspot-for-mikrotik-deactivator.php';
	Hotspot_For_Mikrotik_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_hotspot_for_mikrotik' );
register_deactivation_hook( __FILE__, 'deactivate_hotspot_for_mikrotik' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-hotspot-for-mikrotik.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hotspot_for_mikrotik() {

	$plugin = new Hotspot_For_Mikrotik();
	$plugin->run();

}
run_hotspot_for_mikrotik();
