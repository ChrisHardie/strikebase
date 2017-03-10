/**
 * Reducers for Organizations Taxonomy Data
 */
const organizations = ( state = [], action ) => {
	switch ( action.type ) {
		// Get Organizations from API
		case 'RECEIVE_DATA':
			return action.data.organizations || state;
		// Add new Organizations
		// case 'ADD_ORGANIZATIONS':
		// 	return state;
		// Update Organizations
		// case 'UPDATE_ORGANIZATIONS':
		// 	return state;
		// Delete Organizations
		// case 'REMOVE_ORGANIZATIONS':
		// 	return state;
		default:
			return state;
	}
};

export default organizations;
