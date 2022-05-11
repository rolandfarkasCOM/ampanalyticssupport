<?php
/*
* Plugin Name: AMP Google Analytics 4 Support
* Plugin URI: https://github.com/rolandfarkasCOM/ampanalyticssupport/
* Description: Google Analytics 4 (GA4) AMP support plugin.
* Version: 1.0.3
* Author: Roland Farkas
* Author URI: https://rolandfarkas.com
* License GPLv3 or later
* Text Domain: ampanalyticssupport
* Requires at least: 4.9
* Requires PHP: 5.6
*
* @package ampanalyticssupport
*/



 // If this file is called directly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );


if ( !class_exists( 'ampanalyticssupportPlugin' ) ) {

	class ampanalyticssupportPlugin
	{


		public $plugin;

		function __construct() {
			$this->plugin = plugin_basename( __FILE__ );
		}

		function register() {
			add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
            add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
			
          
		}
        

		public function settings_link( $links ) {
			$settings_link = '<a href="admin.php?page=ampanalyticssupport">Settings</a>';
			array_push( $links, $settings_link );
			return $links;
		}
        public function add_admin_pages() {
            $page_title = 'AMP GA4 Support';
            $menu_title = 'AMP GA4 Support';
            $capability = 'manage_options';
            $menu_slug  = 'ampanalyticssupport';
            $function   = array( $this, 'admin_index' );
            $icon_url   = 'dashicons-analytics';
            $position   = 100;
          
            add_menu_page( $page_title,
                           $menu_title,
                           $capability,
                           $menu_slug,
                           $function,
                           $icon_url,
                           $position );
		}

		public function admin_index() {
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
		}

		function activate() {
			require_once plugin_dir_path( __FILE__ ) . 'inc/ampanalyticssupport-plugin-activate.php';
			$ampanalyticssupportActivate = new ampanalyticssupportActivate();
			$ampanalyticssupportActivate->activate();
			
		}

	}

	$ampanalyticssupportPlugin = new ampanalyticssupportPlugin();
	$ampanalyticssupportPlugin->register();
   
	// activation
	register_activation_hook( __FILE__, array( $ampanalyticssupportPlugin, 'activate' ) );

    register_setting( 'ampanalyticssupport-settings', 'ampanalyticssupport' );
}

function page_is_amp() {
	if ( function_exists( 'amp_is_request' ) ):
	  return amp_is_request();
	else :
	  return false;
	endif;
  }

// Check if the request is amp and if the amp plugin is active and insert analytics if required.
function ampanalyticssupport() {

    include_once ABSPATH . 'wp-admin/includes/plugin.php';
 
    if ( is_plugin_active( 'amp/amp.php' ) && page_is_amp()) {
        //plugin is activated

     echo '<amp-analytics type="googleanalytics" config="/wp-content/plugins/ampanalyticssupport/ga4.json" data-credentials="include">
            <script type="application/json">
            {
                "vars": {
                            "GA4_MEASUREMENT_ID": "'.get_option('ampanalyticssupport').'",
                            "GA4_ENDPOINT_HOSTNAME": "www.google-analytics.com",
                            "DEFAULT_PAGEVIEW_ENABLED": true,    
                            "GOOGLE_CONSENT_ENABLED": false,
                            "WEBVITALS_TRACKING": false,
                            "PERFORMANCE_TIMING_TRACKING": false
                }
            }
            </script>
            </amp-analytics>';   
      } 
}
add_action('wp_footer', 'ampanalyticssupport');



?>