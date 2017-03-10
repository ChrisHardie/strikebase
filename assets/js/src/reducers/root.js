/**
 * External Dependencies
 */
import { combineReducers } from 'redux';
import { routerReducer } from 'react-router-redux';

/**
 * Internal Dependencies
 */
import people from './people';
import projects from './projects';
import statuses from './statuses';
import organizations from './organizations';

const rootReducer = combineReducers( {
	people,
	projects,
	statuses,
	organizations,
	routing: routerReducer
} );

export default rootReducer;