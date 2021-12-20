<?php

/**
 * @link              www.alexlilik.icu
 * @since             1.0.0
 * @package           Wp_Voter_Lite
 *
 * @wordpress-plugin
 * Plugin Name:       WP Voter Lite
 * Plugin URI:        www.alexlilik.icu/wp-voter-lite/
 * Description:       Votes and Quizzes on site pages. Lite version
 * Version:           1.0.0
 * Author:            Alex Lilik
 * Author URI:        www.alexlilik.icu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       voterlite
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_VOTER_LITE_VERSION', '1.0.0' );

/**
 * Plugin activation.
 */
function activate_wp_voter_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-voter-lite-activator.php';
	Wp_Voter_Lite_Activator::activate();
}

/**
 * Plugin deactivation.
 */
function deactivate_wp_voter_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-voter-lite-deactivator.php';
	Wp_Voter_Lite_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_voter_lite' );
register_deactivation_hook( __FILE__, 'deactivate_wp_voter_lite' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-voter-lite.php';

/**
 * Plugin Execution.
 * @since    1.0.0
 */
function run_wp_voter_lite() {

	$plugin = new Wp_Voter_Lite();
	$plugin->run();

}
run_wp_voter_lite();
