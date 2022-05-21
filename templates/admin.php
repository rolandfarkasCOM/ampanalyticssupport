<?php
/**
 * @package  ampanalyticssupport
 */

 // If this file is called directly, abort!!!
 defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

 // Admin Content
?>
  <h1>AMP Google Analytics 4 Support</h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'ampanalyticssupport-settings' ); ?>
    <?php do_settings_sections( 'ampanalyticssupport-settings' ); ?>
    <table class="form-table">
      <tr valign="top">
      <th scope="row">GA4 MEASUREMENT ID:</th>
      <td><input type="text" name="ampanalyticssupport" value="<?php echo get_option('ampanalyticssupport'); ?>"/></td>
      </tr>
      <tr>
      <th scope="row">DEFAULT PAGEVIEW ENABLED:</th>
      <td><select name="ampanalyticssupport_pageview" id="ampanalyticssupport_pageview">
  <option value="true" <?php if(get_option('ampanalyticssupport_pageview') == "true" || get_option('ampanalyticssupport_pageview') == ""){echo "selected";}?>>True (Default)</option>
  <option value="false" <?php if(get_option('ampanalyticssupport_pageview') == "false"){echo "selected";}?>>False</option>
</select></td>
      </tr>
      <tr>
      <th scope="row">GOOGLE CONSENT ENABLED:</th>
      <td><select name="ampanalyticssupport_consent" id="ampanalyticssupport_consent">
  <option value="true" <?php if(get_option('ampanalyticssupport_consent') == "true"){echo "selected";}?>>True</option>
  <option value="false" <?php if(get_option('ampanalyticssupport_consent') == "false" || get_option('ampanalyticssupport_consent') == ""){echo "selected";}?>>False (Default)</option>
</select></td>
      </tr>
      <tr>
      <th scope="row">WEBVITALS TRACKING:</th>
      <td><select name="ampanalyticssupport_webvitals" id="ampanalyticssupport_webvitals">
  <option value="true" <?php if(get_option('ampanalyticssupport_webvitals') == "true"){echo "selected";}?>>True</option>
  <option value="false" <?php if(get_option('ampanalyticssupport_webvitals') == "false" || get_option('ampanalyticssupport_webvitals') == ""){echo "selected";}?>>False (Default)</option>
</select></td>
      </tr>
      <tr>
      <th scope="row">PERFORMANCE TIMING TRACKING:</th>
      <td><select name="ampanalyticssupport_performance" id="ampanalyticssupport_performance">
  <option value="true" <?php if(get_option('ampanalyticssupport_performance') == "true"){echo "selected";}?>>True</option>
  <option value="false" <?php if(get_option('ampanalyticssupport_performance') == "false" || get_option('ampanalyticssupport_performance') == ""){echo "selected";}?>>False (Default)</option>
</select></td>
      </tr>
    </table>
  <?php submit_button(); ?>
  </form>
  <h3>Preview:</h3>
  <pre><code><?php echo '{"vars": {"GA4_MEASUREMENT_ID": "'.get_option('ampanalyticssupport').'",
"GA4_ENDPOINT_HOSTNAME": "www.google-analytics.com",
"DEFAULT_PAGEVIEW_ENABLED": '.get_option('ampanalyticssupport_pageview').',    
"GOOGLE_CONSENT_ENABLED": '.get_option('ampanalyticssupport_consent').',
"WEBVITALS_TRACKING": '.get_option('ampanalyticssupport_webvitals').',
"PERFORMANCE_TIMING_TRACKING": '.get_option('ampanalyticssupport_performance').'}}';?></code></pre>