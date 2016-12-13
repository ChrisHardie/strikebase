import React from 'react';
import ReactDOM from 'react-dom';

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
