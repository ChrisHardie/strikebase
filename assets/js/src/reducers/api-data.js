/**
 * Reducers for fetching API data
 */
// Fetch check for API call success
export const apiData = ( state = [], action ) => {
	switch ( action.type ) {
		case 'FETCH_SUCCESS':
			// console.log( 'Action:' );
			// console.log( action );
			const newState = [
				...state,
				{
					people: action.people,
					projects: action.projects,
					statuses: action.statuses,
					organizations: action.organizations
				}
			];
			console.log( "State:" );
			console.log( state );
			console.log( "New State:" );
			console.log( newState );

			return newState;
		default:
			return state;
	}
};
