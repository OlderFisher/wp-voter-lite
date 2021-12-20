<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.alexlilik.icu
 * @since      1.0.0
 *
 * @package    Wp_Voter_Lite
 * @subpackage Wp_Voter_Lite/includes
 */

/**
 * Define the internationalization functionality.
 *
 * @since      1.0.0
 * @package    Wp_Voter_Lite
 * @subpackage Wp_Voter_Lite/includes
 * @author     Alex Lilik <lilik.aleksandr@gmail.com>
 */
class Wp_Voter_Lite_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'voterlite',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
