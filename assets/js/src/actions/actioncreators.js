/**
 * External Dependencies
 */
import { getApiData } from '../data';

/**
 * Fetch API Data Actions
 */
// Fetch success
// export const fetchSuccess = ( people, projects, statuses, organizations ) => {
export const fetchSuccess = ( data ) => {
	console.log( "People data response:" );
	console.log( data.people );
	return {
		type: 'FETCH_SUCCESS',
		people: data.people,
		projects: data.projects,
		statuses: data.statuses,
		organizations: data.organizations
	};
};
// Fetch the API data
export const fetchApiData = () => {
	return ( dispatch ) => {
		return getApiData()
			.then( ( data ) => {
				// console.log( "API Response:" );
				// console.log( data );
				dispatch( fetchSuccess( data ) );
			} )
			.catch( ( error ) => {
				throw( error );
			} );
	};
};

/**
 * Filtering Actions
 */
// Filter People
// export const filterPeople = ( index ) => {
// 	console.log( 'Dispatching FILTER_PEOPLE!' );
// 	return {
// 		type: 'FILTER_PEOPLE',
// 		index
// 	}
// };

// Filter Projects
// export const filterProjects = ( index ) => {
// 	console.log( 'Dispatching FILTER_PROJECTS!' );
// 	return {
// 		type: 'FILTER_PROJECTS',
// 		index
// 	}
// };
