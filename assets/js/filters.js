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

		// First, check to see if the filter is already active.

		if ( $( this ).hasClass( 'selected' ) ) {
			// Are there any filters already selected in this group?
			if ( 1 === $( this ).parents( '.dropdown-menu' ).find( '.filter-link.selected' ).length ) {
				// No filters in the current group are selected—only this filter is showing.
				// Hiding the filter will actually hide all cards, which we don't want.
				// Instead, let's reset the filtering for the group, and show all filters
				var $parentTaxonomy = $( this ).parents( '.dropdown-container' ).data( 'taxonomy-group' );
				console.info( 'Trying to disable the only active filter in a group.' );
				console.info( 'Clear all filters for ' + $parentTaxonomy );
				// Un-select the filter link.
				$( this ).removeClass( 'selected' );
				// Do other groups have filters applied that we need to respect?
				var $otherFilters = $( this ).parents( '.dropdown-container' ).siblings( '.dropdown-container' ).find( '.filter-link.selected' );

				if ( 0 === $otherFilters.length ) {
					console.info( 'No other filters anywhere! Let\'s just clear everything.' );
					clearFilters();
				} else {
					console.info( 'We have filters applied in other groups.' );
					console.log( $otherFilters );

					// For each group that has filters active, make a list of all the deselected filters.
					// We need to ensure these are still hidden from view.
					var $otherFilterGroups = $( this ).parents( '.dropdown-container' ).siblings( '.dropdown-container' );
					var $hiddenClasses;

					$otherFilterGroups.each( function() {
						if ( 0 !== $( this ).find( '.filter-link.selected' ).length ) {
							// If there are active filters in a group, we need to respect them.
							// Select all un-selected filters in groups with active filters.
							console.log( $( this ).data( 'taxonomy-group' ) + ' has some selected filters.' );
							var $inactiveFilters = $( this ).find( '.filter-link' ).not( '.selected' );

							// Make a string of all the other filters, so we make sure to continue hiding them.
							$inactiveFilters.each( function( index ) {
								if ( 0 === index ) {
									$hiddenClasses = '.' + $( this ).data( 'filter' );
								} else {
									$hiddenClasses = $hiddenClasses + ',.' + $( this ).data( 'filter' );
								}
							} );
						}
					} );

					// Show everything that doesn't correspond to those filters.
					$( '.site-main' ).find( '.strikebase-card' ).not( $hiddenClasses ).removeClass( 'hidden' );
					updateFilterList( 'remove', $( this ).data( 'filter-name' ) );
				}

			} else {
				// If it's already active, we're going to disable it.
				console.info( $( this ).data( 'filter' ) + ' already active. Disabling!' );
				$( this ).removeClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).addClass( 'hidden' );
				// And update our list of filters.
				updateFilterList( 'remove', $( this ).data( 'filter-name' ) );
			}


		} else {
			// Are there any filters already selected in this group?
			if ( 0 === $( this ).parents( '.dropdown-menu' ).find( '.filter-link.selected' ).length ) {
				// No filters in the current group are selected—all cards are currently showing.
				// We're going to hide all cards except those that match our new filter.
				console.info( 'No filters currently active in this taxonomy group.' );
				console.info( 'Filter to show ' + $( this ).data( 'filter' ) + ' only.' );
				$( this ).addClass( 'selected' );
				$( '.site-main' ).find( '.strikebase-card' ).not( '.' + $( this ).data( 'filter' ) ).addClass( 'hidden' );
				updateFilterList( 'add', $( this ).data( 'filter-name' ) );

			} else {
				// We have other filters in this group selected.
				// Show cards matching our new filter as well.
				console.info( 'Active filters in this group. Add filter for ' + $( this ).data( 'filter' ) );
				$( this ).addClass( 'selected' );
				$( '.site-main' ).find( '.' + $( this ).data( 'filter' ) ).removeClass( 'hidden' );
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
