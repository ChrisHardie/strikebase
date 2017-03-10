/**
 * External Dependencies
 */
import React from 'react';
import { Link } from 'react-router';


const Header = () => {
	return (
		<header id="masthead" className="site-header" role="banner">
			<h1 className="site-title"><Link to={ "/" }>Strikebase</Link></h1>
			<nav id="site-navigation" className="main-navigation" role="navigation">
				<ul>
					<li><Link to={ "/" }>Dashboard</Link></li>
					<li><Link to={ "/projects" }>Projects</Link></li>
					<li><Link to={ "/people" }>People</Link></li>
					<li><Link to={ "/organizations" }>Organizations</Link></li>
				</ul>
			</nav>
		</header>
	)
};

export default Header;
