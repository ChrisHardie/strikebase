<?php

/**
 * Project CPT
 *
 * @package strikebase
 */
class Strikebase_Post_Type_Project extends Strikebase_Post_Type {
	/**
	 * Name of the post type
	 *
	 * @var string
	 */
	protected $cpt_name = 'project';

	/**
	 * Create and register CPT
	 *
	 * @action init
	 * @return null
	 */
	public function create_post_type() {
		$cpt_args = array(
			'labels'              => array(
				'name'               => __( 'Projects', 'strikebase' ),
				'singular_name'      => __( 'Project', 'strikebase' ),
				'add_new'            => _x( 'Add New Project', 'strikebase', 'strikebase' ),
				'add_new_item'       => __( 'Add New Project', 'strikebase' ),
				'edit_item'          => __( 'Edit Project', 'strikebase' ),
				'new_item'           => __( 'New Project', 'strikebase' ),
				'view_item'          => __( 'View Project', 'strikebase' ),
				'search_items'       => __( 'Search Projects', 'strikebase' ),
				'not_found'          => __( 'No projects found', 'strikebase' ),
				'not_found_in_trash' => __( 'No projects found in Trash', 'strikebase' ),
				'parent_item_colon'  => __( 'Project:', 'strikebase' ),
				'menu_name'          => __( 'Projects', 'strikebase' ),
			),
			'menu_icon'           => 'dashicons-index-card',
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
				'slug'       => 'projects',
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

Strikebase_Post_Type_Project::get_instance();
