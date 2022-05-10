<?php
/**
 * @package  ampanalyticssupport
 */

 // If this file is called directly, abort!!!
 defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

 // Admin Content
?>
  <h1>AMP G4 Support</h1>
  <form method="post" action="options.php">
    <?php settings_fields( 'ampanalyticssupport-settings' ); ?>
    <?php do_settings_sections( 'ampanalyticssupport-settings' ); ?>
    <table class="form-table">
      <tr valign="top">
      <th scope="row">GA4 MEASUREMENT ID:</th>
      <td><input type="text" name="ampanalyticssupport" value="<?php echo get_option('ampanalyticssupport'); ?>"/></td>
      </tr>
    </table>
  <?php submit_button(); ?>
  </form>