<?php
/**
 * Plugin Name: Bizink Client KeyDates - Australia
 * Description: Bizink Client KeyDates - Australia by Bizink
 * Plugin URI: https://bizinkonline.com
 * Author: Bizink
 * Author URI: https://bizinkonline.com
 * Version: 1.0
 * Text Domain: bizink-client-keydates
 * Domain Path: /languages
 */

function keydates_settings_fields( $fields, $section ) {

	if ( 'bizink-client_basic' != $section['id'] ) return $fields;
	
	$fields['keydates_content_page'] = array(
		'id'      => 'keydates_content_page',
		'label'     => __( 'Bizink Client KeyDates', 'bizink-client' ),
		'type'      => 'select',
		'desc'      => __( 'Select the page to show the content. This page must contain the <code>[bizink-content]</code> shortcode.', 'bizink-client' ),
		'options'	=> cxbc_get_posts( [ 'post_type' => 'page' ] ),
		// 'chosen'	=> true,
		'required'	=> true,
	);

	return $fields;
}
add_filter( 'cx-settings-fields', 'keydates_settings_fields', 10, 2 );

function keydates_content( $types ) {
	$types[] = [
		'key' 	=> 'keydates_content_page',
		'type'	=> 'keydates-content'
	];

	return $types;
}
add_filter( 'bizink-content-types', 'keydates_content' );

function keydates_country(){
	return 'AUS';
}
add_filter('bizink-keydates-country', 'keydates_country' );

function keydates_master_site_url() {
	return 'https://bizinkcontent.com/';
}
add_filter('bizink-keydates-url', 'keydates_master_site_url' );