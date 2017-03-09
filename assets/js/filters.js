/**
 * Filters.
 *
 * Contains functionality related to showing the filter drop-downs
 * and showing/hiding cards based on filters selected.
 *
 */

( function( $ ) {

	// Listen to all clicks on dropdown links and display drop-downs.
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

	// Listen to all clicks on submenu links and open submenus.
	$( '.dropdown-submenu-open' ).on( 'click', function( event ) {
		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		// Open the relevant submenu, and hide the main menu.
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-main-menu' ).addClass( 'hidden' );
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-submenu.' + $( this ).data( 'target') ).addClass( 'open' );
	});

	// Listen to all clicks on submenu back links and close the submenu.
	$( '.dropdown-submenu-close' ).on( 'click', function( event ) {
		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		// Close the current submenu, and re-show the main menu.
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-main-menu' ).removeClass( 'hidden' );
		$( this ).parents( '.dropdown-container' ).find( '.dropdown-submenu.' + $( this ).data( 'target' ) ).removeClass( 'open' );
	});

	// Listen to all clicks on filter links and show/hide elements accordingly.
	$( '.filter-link' ).on( 'click', function( event ) {
		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		// Are there any filters already selected in this group?
		if ( $( this ).parents( '.dropdown-menu' ).find( '.filter-link.selected' ).length === 0 ) {
			// No filters already selected. Hide everything except cards that match the clicked-on filter.
			$( this ).addClass( 'selected' );
			$( '.site-main' ).find( '.strikebase-card' ).not( '.' + $( this ).data( 'filter' ) ).addClass( 'hidden' );

		} else {
			// We have filters selected already. Toggle visibility of the filter click on.
			if ( $( this ).hasClass( 'selected' ) ) {
				// Hide the filter if it's visible.
				$( this ).removeClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).addClass( 'hidden' );
			} else {
				// Otherwise, show the cards.
				$( this ).addClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).removeClass( 'hidden' );
			}
		}
	});

	// Listen to all clicks on the body and close any open dropdowns.
	$( 'body' ).on( 'click', function( event ) {
		if ( $( event.target ).parents( '.dropdown' ) .length === 0 ) {
			$( '.dropdown-container' ).removeClass( 'open' );
		}
	});

} )( jQuery );
