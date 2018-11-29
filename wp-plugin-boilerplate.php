<?php
/**
 * Plugin Name: WP Plugin Boilerplate
 * Plugin URI: https://github.com/wpeverest/wp-plugin-boilerplate
 * Description: Bootstrap for creating a WordPress plugin using Webpack and Git.
 * Version: 1.0.0
 * Author: WPEverest
 * Author URI: https://wpeverest.com
 * License: GPLv3 or later
 * Text Domain: wp-plugin-boilerplate
 * Domain Path: /languages/
 *
 * @package WP_Plugin_Boilerplate
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue scripts
 *
 * @param string $handle Script name
 * @param string $src Script url
 * @param array $deps (optional) Array of script names on which this script depends
 * @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
 * @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
 */
function wppb_enqueue_scripts() {
	wp_enqueue_script( 'wp-plugin-boilerplate', plugin_dir_url( __FILE__ ) . 'assets/js/admin.build.js', array( 'jquery' ), false, false );
}
add_action( 'wp_enqueue_scripts', 'wppb_enqueue_scripts' );
