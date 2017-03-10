/**
 * Reducers for Organizations Taxonomy Data
 */
const organizations = ( state = [], action ) => {
	switch ( action.type ) {
		// GET Organizations from API
		case 'RECEIVE_DATA':
			return action.data.organizations || state;
		// Add new Organizations
		// case 'ADD_ORGANIZATONS':
		// 	return state;
		// Update Organizations
		// case 'UPDATE_ORGANIZATONS':
		// 	return state;
		// Delete Organizations
		// case 'REMOVE_ORGANIZATONS':
		// 	return state;
		default:
			return state;
	}
};

export default organizations;
