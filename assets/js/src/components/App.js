/**
 * External Dependencies
 */
import React from 'react';

/**
 * Internal Dependencies
 */
import Header from './Header';

/**
 * Stylesheets
 */
import '../../../stylesheets/style.scss';

const App = ( { children, history } ) => {
	return (
		<div id="page" className="site">
			<Header />
			{ children }
		</div>
	)
};

export default App;
