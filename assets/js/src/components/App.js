/**
 * External Dependencies
 */
import React, { Component } from 'react';

/**
 * Internal Dependencies
 */
import Header from './Header';

/**
 * Stylesheets
 */
import '../../../stylesheets/style.scss';

class App extends Component {
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
};

export default App;
