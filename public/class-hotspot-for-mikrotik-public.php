<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/mbezuidenhout/
 * @since      1.0.0
 *
 * @package    Hotspot_For_Mikrotik
 * @subpackage Hotspot_For_Mikrotik/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Hotspot_For_Mikrotik
 * @subpackage Hotspot_For_Mikrotik/public
 * @author     Marius Bezuidenhout <marius dot bezuidenhout at gmail dot com>
 */
class Hotspot_For_Mikrotik_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hotspot-for-mikrotik-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hotspot-for-mikrotik-public.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Add routes used for event displays.
     */
    public function add_routes()
    {
        if ( ! class_exists( 'WP_Route' ) ) {
            require_once plugin_dir_path( __DIR__ ) . 'includes' . DIRECTORY_SEPARATOR . 'class-wp-route.php';
        }

        WP_Route::get( 'mikrotik/login', array( $this, 'get_login_page' ) );
    }

    /**
     * Usage: https://<server>/mikrotik/login?username=<username>&password=<password>&product_id=<product_id>
     *
     * @throws Exception
     */
    public function get_login_page()
    {
        $defaults = array(
            'username'   => '',
            'password'   => '',
            'product_id' => null,
        );
        include plugin_dir_path( __DIR__ ) . 'templates' . DIRECTORY_SEPARATOR . 'login.php';
    }
}
