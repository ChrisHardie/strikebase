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

const App = ( { children } ) => {
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
};

export default App;
