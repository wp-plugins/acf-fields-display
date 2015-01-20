<?php
/*
Plugin Name: ACF Field Display
Plugin URI: https://www.ltnow.com
Description: Useful addition that displays a list of all your ACF custom fields including their Label, Name, Type, and Field Group they are associated with.
Version: 1.0
Author: Lieberman Technologies
Author URI: https://www.ltnow.com
*/

if( !defined('ABSPATH') ){
	define('ABSPATH', dirname(__FILE__) . '/');
}
//define plugin path constant
define( 'AFD_URL', WP_PLUGIN_URL . '/acf-field-display' );

function lt_acf_field_display_init(){
	include('inc/acf-fld-opts.php');
}

function lt_acf_field_display_scripts(){
	wp_register_script('acf-fd-functions-js', AFD_URL . '/js/functions.js');
	wp_enqueue_script('acf-fd-functions-js');
	wp_register_script('tablesorter-js', AFD_URL . '/js/jquery.tablesorter.min.js');
	wp_enqueue_script('tablesorter-js');
	wp_register_style('table-style', AFD_URL . '/css/table.css');
	wp_enqueue_style('table-style');
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if(is_plugin_active('advanced-custom-fields/acf.php')){
	add_action('admin_enqueue_scripts', 'lt_acf_field_display_scripts');
	add_action('init', 'lt_acf_field_display_init');
}
