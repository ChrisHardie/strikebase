<?php

/**
 * Person-Specific Taxonomies
 *
 * @package strikebase
 */
class Strikebase_Taxonomies_Person extends Strikebase_Taxonomies {
	/**
	 * Name of the post type(s) the taxonomy group is attached to
	 *
	 * @var array
	 */
	protected $post_types = array( 'person' );

	/**
	 * Create and register Taxonomies
	 *
	 * @action init
	 * @return null
	 */
	public function create_taxonomies() {
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
		register_taxonomy( 'person-type', $this->post_types, $type_args );
	}
}

Strikebase_Taxonomies_Person::get_instance();
