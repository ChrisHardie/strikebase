/**
 * External Dependencies
 */
import React, { Component } from 'react';
import { bindActionCreators } from 'redux';
import { connect } from 'react-redux';

/**
 * Internal Dependencies
 */
import Header from './Header';
import * as actionCreators from '../actions/actioncreators';

/**
 * Stylesheets
 */
import '../../../stylesheets/style.scss';
import '../../../style-guide/stylesheets/style-guide.scss';
import { getApiData } from '../data';

class App extends Component {
	constructor( props ) {
		super( props );
	}

	// componentWillMount() {
	// 	getApiData()
	// 		.then( ( data ) => {
	// 			this.setState( {
	// 				people: data.people,
	// 				projects: data.projects,
	// 				statuses: data.statuses,
	// 				organizations: data.organizations
	// 			} );
	// 		} );
	// }

	render() {
		return (
			<div id="page" className="site">
				<Header />
				<div id="content" className="site-content">
					<div id="primary" className="content-area">
						<main className="site-main" role="main">
							{ React.cloneElement( this.props.children, this.props ) }
						</main>
					</div>
				</div>
			</div>
		)
	}
}

const mapStateToProps = ( state ) => {
	return {
		people: state.people,
		projects: state.projects,
		statuses: state.statuses,
		organizations: state.organizations
	};
};

const mapDispatchToProps = ( dispatch ) => {
	return bindActionCreators( actionCreators, dispatch );
};

export default connect( mapStateToProps, mapDispatchToProps )( App );
