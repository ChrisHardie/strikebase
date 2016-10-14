<?php
/**
 * Projects CPT
 *
 */
class Strikebase_Project {
	/**
	 * Singleton holder
	 */
	private static $__instance = null;
	/**
	 * Class variables
	 */
	private $cpt = 'projects';
	/**
	 * Instantiate the singleton
	 */
	public static function get_instance() {
		if ( ! is_a( self::$__instance, __CLASS__ ) ) {
			self::$__instance = new self;
		}
		return self::$__instance;
	}
	/**
	 *
	 */
	private function __construct() {
		// Universal
		add_action( 'init', array( $this, 'action_init' ) );
	}
	/**
	 * Register post type plus additional, related rewrite rules
	 *
	 * @action init
	 * @return null
	 */
	public function action_init() {
		$cpt = array(
			'labels'              => array(
				'name'                => __( 'Projects', 'strikebase' ),
				'singular_name'       => __( 'Project', 'strikebase' ),
				'add_new'             => _x( 'Add New Project', 'strikebase', 'strikebase' ),
				'add_new_item'        => __( 'Add New Project', 'strikebase' ),
				'edit_item'           => __( 'Edit Project', 'strikebase' ),
				'new_item'            => __( 'New Project', 'strikebase' ),
				'view_item'           => __( 'View Project', 'strikebase' ),
				'search_items'        => __( 'Search Projects', 'strikebase' ),
				'not_found'           => __( 'No projects found', 'strikebase' ),
				'not_found_in_trash'  => __( 'No projects found in Trash', 'strikebase' ),
				'parent_item_colon'   => __( 'Project:', 'strikebase' ),
				'menu_name'           => __( 'Projects', 'strikebase' ),
			),
			'menu_icon'	      => 'dashicons-index-card',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => array(
				'with_front' => false,
				'slug'       => 'projects',
			),
			'capability_type'     => 'post',
			'supports'            => array(
				'title',
				'editor',
				'revisions'
			),
		);
		register_post_type( $this->cpt, $cpt );
	}
}
Strikebase_Project::get_instance();
