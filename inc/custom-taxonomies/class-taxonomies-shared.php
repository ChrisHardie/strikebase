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
		register_taxonomy( 'organization', $this->post_types, $organization_args );
	}
}

Strikebase_Taxonomies_Shared::get_instance();
