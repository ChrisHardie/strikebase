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
			'name'                       => esc_html_x( 'Type of Person', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => esc_html_x( 'Type of Person', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => esc_html__( 'Types of People', 'strikebase' ),
			'all_items'                  => esc_html__( 'All Types of People', 'strikebase' ),
			'new_item_name'              => esc_html__( 'New Type of Person', 'strikebase' ),
			'add_new_item'               => esc_html__( 'Add New Person Type', 'strikebase' ),
			'edit_item'                  => esc_html__( 'Edit Person Type', 'strikebase' ),
			'update_item'                => esc_html__( 'Update Person Type', 'strikebase' ),
			'view_item'                  => esc_html__( 'View Person Type', 'strikebase' ),
			'separate_items_with_commas' => esc_html__( '', 'strikebase' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => esc_html__( 'Popular Types', 'strikebase' ),
			'search_items'               => esc_html__( 'Search Types', 'strikebase' ),
			'not_found'                  => esc_html__( 'Not Found', 'strikebase' ),
			'no_terms'                   => esc_html__( 'No items', 'strikebase' ),
			'items_list'                 => esc_html__( 'Types list', 'strikebase' ),
			'items_list_navigation'      => esc_html__( 'Types list navigation', 'strikebase' ),
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
