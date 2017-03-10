/**
 * Reducers for Statuses Taxonomy Data
 */
const statuses = ( state = [], action ) => {
	switch ( action.type ) {
		// Get Statuses from API
		case 'RECEIVE_DATA':
			return action.data.statuses || state;
		// Add new Statuses
		// case 'ADD_STATUSES':
		// 	return state;
		// Update Statuses
		// case 'UPDATE_STATUSES':
		// 	return state;
		// Delete Statuses
		// case 'REMOVE_STATUSES':
		// 	return state;
		default:
			return state;
	}
};

export default statuses;
