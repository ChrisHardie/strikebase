/**
 * Filters.
 *
 * Contains functionality related to showing the filter drop-downs
 * and showing/hiding cards based on filters selected.
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
	$( '.dropdown-submenu-open' ).on( 'click', function( event ) {
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
	 * Listen to all clicks on filter links and show/hide elements accordingly.
	 * This handles showing and hiding cards based on which filters are selected.
	 */
	$( '.filter-link' ).on( 'click', function( event ) {
		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		// Are there any filters already selected in this group?
		if ( 0 === $( this ).parents( '.dropdown-menu' ).find( '.filter-link.selected' ).length ) {
			// No filters already selected. Hide everything except cards that match the clicked-on filter.
			$( this ).addClass( 'selected' );
			$( '.site-main' ).find( '.strikebase-card' ).not( '.' + $( this ).data( 'filter' ) ).addClass( 'hidden' );

		} else {
			// We have filters selected already. Toggle visibility of the filter click on.
			if ( $( this ).hasClass( 'selected' ) ) {
				// Hide the filter if it's visible.
				$( this ).removeClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).addClass( 'hidden' );

				// Did we just accidentally hide all the cards? Let's check.
				if ( 0 === $( '.site-main' ).find( '.strikebase-card:not(.hidden)' ).length ) {
					// Show all cards
					$( '.site-main' ).find( '.strikebase-card' ).removeClass( 'hidden' );
				}
			} else {
				// Otherwise, show the cards.
				$( this ).addClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).removeClass( 'hidden' );
			}
		}

		// Finally, close the drop-down menu.
		$( this ).parents( '.dropdown-container' ).removeClass( 'open' );
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

	/*
	 * Function to set defaults filters on page load.
	 * There will be a brief flash where all cards will be visible due to load time.
	 */
	function setDefaultFilters( $peopleFilter, $projectsFilter ) {
		$( '.strikebase-people-list' ).find( '.strikebase-card' ).not( '.' + $peopleFilter ).addClass( 'hidden' );
		$( '.dropdown-menu' ).find( 'a[data-filter="'+ $peopleFilter +'"]' ).addClass( 'selected' );
		$( '.strikebase-projects-list' ).find( '.strikebase-card' ).not( '.' + $projectsFilter ).addClass( 'hidden' );
		$( '.dropdown-menu' ).find( 'a[data-filter="'+ $projectsFilter +'"]' ).addClass( 'selected' );
	}

	// Once our window has loaded, set our default display parameters.
	$( window ).on( 'load', function() {
		setDefaultFilters( 'person-type-influencer', 'project-status-active' );
	});

} )( jQuery );
