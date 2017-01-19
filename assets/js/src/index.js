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
import ProjectList from './components/ProjectList';
import PersonList from './components/PersonList';
import OrganizationList from './components/OrganizationList';


render(
	<Router history={ browserHistory }>
		<Route path="/" component={ App }>
			<IndexRoute component={ Dashboard } />
			<Route path="/projects" component={ ProjectList } />
			<Route path="/people" component={ PersonList } />
			<Route path="/organizations" component={ OrganizationList } />
		</Route>
	</Router>,
	document.getElementById( 'page' )
);

