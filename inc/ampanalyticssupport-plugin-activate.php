<?php
/**
 * @package  ampanalyticssupport
 */

 // If this file is called directly, abort!!!
 defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );

class ampanalyticssupportActivate
{
	public static function activate() {
		flush_rewrite_rules();
	}
}