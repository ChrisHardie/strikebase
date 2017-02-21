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
		$cpt_args = array(
			'labels'              => array(
				'name'               => esc_html__( 'People', 'strikebase' ),
				'singular_name'      => esc_html__( 'Person', 'strikebase' ),
				'add_new'            => esc_html_x( 'Add New Person', 'strikebase', 'strikebase' ),
				'add_new_item'       => esc_html__( 'Add New Person', 'strikebase' ),
				'edit_item'          => esc_html__( 'Edit Person', 'strikebase' ),
				'new_item'           => esc_html__( 'New Person', 'strikebase' ),
				'view_item'          => esc_html__( 'View Person', 'strikebase' ),
				'search_items'       => esc_html__( 'Search People', 'strikebase' ),
				'not_found'          => esc_html__( 'No people found', 'strikebase' ),
				'not_found_in_trash' => esc_html__( 'No people found in Trash', 'strikebase' ),
				'parent_item_colon'  => esc_html__( 'Person:', 'strikebase' ),
				'menu_name'          => esc_html__( 'People', 'strikebase' ),
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
		register_post_type( $this->cpt_name, $cpt_args );
	}
}

Strikebase_Post_Type_Person::get_instance();
