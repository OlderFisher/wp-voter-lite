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
	const WP_VOTER_TEXT_DOMAIN = 'alwp_voterlite';


	const META_BOX_TITLES = '_alwp_voterlite_titles' ;
	const META_BOX_SETTINGS = '_alwp_voterlite_settings' ;
	const META_BOX_STATISTICS = '_alwp_voterlite_statistics' ;

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

	/**
	 * Create voterlite Custom Post Type.
	 *
	 * @since    1.0.0
	 */
	public function register_voterlite_post_type(){
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
			'show_in_rest'        => false,
			'rest_base'           => true,
			'supports'            => [ 'title' ],
		] );
		flush_rewrite_rules();
	}

	/**
	 * Add admin menu for voterlite Custom Post Type.
	 *
	 * @since    1.0.0
	 */
	public function add_voterlite_admin_menu() {
		add_menu_page( __('WP Voter Lite',self::WP_VOTER_TEXT_DOMAIN), __('WP Voter Lite',self::WP_VOTER_TEXT_DOMAIN), 'edit_posts', 'edit.php?post_type='.self::POST_TYPE, '', "dashicons-chart-line", 9 );
		add_submenu_page('edit.php?post_type='.self::POST_TYPE,'', 'Votes', 'edit_posts', 'edit.php?post_type='.self::POST_TYPE) ;
	}
	/**
	 * Add contextual help to admin menu bar for voterlite Custom Post Type adding or editing.
	 *
	 * @since    1.0.0
	 */
	public function display_voterlite_contextual_help($contextual_help, $screen_id, $screen ){
		if ( $screen->post_type !== self::POST_TYPE ) {
			return;
		}else {
			$contextual_help .=
				'<p>' . __('Things to remember when adding or editing a vote:', self::WP_VOTER_TEXT_DOMAIN) . '</p>' .
				'<ul>' .
				'<li>' . __('Specify the title for your Vote.', self::WP_VOTER_TEXT_DOMAIN) . '</li>' .
				'<li>' . __('Specify the Vote Question.', self::WP_VOTER_TEXT_DOMAIN) . '</li>' .
				'<li>' . __('Specify the comments to Vote Question. They will display', self::WP_VOTER_TEXT_DOMAIN) . '</li>' .
				'<li>' . __('Specify answers to Vote Question (maximium 3) for Lite  version. They will display to choose.', self::WP_VOTER_TEXT_DOMAIN) . '</li>' .
				'</ul>' .
				'<p><strong>' . __('For more information:',self::WP_VOTER_TEXT_DOMAIN) . '</strong></p>' .
				'<p>' . __('<a href="https://codex.wordpress.org/Posts_Edit_SubPanel" target="_blank">Edit Posts Documentation</a>', self::WP_VOTER_TEXT_DOMAIN) . '</p>' .
				'<p>' . __('<a href="https://wordpress.org/support/" target="_blank">Support Forums</a>', self::WP_VOTER_TEXT_DOMAIN) . '</p>' ;

		}
		return $contextual_help ;
	}

	/**
	 * Add metabox with Vote settings for voterlite Custom Post Type.
	 *
	 * @since    1.0.0
	 */
	public function add_voterlite_meta_boxes(  $post )  {
		add_meta_box(
			'voterlite_meta_box',
			'Vote Settings',
			array($this,'voterlite_display_meta_box'),
			self::POST_TYPE,
			'normal',
			'default',
		);
		add_meta_box(
			'voterlite_stat_box',
			'Vote Statistics',
			array($this,'voterlite_display_statistic_meta_box'),
			self::POST_TYPE,
			'normal',
			'default',
		);

	}

	/**
	 * Render metabox with the Settings for voterlite  Custom Post Type adding or editing.
	 *
	 * @since    1.0.0
	 */

	public function voterlite_display_meta_box( $post ) {

//		TODO get settings to display
		wp_nonce_field( basename( __FILE__ ), 'voterlite_meta_box_nonce' );
		// vote settings render
		require_once plugin_dir_path( __DIR__ ) . 'admin/partials/cpt-render-metabox.php';

	}

	/**
	 * Render metabox with the Statistics Results  of voterlite  Custom Post Type Vote.
	 *
	 * @since    1.0.0
	 */

	public function voterlite_display_statistic_meta_box( $post ){

	}

	/**
	 * Save CPT options from metabox .
	 *
	 * @since    1.0.0
	 */

	public function save_voterlite_vote_post( $post_id ){

		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = false;
		if ( isset( $_POST[ 'voterlite_meta_box_nonce' ] ) ) {
			if ( wp_verify_nonce( $_POST[ 'voterlite_meta_box_nonce' ], basename( __FILE__ ) ) ) {
				$is_valid_nonce = true;
			}
		}
		if ( $is_autosave || $is_revision || !$is_valid_nonce ) return;

		wp_send_json($_POST);

		if ( array_key_exists( 'voterlite_meta_box', $_POST ) ) {



//			update_post_meta(
//				$post_id,                                            // Post ID
//				'_myplugin_meta_key',                                // Meta key
//				sanitize_text_field( $_POST[ 'myplugin-meta-box' ] ) // Meta value
//			);


		}


	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		if ( get_current_screen()->id === self::POST_TYPE ) {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-voter-lite-admin.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		if ( get_current_screen()->id === self::POST_TYPE ) {
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-voter-lite-admin.js', array( 'jquery' ), $this->version, false );
		}
	}

}
