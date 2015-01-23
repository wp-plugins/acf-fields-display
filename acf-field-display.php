<?php
/*
Plugin Name: ACF Field Display
Plugin URI: https://www.ltnow.com
Description: Useful addition that displays a list of all your ACF custom fields including their Label, Name, Type, and Field Group they are associated with.
Version: 1.0
Author: Lieberman Technologies
Author URI: https://www.ltnow.com

The theme of this plugin is Buster Bluth. All functions and variables have to do with him.
*/

if( !defined('ABSPATH') ){
	define('ABSPATH', dirname(__FILE__) . '/');
}
//define plugin path constant
define( 'ARMY', WP_PLUGIN_URL . '/acf-fields-display' );

//Include the options page
function loose_seal(){
	include('inc/acf-fld-opts.php');
}

//Enqueue scripts
function for_my_next_magic_trick(){
	wp_register_script('acf-fd-functions-js', ARMY . '/js/functions.js');
	wp_enqueue_script('acf-fd-functions-js');
	wp_register_script('tablesorter-js', ARMY . '/js/jquery.tablesorter.min.js');
	wp_enqueue_script('tablesorter-js');
	wp_register_style('table-style', ARMY . '/css/table.css');
	wp_enqueue_style('table-style');
}

//Make sure that we can get to the plugin list
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//Check to see if ACF if added, and if so, hook into WP
if(is_plugin_active('advanced-custom-fields/acf.php')){
	add_action('admin_enqueue_scripts', 'for_my_next_magic_trick');
	add_action('init', 'loose_seal');
}
