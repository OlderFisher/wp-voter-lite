<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.alexlilik.icu
 * @since      1.0.0
 *
 * @package    Wp_Voter_Lite
 * @subpackage Wp_Voter_Lite/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Voter_Lite
 * @subpackage Wp_Voter_Lite/admin
 * @author     Alex Lilik <lilik.aleksandr@gmail.com>
 */
class Wp_Voter_Lite_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The custom post type of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @const    string    POST_TYPE    Generated post type.
	 */
	const POST_TYPE = 'voterlite';

	/**
	 * The admin menu slug of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @const    string    POST_TYPE_MENU_SLUG   Post type admin menu slug.
	 */
	const POST_TYPE_MENU_SLUG = 'wp_voterlite';

	/**
	 * The text domain of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @const    string    WP_VOTER_TEXT_DOMAIN   Post type admin menu slug.
	 */
	const WP_VOTER_TEXT_DOMAIN = 'voterlite';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function register_votes_post_type(){
		register_post_type( self::POST_TYPE, [
			'label'  =>  __('WP Voter Lite','voterlite'),
			'labels' => [
				'name'               => __('Votes',self::WP_VOTER_TEXT_DOMAIN),
				'singular_name'      => __('Vote',self::WP_VOTER_TEXT_DOMAIN),
				'add_new'            => __('Add Vote',self::WP_VOTER_TEXT_DOMAIN),
				'add_new_item'       => __('Adding Vote',self::WP_VOTER_TEXT_DOMAIN),
				'new_item'           => __('New Vote',self::WP_VOTER_TEXT_DOMAIN),
				'edit_item'          => __('Edit Vote',self::WP_VOTER_TEXT_DOMAIN),
				'view_item'          => __('View Vote',self::WP_VOTER_TEXT_DOMAIN),
				'search_items'       => __('Search Vote',self::WP_VOTER_TEXT_DOMAIN),
				'not_found'          => __('Vote Not Found',self::WP_VOTER_TEXT_DOMAIN),
				'not_found_in_trash' => __('Vote Not Found In Trash',self::WP_VOTER_TEXT_DOMAIN),
				'parent_item_colon'  => '',
				'menu_name'          => 'WP Voter Lite',
			],
			'description'         => __('Custom post type to create Votes',self::WP_VOTER_TEXT_DOMAIN),
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_nav_menus'   => true,
			'show_in_menu'        => self::POST_TYPE_MENU_SLUG,
			'show_in_rest'        => true,
			'rest_base'           => true,
			'supports'            => [ 'title','author' ],
		] );
		flush_rewrite_rules();
	}

	public function add_voter_admin_menu() {
		add_menu_page( __('WP Voter Lite',self::WP_VOTER_TEXT_DOMAIN), __('WP Voter Lite',self::WP_VOTER_TEXT_DOMAIN), 'edit_posts', 'edit.php?post_type='.self::POST_TYPE, '', "dashicons-chart-line", 9 );
		add_submenu_page('edit.php?post_type='.self::POST_TYPE,'', 'Votes', 'edit_posts', 'edit.php?post_type='.self::POST_TYPE) ;
	}

	public function votes_options_page(){
		if ( get_current_screen()->post_type !== self::POST_TYPE ) {
			return;
		}
		echo '<h1>RRRRRRRR</h1>' ;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Voter_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Voter_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-voter-lite-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Voter_Lite_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Voter_Lite_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-voter-lite-admin.js', array( 'jquery' ), $this->version, false );

	}

}
