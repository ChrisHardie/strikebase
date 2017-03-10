/**
 * Filters.
 *
 * Contains functionality related to showing the filter drop-downs
 * and showing/hiding cards based on filters selected.
 *
 */

( function( $ ) {

	/*
	 * Function to clear all existing filters and show all cards.
	 */
	function clearFilters() {
		// Show all cards and remove selected classes.
		$( '.site-main' ).find( '.strikebase-card' ).removeClass( 'hidden' );
		$( '.site-main' ).find( '.filter-link.selected' ).removeClass( 'selected' );

		// Hide the "clear filters" link and the "no matches" text when no filters are applied.
		$( '.strikebase-clear-filters' ).addClass( 'hidden' );
		$( '.strikebase-no-filter-matches' ).addClass( 'hidden' );

		// And clear all our current filters from the list too.
		$( '.strikebase-current-filters' ).addClass( 'hidden' );
		$( '.strikebase-current-filters' ).find( '.strikebase-current-filter' ).remove();
	}

	/*
	 * Function to add an item to the list of currently-active filters.
	 * This is so it's easier to see where you are in the scheme of things.
	 * Also pretty handy for testing.
	 */
	function updateFilterList( $action, $thing ) {
		if ( 'add' === $action ) {
			// Make sure we're showing the list of current filters and a "clear filters" button.
			$( '.strikebase-current-filters' ).removeClass( 'hidden' );
			$( '.strikebase-clear-filters' ).removeClass( 'hidden' );

			// Add our thing to the list.
			$( '.strikebase-filter-sort-messaging' ).find( '.strikebase-current-filters' ).append( '<span class="strikebase-current-filter ' + $thing + '">' + $thing + '</span>' );
		} else {
			// Remove our thing from the list.
			$( '.strikebase-filter-sort-messaging' ).find( '.strikebase-current-filter.' + $thing ).remove();

			// If it's now empty, hide the filter list.
		}
	}

	/*
	 * Function to set defaults filters on page load.
	 * There will be a brief flash where all cards will be visible due to load time.
	 */
	function setDefaultFilters( $peopleFilter, $projectsFilter, $peopleFilterName, $projectsFilterName ) {

		// Check to see which page we're on.
		if ( 0 === $( '.site-main' ).find( '.strikebase-projects-list' ).length ) {
			// Set people view default.
			$( '.strikebase-people-list' ).find( '.strikebase-card' ).not( '.' + $peopleFilter ).addClass( 'hidden' );
			$( '.dropdown-menu' ).find( 'a[data-filter="'+ $peopleFilter +'"]' ).addClass( 'selected' );

			// And update our list of filters.
			updateFilterList( 'add', $peopleFilterName );

		} else {
			// Set project view default.
			$( '.strikebase-projects-list' ).find( '.strikebase-card' ).not( '.' + $projectsFilter ).addClass( 'hidden' );
			$( '.dropdown-menu' ).find( 'a[data-filter="'+ $projectsFilter +'"]' ).addClass( 'selected' );

			// And update our list of filters.
			updateFilterList( 'add', $projectsFilterName );
		}
	}

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
			// And update our list of filters.
			updateFilterList( 'add', $( this ).data( 'filter-name' ) );

		} else {
			// We have filters selected already. Toggle visibility of the filter on click.

			if ( $( this ).hasClass( 'selected' ) ) {
				// Hide the filter if it's already selected.
				$( this ).removeClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).addClass( 'hidden' );
				// And update our list of filters.
				updateFilterList( 'remove', $( this ).data( 'filter-name' ) );


			} else {
				// Otherwise, show the cards for that filter.
				$( this ).addClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).removeClass( 'hidden' );
				// And update our list of filters.
				updateFilterList( 'add', $( this ).data( 'filter-name' ) );
			}
		}

		// Finally, close the drop-down menu.
		$( this ).parents( '.dropdown-container' ).removeClass( 'open' );

		/*
		// Hide the "clear filters" link when no filters are applied.
		if ( 0 < $( '.site-main' ).find( '.strikebase-card.hidden' ).length ) {
			$( '.strikebase-clear-filters' ).addClass( 'hidden' );
		}*/

		// If our combination of filters has hidden all cards, let's give a message to that effect.
		if ( 0 === $( '.site-main' ).find( '.strikebase-card:not(.hidden)' ).length ) {
			$( '.strikebase-no-filter-matches' ).removeClass( 'hidden' );
		} else {
			// Otherwise, make sure the message isn't accidentally showing.
			$( '.strikebase-no-filter-matches' ).addClass( 'hidden' );
		}
	});

	/*
	 * Listen for a click on the "clear filters" button and remove all filters.
	 * Note: this doesn't reset our filters to their default state, but rather
	 * resets to a completely unfiltered view.
	 */
	$( '.strikebase-clear-filters' ).on( 'click', function() {
		clearFilters();
	});

	// Once our window has loaded, set our default display parameters.
	$( window ).on( 'load', function() {
		setDefaultFilters( 'person-type-influencer', 'project-status-active', 'influencer', 'active' );
	});

} )( jQuery );
