<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/mbezuidenhout/
 * @since      1.0.0
 *
 * @package    Hotspot_For_Mikrotik
 * @subpackage Hotspot_For_Mikrotik/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hotspot_For_Mikrotik
 * @subpackage Hotspot_For_Mikrotik/admin
 * @author     Marius Bezuidenhout <marius dot bezuidenhout at gmail dot com>
 */
class Hotspot_For_Mikrotik_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hotspot_For_Mikrotik_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hotspot_For_Mikrotik_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hotspot-for-mikrotik-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hotspot_For_Mikrotik_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hotspot_For_Mikrotik_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hotspot-for-mikrotik-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function plugin_section_text() {

    }

    public function hotspot_admin_username_text() {
        echo "Text";
    }

	/**
	 * Register plugin settings
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {
		add_settings_section( 'router_settings', 'Router Settings', [ $this, 'plugin_section_text' ], 'mikrotik_hotspot_plugin' );

		add_settings_field( 'hotspot_admin_username', 'Hotspot Admin Username', [ $this, 'hotspot_admin_username_text' ], 'mikrotik_hotspot_plugin', 'router_settings' );
		register_setting( 'mikrotik_hotspot_plugin_options', 'hotspot_admin_username' );
	}

	/**
	 * Add plugin settings page.
	 *
	 * @since    1.0.0
	 */
	public function add_settings_page() {
		add_options_page( __('Mikrotik Hotspot Settings'), __('Mikrotik Hotspot'), 'manage_options', 'mikrotik-hotspot-settings', [ $this, 'render_settings_page' ] );
	}

	public function render_settings_page() {
		?>
        <div class="wrap">
		<h1>Settings page title</h1>
		<form action="options.php" method="post">
			<?php
			settings_fields( 'mikrotik_hotspot_plugin_options' );
			do_settings_sections( 'mikrotik_hotspot_plugin' );
            submit_button();
            ?>
		</form>
        </div>
		<?php
	}
}
