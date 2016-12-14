/**
 * External Dependencies
 */
import React from 'react';
import ReactDOM from 'react-dom';

/**
 * Internal Dependencies
 */

/**
 * Stylesheets
 */
import '../../stylesheets/style.scss';

class App extends React.Component {
	render() {
		return (
			<main id="main" className="site-main" role="main">
				<h2>Bonjour, Le React!</h2>
			</main>
		)
	}
}

ReactDOM.render( <App/>, document.getElementById( 'primary' ) );
