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
		console.info( 'Clicked on .dropdown-link; stopping event propagation.' );

		// Stop propogation to avoid closing the dropdown.
		event.stopPropagation();

		// Add a class to highlight the link itself.
		$( '.dropdown-container' ).removeClass( 'open' );
		$( this ).parents( '.dropdown-container' ).addClass( 'open' );
	});

	// Listen to all clicks on the body and close any open dropdowns.
	$( 'body' ).on( 'click', function( event ) {
		if ( $( event.target ).parents( '.dropdown' ) .length === 0 ) {
			console.info( 'Hiding all dropdowns' );
			$( '.dropdown-container' ).removeClass( 'open' );
		}
	});

} )( jQuery );
