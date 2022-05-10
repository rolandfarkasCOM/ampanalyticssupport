<?php
/**
 * @package  ampanalyticssupport
 */

 // If this file is called directly, abort!!!
 defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );


 // AMP request checker
class ampanalyticssupportInsert
{
	function page_is_amp() {
        if ( function_exists( 'amp_is_request' ) ):
          return amp_is_request();
        else :
          return false;
        endif;
      }
    
// Check if the request is amp and if the amp plugin is activve and insert analytics if required.
   function ampanalyticssupport() {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
 
    if ( is_plugin_active( 'amp/amp.php' ) && ampanalyticssupportInsert::page_is_amp() ) {
        //plugin is activated
    if( !function_exists("ampanalyticssupport") )
    {
            echo '<amp-analytics type="googleanalytics" config="'.WP_PLUGIN_DIR . '/ampanalyticssupport/ga4.json" data-credentials="include">
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
    }
    add_action('wp_footer', 'ampanalyticssupport');
         
   


}
 