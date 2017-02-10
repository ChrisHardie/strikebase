/**
 * External Dependencies
 */
import React, { Component } from 'react';

/**
 * Internal Dependencies
 */
import Header from './Header';
import { getApiData } from '../data';

/**
 * Stylesheets
 */
import '../../../stylesheets/style.scss';

class App extends Component {
	constructor( props ) {
		super( props );
		this.state = {
			people: [],
			projects: [],
			statuses: [],
			organizations: []
		};
	}
	componentWillMount() {
		getApiData()
			.then( ( data ) => {
				this.setState( {
					people: data.people,
					projects: data.projects,
					statuses: data.statuses,
					organizations: data.organizations
				} );
			} );
	}
	render() {
		let children = React.Children.map( this.props.children, ( child ) => {
			return React.cloneElement( child, {
				people: this.state.people,
				projects: this.state.projects,
				statuses: this.state.statuses,
				organizations: this.state.organizations
			} );
		} );
		return (
			<div id="page" className="site">
				<Header />
				<div id="content" className="site-content">
					<div id="primary" className="content-area">
						<main className="site-main" role="main">
							{ children }
						</main>
					</div>
				</div>
			</div>
		)
	}
};

export default App;
