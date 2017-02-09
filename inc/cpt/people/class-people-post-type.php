<?php

/**
 * People CPT (and related taxonomies)
 *
 * @package strikebase
 */
class Strikebase_Person {
	/**
	 * Singleton holder
	 */
	private static $__instance = null;
	/**
	 * Class variables
	 */
	private $cpt = 'person';

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
				'name'               => __( 'People', 'strikebase' ),
				'singular_name'      => __( 'Person', 'strikebase' ),
				'add_new'            => _x( 'Add New Person', 'strikebase', 'strikebase' ),
				'add_new_item'       => __( 'Add New Person', 'strikebase' ),
				'edit_item'          => __( 'Edit Person', 'strikebase' ),
				'new_item'           => __( 'New Person', 'strikebase' ),
				'view_item'          => __( 'View Person', 'strikebase' ),
				'search_items'       => __( 'Search People', 'strikebase' ),
				'not_found'          => __( 'No people found', 'strikebase' ),
				'not_found_in_trash' => __( 'No people found in Trash', 'strikebase' ),
				'parent_item_colon'  => __( 'Person:', 'strikebase' ),
				'menu_name'          => __( 'People', 'strikebase' ),
			),
			'menu_icon'           => 'dashicons-groups',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => array(
				'with_front' => false,
				'slug'       => 'people',
			),
			'capability_type'     => 'post',
			'supports'            => array(
				'title',
				'editor',
				'revisions',
			),
		);
		register_post_type( $this->cpt, $cpt );
	}

	public function register_taxonomies() {
		// Person organizationes
		$organization_labels = array(
			'name'                       => _x( 'Organization', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => _x( 'Organization', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => __( 'Organizations', 'strikebase' ),
			'all_items'                  => __( 'All Organizations', 'strikebase' ),
			'new_item_name'              => __( 'New Organization', 'strikebase' ),
			'add_new_item'               => __( 'Add New Organization', 'strikebase' ),
			'edit_item'                  => __( 'Edit Organization', 'strikebase' ),
			'update_item'                => __( 'Update Organization', 'strikebase' ),
			'view_item'                  => __( 'View Organization', 'strikebase' ),
			'separate_items_with_commas' => __( '', 'strikebase' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => __( 'Popular Organizations', 'strikebase' ),
			'search_items'               => __( 'Search Organizations', 'strikebase' ),
			'not_found'                  => __( 'Not Found', 'strikebase' ),
			'no_terms'                   => __( 'No items', 'strikebase' ),
			'items_list'                 => __( 'Organizations list', 'strikebase' ),
			'items_list_navigation'      => __( 'Organizations list navigation', 'strikebase' ),
		);
		$organization_args   = array(
			'labels'            => $organization_labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'show_tagcloud'     => false,
		);
		register_taxonomy( 'organization', array( $this->cpt, 'project' ), $organization_args );
		// Type of person
		$type_labels = array(
			'name'                       => _x( 'Type of Person', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => _x( 'Type of Person', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => __( 'Types of People', 'strikebase' ),
			'all_items'                  => __( 'All Types of People', 'strikebase' ),
			'new_item_name'              => __( 'New Type of Person', 'strikebase' ),
			'add_new_item'               => __( 'Add New Person Type', 'strikebase' ),
			'edit_item'                  => __( 'Edit Person Type', 'strikebase' ),
			'update_item'                => __( 'Update Person Type', 'strikebase' ),
			'view_item'                  => __( 'View Person Type', 'strikebase' ),
			'separate_items_with_commas' => __( '', 'strikebase' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => __( 'Popular Types', 'strikebase' ),
			'search_items'               => __( 'Search Types', 'strikebase' ),
			'not_found'                  => __( 'Not Found', 'strikebase' ),
			'no_terms'                   => __( 'No items', 'strikebase' ),
			'items_list'                 => __( 'Types list', 'strikebase' ),
			'items_list_navigation'      => __( 'Types list navigation', 'strikebase' ),
		);
		$type_args   = array(
			'labels'            => $type_labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'person-type', array( $this->cpt ), $type_args );
	}
}

Strikebase_Person::get_instance();
