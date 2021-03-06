<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'/datatables.min.css',   'https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css', array(), $this->version, 'all' );



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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'/jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', array( 'jquery' ),  $this->version, true);

		wp_enqueue_script( $this->plugin_name.'/datatables',  plugin_dir_url( __FILE__ ) .'js/jquery.dataTables.js', array( 'jquery' ),  $this->version, true);
	}



	public function add_plugin_admin_menu() {

		/*
         * Add a settings page for this plugin to the Settings menu.
         *
         * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
         *
         *        Administration Menus: http://codex.wordpress.org/Administration_Menus
         *
         */


		add_menu_page( 'Translate24 Dashboard', 'Dashboard', 'manage_options', $this->plugin_name, array($this, 'display_translate24_dashboard')	);


		/*
		 *  Adds a submenu page that corresponds for every of the pages needed, e.g. "Tickets", "Operators", "Overview"...
		 *
		 */
		add_submenu_page($this->plugin_name, 'Tickets - Translate24', 'Tickets', 'manage_options', 'tickets',array($this, 'display_translate24_tickets')	 );

		/*
		 * Should be accessible only to super administrator
		 *
		 */
		add_submenu_page($this->plugin_name, 'Operators - Translate24 ', 'Operators', 'manage_options', 'operators',array($this, 'display_translate24_tickets')	 );



 	}



	public function add_action_links( $links ) {
		/*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */
		$settings_link = array('<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>', );
		return array_merge(  $settings_link, $links );

	}
	public function display_translate24_dashboard() {
		include_once( 'partials/plugin-name-admin-display.php' );
	}
	public function display_translate24_tickets() {
		include_once( 'partials/tickets-display.php' ); 
	}

	public function listTickets($operator_id = NULL){

		if($operator_id == NULL){




		}
		global $wpdb;

		$results = $wpdb->get_results("SELECT * FROM t24_tickets ");


		var_dump($results);
	}

}
