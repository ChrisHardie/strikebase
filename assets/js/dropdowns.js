/**
 * Dropdowns.
 *
 * Contains functionality related to showing, expanding, and navigating through drop-down menus.
 *
 */

( function( $ ) {

	/*
	 * Listen to all clicks on dropdown links and display drop-downs.
	 * Used to show our drop-down list of filters.
	 */
	$( '.dropdown-link' ).on( 'click', function( event ) {
		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		var $parentContainer = $( this ).parents( '.dropdown-container' );

		if ( $parentContainer.hasClass( 'open' ) ) {
			// If the menu is already open, close it.
			$parentContainer.removeClass( 'open' );
		} else {
			// Hide all open dropdowns.
			$( '.dropdown-container' ).removeClass( 'open' );
			// Open the dropdown.
			$parentContainer.addClass( 'open' );
		}
	});

	/*
	 * Listen to all clicks on submenu links and open submenus.
	 * This is used to navigate to a sub-menu of the primary filter list.
	 */
	$( '.dropdown-submenu-link' ).on( 'click', function( event ) {
		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		// Open the relevant submenu, and hide the main menu.
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-main-menu' ).addClass( 'hidden' );
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-submenu.' + $( this ).data( 'target') ).addClass( 'open' );
	});

	/*
	 * Listen to all clicks on submenu back links and close submenus.
	 * This is used to navigate back to the main filter menu from a sub-menu.
	 */
	$( '.dropdown-submenu-close' ).on( 'click', function( event ) {
		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		// Close the current submenu, and re-show the main menu.
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-main-menu' ).removeClass( 'hidden' );
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-submenu.' + $( this ).data( 'target' ) ).removeClass( 'open' );
	});

	/*
	 * Listen to all clicks on the body and close any open dropdowns.
	 * If a dropdown is open, and the user clicks outside the dropdown,
	 * that dropdown (and any open dropdown!) should close.
	 */
	$( 'body' ).on( 'click', function( event ) {
		if ( 0 === $( event.target ).parents( '.dropdown' ).length ) {
			$( '.dropdown-container' ).removeClass( 'open' );
		}
	});

} )( jQuery );
