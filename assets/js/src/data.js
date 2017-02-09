/**
 * External Dependencies
 */
import axios from 'axios';

// Get Project data
export const getProjects = () => {
	return axios.get( '/wp-json/wp/v2/project' );
};

// Get People data
export const getPeople = () => {
	return axios.get( '/wp-json/wp/v2/person' );
};

// Get Organization data
export const getOrganizations = () => {
	return axios.get( '/wp-json/wp/v2/organization' );
};

export const getApiData = () => {
	return axios.all( [ getPeople(), getProjects(), getOrganizations() ] )
		.then( axios.spread( ( people, projects, organizations ) => ( {
			people: people.data,
			projects: projects.data,
			organizations: organizations.data
		} ) ) );
};
