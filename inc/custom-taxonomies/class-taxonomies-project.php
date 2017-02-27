<?php

/**
 * Project-Specific Taxonomies
 *
 * @package strikebase
 */
class Strikebase_Taxonomies_Project extends Strikebase_Taxonomies {
	/**
	 * Name of the post type(s) the taxonomy group is attached to
	 *
	 * @var array
	 */
	protected $post_types = array( 'project' );

	/**
	 * Create and register Taxonomies
	 *
	 * @action init
	 * @return null
	 */
	public function create_taxonomies() {
		// Project statuses
		$status_labels = array(
			'name'                       => esc_html_x( 'Project Status', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => esc_html_x( 'Project Status', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => esc_html__( 'Statuses', 'strikebase' ),
			'all_items'                  => esc_html__( 'All Statuses', 'strikebase' ),
			'new_item_name'              => esc_html__( 'New Project Status', 'strikebase' ),
			'add_new_item'               => esc_html__( 'Add New Project Status', 'strikebase' ),
			'edit_item'                  => esc_html__( 'Edit Project Status', 'strikebase' ),
			'update_item'                => esc_html__( 'Update Project Status', 'strikebase' ),
			'view_item'                  => esc_html__( 'View Project Status', 'strikebase' ),
			'separate_items_with_commas' => esc_html__( '', 'strikebase' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => esc_html__( 'Popular Statuses', 'strikebase' ),
			'search_items'               => esc_html__( 'Search Statuses', 'strikebase' ),
			'not_found'                  => esc_html__( 'Not Found', 'strikebase' ),
			'no_terms'                   => esc_html__( 'No items', 'strikebase' ),
			'items_list'                 => esc_html__( 'Statuses list', 'strikebase' ),
			'items_list_navigation'      => esc_html__( 'Statuses list navigation', 'strikebase' ),
		);
		$status_args   = array(
			'labels'            => $status_labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'project-status', $this->post_types, $status_args );
		// Project genres
		$genre_labels = array(
			'name'                       => esc_html_x( 'Project Genre(s)', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => esc_html_x( 'Project Genre', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => esc_html__( 'Genres', 'strikebase' ),
			'all_items'                  => esc_html__( 'All Genres', 'strikebase' ),
			'new_item_name'              => esc_html__( 'New Project Genre', 'strikebase' ),
			'add_new_item'               => esc_html__( 'Add New Project Genre', 'strikebase' ),
			'edit_item'                  => esc_html__( 'Edit Project Genre', 'strikebase' ),
			'update_item'                => esc_html__( 'Update Project Genre', 'strikebase' ),
			'view_item'                  => esc_html__( 'View Project Genre', 'strikebase' ),
			'separate_items_with_commas' => esc_html__( '', 'strikebase' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => esc_html__( 'Popular Genres', 'strikebase' ),
			'search_items'               => esc_html__( 'Search Genres', 'strikebase' ),
			'not_found'                  => esc_html__( 'Not Found', 'strikebase' ),
			'no_terms'                   => esc_html__( 'No items', 'strikebase' ),
			'items_list'                 => esc_html__( 'Genres list', 'strikebase' ),
			'items_list_navigation'      => esc_html__( 'Genres list navigation', 'strikebase' ),
			'parent_item'                => esc_html__( 'Parent genre', 'strikebase' ),
		);
		$genre_args   = array(
			'labels'            => $genre_labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'project-genre', $this->post_types, $genre_args );
		// Project types
		$type_labels = array(
			'name'                       => esc_html_x( 'Project Type', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => esc_html_x( 'Project Type', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => esc_html__( 'Types', 'strikebase' ),
			'all_items'                  => esc_html__( 'All Types', 'strikebase' ),
			'new_item_name'              => esc_html__( 'New Project Type', 'strikebase' ),
			'add_new_item'               => esc_html__( 'Add New Project Type', 'strikebase' ),
			'edit_item'                  => esc_html__( 'Edit Project Type', 'strikebase' ),
			'update_item'                => esc_html__( 'Update Project Type', 'strikebase' ),
			'view_item'                  => esc_html__( 'View Project Type', 'strikebase' ),
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
		register_taxonomy( 'project-type', $this->post_types, $type_args );
		// Project hosts
		$host_labels = array(
			'name'                       => esc_html_x( 'Project Host', 'Taxonomy General Name', 'strikebase' ),
			'singular_name'              => esc_html_x( 'Project Host', 'Taxonomy Singular Name', 'strikebase' ),
			'menu_name'                  => esc_html__( 'Hosts', 'strikebase' ),
			'all_items'                  => esc_html__( 'All Hosts', 'strikebase' ),
			'new_item_name'              => esc_html__( 'New Project Host', 'strikebase' ),
			'add_new_item'               => esc_html__( 'Add New Project Host', 'strikebase' ),
			'edit_item'                  => esc_html__( 'Edit Project Host', 'strikebase' ),
			'update_item'                => esc_html__( 'Update Project Host', 'strikebase' ),
			'view_item'                  => esc_html__( 'View Project Host', 'strikebase' ),
			'separate_items_with_commas' => esc_html__( '', 'strikebase' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove items', 'strikebase' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used', 'strikebase' ),
			'popular_items'              => esc_html__( 'Popular Hosts', 'strikebase' ),
			'search_items'               => esc_html__( 'Search Hosts', 'strikebase' ),
			'not_found'                  => esc_html__( 'Not Found', 'strikebase' ),
			'no_terms'                   => esc_html__( 'No items', 'strikebase' ),
			'items_list'                 => esc_html__( 'Hosts list', 'strikebase' ),
			'items_list_navigation'      => esc_html__( 'Hosts list navigation', 'strikebase' ),
		);
		$host_args   = array(
			'labels'            => $host_labels,
			'hierarchical'      => false,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'show_tagcloud'     => true,
		);
		register_taxonomy( 'project-host', $this->post_types, $host_args );
	}
}

Strikebase_Taxonomies_Project::get_instance();
