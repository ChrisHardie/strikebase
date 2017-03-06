// Filter People
export const filterPeople = ( index ) => {
	console.log( 'Dispatching FILTER_PEOPLE!' );
	return {
		type: 'FILTER_PEOPLE',
		index
	}
};

// Filter Projects
export const filterProjects = ( index ) => {
	console.log( 'Dispatching FILTER_PROJECTS!' );
	return {
		type: 'FILTER_PROJECTS',
		index
	}
};
