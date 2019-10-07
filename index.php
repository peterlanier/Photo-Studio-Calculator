<?php
/*
Plugin Name: Photography Calculator
Description: A calculator for photography studio
Version:     0.1
Author:      Peter Lanier
Author URI:  https://developer.wordpress.org/
Text Domain: wporg
Domain Path: /languages
License:     GPL2
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if (is_admin()){
    require('admin/options.php');
} else {
	// require('shortcodes/shortcodes.php');
	require('tooltips.php');
}

require('gforms/hooks.php');

function photgralator_styles() 
{
    wp_enqueue_style( 'style', plugins_url( '/css/style.css', __FILE__ ) );
    // wp_enqueue_style( 'help-tip', plugins_url( '/css/help-tip.css', __FILE__ ) );
    wp_enqueue_script( 'style_script', plugins_url('/js/style-script.js', __FILE__), array('jquery'));
}
add_action('wp_enqueue_scripts', 'photgralator_styles');





function pg_dependencies() {

    wp_enqueue_script( 'popper', plugins_url( '/deps/popper.min.js', __FILE__ ), '', '', true );
    wp_enqueue_script( 'tooltip', plugins_url( '/deps/tooltip.min.js', __FILE__ ), array('popper'), '', true );
    // wp_enqueue_script('my-tooltips', plugins_url( '/js/tooltips.js', __FILE__ ), array('popper', 'tooltip'), '', true);
}
add_action( 'wp_enqueue_scripts', 'pg_dependencies' );
