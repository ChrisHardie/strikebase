/**
 * Reducers for Projects CPT
 */
const projects = ( state = [], action ) => {
	switch ( action.type ) {
		// Get Projects from API
		case 'RECEIVE_DATA':
			return action.data.projects || state;
		// Add new Projects
		// case 'ADD_PROJECTS':
		// 	return state;
		// Update Projects
		// case 'UPDATE_PROJECTS':
		// 	return state;
		// Delete Projects
		// case 'REMOVE_PROJECTS':
		// 	return state;
		default:
			return state;
	}
};

export default projects;
