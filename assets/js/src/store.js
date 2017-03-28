/**
 * External Dependencies
 */
import { createStore, applyMiddleware, compose } from 'redux';
import { syncHistoryWithStore } from 'react-router-redux';
import { browserHistory } from 'react-router';
import thunk from 'redux-thunk';

/**
 * Internal Dependencies
 */
import rootReducer from './reducers/root';

// Create Store enhancers
const enhancers = compose(
	applyMiddleware( thunk ),
	window.devToolsExtension ? window.devToolsExtension() : f => f
);

// Create Store
const store = createStore( rootReducer, enhancers );

// Sync browser history and export to make available to other modules (not as default)
export const history = syncHistoryWithStore( browserHistory, store );

// Export store as default
export default store;
