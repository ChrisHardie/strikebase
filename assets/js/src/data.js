/**
 * External Dependencies
 */
import axios from 'axios';

// API url
const API_URL = '/wp-json/wp/v2'

// Get People data
export const getPeople = () => {
	return axios.get( `${ API_URL }/person` );
};

// Get Project data
export const getProjects = () => {
	return axios.get( `${ API_URL }/project` );
};

// Get Project Statuses
export const getStatuses = () => {
	return axios.get( `${ API_URL }/project-status` );
};

// Get Organization data
export const getOrganizations = () => {
	return axios.get( `${ API_URL }/organization` );
};

export const getApiData = () => {
	return axios.all( [ getPeople(), getProjects(), getStatuses(), getOrganizations() ] )
		.then( axios.spread( ( people, projects, statuses, organizations ) => ( {
			people: people.data,
			projects: projects.data,
			statuses: statuses.data,
			organizations: organizations.data
		} ) ) );
};
