<?php

/**
 * Project-Specific Taxonomies
 *
 * @package strikebase
 */
class Strikebase_Taxonomies_Project extends Strikebase_Taxonomies {
	/**
	 * Name of the taxonomy group
	 *
	 * @var string
	 */
	protected $tax_group = 'project';

	/**
	 * Create and register Taxonomies
	 *
	 * @action init
	 * @return null
	 */
	public function create_taxonomies() {
		// Project statuses
		$status_labels = array(
			'name'                       => _x( 'Project Status', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => _x( 'Project Status', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => __( 'Statuses', 'strikebase' ),
			'all_items'                  => __( 'All Statuses', 'strikebase' ),
			'new_item_name'              => __( 'New Project Status', 'strikebase' ),
			'add_new_item'               => __( 'Add New Project Status', 'strikebase' ),
			'edit_item'                  => __( 'Edit Project Status', 'strikebase' ),
			'update_item'                => __( 'Update Project Status', 'strikebase' ),
			'view_item'                  => __( 'View Project Status', 'strikebase' ),
			'separate_items_with_commas' => __( '', 'strikebase' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => __( 'Popular Statuses', 'strikebase' ),
			'search_items'               => __( 'Search Statuses', 'strikebase' ),
			'not_found'                  => __( 'Not Found', 'strikebase' ),
			'no_terms'                   => __( 'No items', 'strikebase' ),
			'items_list'                 => __( 'Statuses list', 'strikebase' ),
			'items_list_navigation'      => __( 'Statuses list navigation', 'strikebase' ),
		);
		$status_args   = array(
			'labels'            => $status_labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'project-status', array( $this->tax_group ), $status_args );
		// Project genres
		$genre_labels = array(
			'name'                       => _x( 'Project Genre(s)', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => _x( 'Project Genre', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => __( 'Genres', 'strikebase' ),
			'all_items'                  => __( 'All Genres', 'strikebase' ),
			'new_item_name'              => __( 'New Project Genre', 'strikebase' ),
			'add_new_item'               => __( 'Add New Project Genre', 'strikebase' ),
			'edit_item'                  => __( 'Edit Project Genre', 'strikebase' ),
			'update_item'                => __( 'Update Project Genre', 'strikebase' ),
			'view_item'                  => __( 'View Project Genre', 'strikebase' ),
			'separate_items_with_commas' => __( '', 'strikebase' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => __( 'Popular Genres', 'strikebase' ),
			'search_items'               => __( 'Search Genres', 'strikebase' ),
			'not_found'                  => __( 'Not Found', 'strikebase' ),
			'no_terms'                   => __( 'No items', 'strikebase' ),
			'items_list'                 => __( 'Genres list', 'strikebase' ),
			'items_list_navigation'      => __( 'Genres list navigation', 'strikebase' ),
		);
		$genre_args   = array(
			'labels'            => $genre_labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'project-genre', array( $this->tax_group ), $genre_args );
		// Project types
		$type_labels = array(
			'name'                       => _x( 'Project Type', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => __( 'Types', 'strikebase' ),
			'all_items'                  => __( 'All Types', 'strikebase' ),
			'new_item_name'              => __( 'New Project Type', 'strikebase' ),
			'add_new_item'               => __( 'Add New Project Type', 'strikebase' ),
			'edit_item'                  => __( 'Edit Project Type', 'strikebase' ),
			'update_item'                => __( 'Update Project Type', 'strikebase' ),
			'view_item'                  => __( 'View Project Type', 'strikebase' ),
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
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'project-type', array( $this->tax_group ), $type_args );
		// Project hosts
		$host_labels = array(
			'name'                       => _x( 'Project Host', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => _x( 'Project Host', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => __( 'Hosts', 'strikebase' ),
			'all_items'                  => __( 'All Hosts', 'strikebase' ),
			'new_item_name'              => __( 'New Project Host', 'strikebase' ),
			'add_new_item'               => __( 'Add New Project Host', 'strikebase' ),
			'edit_item'                  => __( 'Edit Project Host', 'strikebase' ),
			'update_item'                => __( 'Update Project Host', 'strikebase' ),
			'view_item'                  => __( 'View Project Host', 'strikebase' ),
			'separate_items_with_commas' => __( '', 'strikebase' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => __( 'Popular Hosts', 'strikebase' ),
			'search_items'               => __( 'Search Hosts', 'strikebase' ),
			'not_found'                  => __( 'Not Found', 'strikebase' ),
			'no_terms'                   => __( 'No items', 'strikebase' ),
			'items_list'                 => __( 'Hosts list', 'strikebase' ),
			'items_list_navigation'      => __( 'Hosts list navigation', 'strikebase' ),
		);
		$host_args   = array(
			'labels'            => $host_labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'project-host', array( $this->tax_group ), $host_args );
	}
}

Strikebase_Taxonomies_Project::get_instance();
