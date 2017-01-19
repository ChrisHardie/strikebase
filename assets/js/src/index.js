/**
 * External Dependencies
 */
import React from 'react';
import { render } from 'react-dom';
import { Router, Route, browserHistory } from 'react-router';

/**
 * Internal Dependencies
 */
import App from './components/App';


render(
	<Router>
		<Route path="/" component={ App } />
	</Router>,
	document.getElementById( 'primary' )
);

