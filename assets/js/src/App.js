import React from 'react'
import ReactDOM from 'react-dom'

class App extends React.Component {
	render() {
		return (
			<div className="container">
				<h2>Bonjour, Le React!</h2>
			</div>
		)
	}
}

ReactDOM.render( <App/>, document.getElementById( 'primary' ) );
