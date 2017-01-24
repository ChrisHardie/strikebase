<?php

/**
 * Person CPT
 *
 * @package strikebase
 */
class Strikebase_Post_Type_Person extends Strikebase_Post_Type {
	/**
	 * Name of the post type
	 *
	 * @var string
	 */
	protected $cpt_name = 'person';

	/**
	 * Create and register CPT
	 *
	 * @action init
	 * @return null
	 */
	public function create_post_type() {
		$cpt_name = array(
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
		register_post_type( $this->cpt_name, $cpt_name );
	}
}

Strikebase_Post_Type_Person::get_instance();
