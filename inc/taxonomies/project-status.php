<?php
/**
 * Status taxonomy (used for projects)
 *
 * @package strikebase
 */

 /*
  * Register the taxonomy.
  *
  */
function strikebase_status_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Project Status', 'Taxonomy General Name', 'strikebase' ),
		'singular_name'              => _x( 'Status', 'Taxonomy Singular Name', 'strikebase' ),
		'menu_name'                  => __( 'Status', 'strikebase' ),
		'all_items'                  => __( 'All Statuses', 'strikebase' ),
		'parent_item'                => __( 'Parent Status', 'strikebase' ),
		'parent_item_colon'          => __( 'Parent Status:', 'strikebase' ),
		'new_item_name'              => __( 'New Status Status', 'strikebase' ),
		'add_new_item'               => __( 'Add New Status', 'strikebase' ),
		'edit_item'                  => __( 'Edit Status', 'strikebase' ),
		'update_item'                => __( 'Update Status', 'strikebase' ),
		'view_item'                  => __( 'View Status', 'strikebase' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'strikebase' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'strikebase' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'strikebase' ),
		'popular_items'              => __( 'Popular Statuses', 'strikebase' ),
		'search_items'               => __( 'Search Statuses', 'strikebase' ),
		'not_found'                  => __( 'Not Found', 'strikebase' ),
		'no_terms'                   => __( 'No items', 'strikebase' ),
		'items_list'                 => __( 'Statuses list', 'strikebase' ),
		'items_list_navigation'      => __( 'Statuses list navigation', 'strikebase' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project-status', array( 'project' ), $args );

}
add_action( 'init', 'strikebase_status_taxonomy', 0 );

/*
 * Display the project status.
 *
 */
function strikebase_show_project_status() {
	$terms = get_terms( 'project-status' );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	    foreach ( $terms as $term ) {
	        echo $term->name; // Needs a separator just in case we have more than one.
	    }
	}
}
