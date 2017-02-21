<?php

/**
 * Shared Taxonomies
 *
 * @package strikebase
 */
class Strikebase_Taxonomies_Shared extends Strikebase_Taxonomies {
	/**
	 * Name of the post type(s) the taxonomy group is attached to
	 *
	 * @var array
	 */
	protected $post_types = array( 'person', 'project' );

	/**
	 * Create and register Taxonomies
	 *
	 * @action init
	 * @return null
	 */
	public function create_taxonomies() {
		// Organizations
		$organization_labels = array(
			'name'                       => esc_html_x( 'Organization', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => esc_html_x( 'Organization', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => esc_html__( 'Organizations', 'strikebase' ),
			'all_items'                  => esc_html__( 'All Organizations', 'strikebase' ),
			'new_item_name'              => esc_html__( 'New Organization', 'strikebase' ),
			'add_new_item'               => esc_html__( 'Add New Organization', 'strikebase' ),
			'edit_item'                  => esc_html__( 'Edit Organization', 'strikebase' ),
			'update_item'                => esc_html__( 'Update Organization', 'strikebase' ),
			'view_item'                  => esc_html__( 'View Organization', 'strikebase' ),
			'separate_items_with_commas' => esc_html__( '', 'strikebase' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => esc_html__( 'Popular Organizations', 'strikebase' ),
			'search_items'               => esc_html__( 'Search Organizations', 'strikebase' ),
			'not_found'                  => esc_html__( 'Not Found', 'strikebase' ),
			'no_terms'                   => esc_html__( 'No items', 'strikebase' ),
			'items_list'                 => esc_html__( 'Organizations list', 'strikebase' ),
			'items_list_navigation'      => esc_html__( 'Organizations list navigation', 'strikebase' ),
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
		register_taxonomy( 'organization', $this->post_types, $organization_args );
	}
}

Strikebase_Taxonomies_Shared::get_instance();
