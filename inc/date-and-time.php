<?php
/**
 * Custom functionality related to date and time calculations.
 *
 * @package strikebase
 */

/*
 * Output a nice human-parseable date.
 */
function strikebase_formatted_date( $date, $date_format=null ) {
	if ( ! $date_format ) :
		// If we haven't explicitly set a date format, pull it from WordPress options
		$date_format = get_option( 'date_format' );
	endif;
	$formatted_date = date( $date_format, $date );
	return $formatted_date;
}

/*
 * Get a list of all the timezones PHP supports.
 */
function strikebase_get_timezones() {

	// Create arrays for the timezone and its offset/
	$timezone_list = [];
	$GMT_offsets = [];
	$now = new DateTime( 'now', new DateTimeZone('UTC') );

	foreach ( DateTimeZone::listIdentifiers() as $timezone ) :
		$now->setTimezone( new DateTimeZone($timezone) );
		$GMT_offsets[] = $GMT_offset = $now->getOffset();
		$timezone_list[$timezone] = '(' . strikebase_format_GMT_offset( $GMT_offset ) . ') ' . strikebase_format_timezone_name( $timezone );
	endforeach;

	// Sort by GMT offset first, then by timezone name.
	array_multisort( $GMT_offsets, $timezone_list );

	return $timezone_list;
}

/*
 * Format a given timezone's GMT offset.
 */
function strikebase_format_GMT_offset( $offset ) {
	$hours = intval( $offset / 3600 );
	$minutes = abs( intval( $offset % 3600 / 60 ) );
	return 'GMT' . ( $offset ? sprintf( '%+03d:%02d', $hours, $minutes ) : '' );
}

/*
 * Format the name of a timezone in a more human-friendly way.
 */
function strikebase_format_timezone_name( $timezone_name ) {
	$timezone_name = str_replace( '/', ', ', $timezone_name );
	$timezone_name = str_replace( '_', ' ', $timezone_name );
	$timezone_name = str_replace( 'St ', 'St. ', $timezone_name );
	return $timezone_name;
}
