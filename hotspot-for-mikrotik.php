<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @package    Hotspot_For_Mikrotik
 * @author     Marius Bezuidenhout
 * @link       https://profiles.wordpress.org/mbezuidenhout/
 * @since      1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Hotspot for Mikrotik routers
 * Plugin URI:        https://github.com/mbezuidenhout/wordpress-hotspot-for-mirkotik
 * Description:       Replace the login.html page on your Mikrotik router and create your own hotspot login page.
 * Version:           1.0.0
 * Requires at least: 4.9
 * Tested up to:      5.7.0
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
 * The plugin file used in WordPress
 */
define( 'HOTSPOT_FOR_MIKROTIK_PLUGIN_FILE', __FILE__ );

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
