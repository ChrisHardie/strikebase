/**
 * External Dependencies
 */
import { createStore, compose } from 'redux';
import { syncHistoryWithStore } from 'react-router-redux';
import { browserHistory } from 'react-router';

/**
 * Internal Dependencies
 */
import rootReducer from './reducers/root';

// Set default state here, instead of App component constructor
const defaultState = {
	people: [],
	projects: [],
	statuses: [],
	organizations: []
};
// const defaultState = getApiData().then( ( data ) => {
// 	return {
// 		people: data.people,
// 		projects: data.projects,
// 		statuses: data.statuses,
// 		organizations: data.organizations
// 	};
// } );

// Create Store
const store = createStore( rootReducer, defaultState );

// Sync browser history and export to make available to other modules (not as default)
export const history = syncHistoryWithStore( browserHistory, store );

// Export store as default
export default store;
