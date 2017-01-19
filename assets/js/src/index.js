/**
 * External Dependencies
 */
import React from 'react';
import { render } from 'react-dom';
import { Router, Route, IndexRoute, browserHistory } from 'react-router';

/**
 * Internal Dependencies
 */
import App from './components/App';
import Dashboard from './components/Dashboard';


render(
	<Router history={ browserHistory }>
		<Route path="/" component={ App }>
			<IndexRoute component={ Dashboard } />
		</Route>
	</Router>,
	document.getElementById( 'page' )
);

