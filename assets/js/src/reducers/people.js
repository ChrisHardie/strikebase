/**
 * Reducers for People CPT
 */
const people = ( state = [], action ) => {
	switch ( action.type ) {
		// GET People from API
		case 'RECEIVE_DATA':
			return action.data.people || state;
		// Add new People
		// case 'ADD_PEOPLE':
		// 	return state;
		// Update People
		// case 'UPDATE_PEOPLE':
		// 	return state;
		// Delete People
		// case 'REMOVE_PEOPLE':
		// 	return state;
		default:
			return state;
	}

};

export default people;
