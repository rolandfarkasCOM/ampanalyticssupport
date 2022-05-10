<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  ampanalyticssupport
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear Database stored data
$plugininfo = get_posts( array( 'post_type' => 'ampanalyticssupport', 'numberposts' => -1 ) );

foreach( $plugininfo as $plugindata ) {
	wp_delete_post( $plugindata->ID, true );
}

// Access the database via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'ampanalyticssupport'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );