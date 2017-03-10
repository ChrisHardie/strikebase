/**
 * External Dependencies
 */
import { getApiData } from '../data';

/**
 * Fetch API Data Actions
 */
// Fetch success
// export const fetchSuccess = ( people, projects, statuses, organizations ) => {
export const receiveData = ( data ) => {
	return {
		type: 'RECEIVE_DATA',
		data
	};
};
// Fetch the API data
export const fetchApiData = () => {
	return ( dispatch ) => {
		return getApiData()
			.then( ( data ) => {
				dispatch( receiveData( data ) );
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
