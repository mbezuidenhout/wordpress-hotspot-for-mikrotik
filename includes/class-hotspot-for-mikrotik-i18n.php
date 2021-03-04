<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://profiles.wordpress.org/mbezuidenhout/
 * @since      1.0.0
 *
 * @package    Hotspot_For_Mikrotik
 * @subpackage Hotspot_For_Mikrotik/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Hotspot_For_Mikrotik
 * @subpackage Hotspot_For_Mikrotik/includes
 * @author     Marius Bezuidenhout <marius dot bezuidenhout at gmail dot com>
 */
class Hotspot_For_Mikrotik_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'hotspot-for-mikrotik',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
