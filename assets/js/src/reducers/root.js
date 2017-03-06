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

const rootReducer = combineReducers( { people, projects, routing: routerReducer } );

export default rootReducer;