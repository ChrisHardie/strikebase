<?php
/**
 * Projects CPT (and related taxonomies)
 *
 * @package strikebase
 */

class Strikebase_Project {

	/**
	 * Singleton holder
	 */
	private static $__instance = null;

	/**
	 * Class variables
	 */
	private $cpt = 'project';

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
	 * Add those actions to the init hook when the class is instantiated.
	 */
	private function __construct() {
		add_action( 'init', array( $this, 'register_CPT' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ) );
	}

	/**
	 * Register CPT and related taxonomies.
	 *
	 * @action init
	 * @return null
	 */
	public function register_CPT() {
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

	public function register_taxonomies() {
		$labels = array(
			'name'                       => _x( 'Project Status', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => _x( 'Project Status', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => __( 'Project Status', 'strikebase' ),
			'all_items'                  => __( 'All Project Statuses', 'strikebase' ),
			'new_item_name'              => __( 'New Project Status', 'strikebase' ),
			'add_new_item'               => __( 'Add New Project Status', 'strikebase' ),
			'edit_item'                  => __( 'Edit Project Status', 'strikebase' ),
			'update_item'                => __( 'Update Project Status', 'strikebase' ),
			'view_item'                  => __( 'View Project Status', 'strikebase' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'strikebase' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => __( 'Popular Statuses', 'strikebase' ),
			'search_items'               => __( 'Search Statuses', 'strikebase' ),
			'not_found'                  => __( 'Not Found', 'strikebase' ),
			'no_terms'                   => __( 'No items', 'strikebase' ),
			'items_list'                 => __( 'Statuses list', 'strikebase' ),
			'items_list_navigation'      => __( 'Statuses list navigation', 'strikebase' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
		register_taxonomy( 'project-status', array( 'project' ), $args );
	}

}
Strikebase_Project::get_instance();
