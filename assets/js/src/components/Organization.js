/**
 * External Dependencies
 */
import React from 'react';

const Organization = ( props ) => {
	return (
		<article id="strikebase-term-slug" className="strikebase-card organization">
			<h2 className="strikebase-card-title">{ props.org.name }</h2>

			<dl>
				<dt>People</dt>
				<dd className="strikebase-person-organization">
					{
						props.people.map( ( person, j ) => {
							if ( props.org.id == person.organization ) {
								return <div key={ j }><a href="#">{ person.title.rendered }</a></div>;
							}
						} )
					}
				</dd>
				<dt>Projects</dt>
				<dd className="strikebase-person-project">
					{
						props.projects.map( ( project, k ) => {
							if ( props.org.id == project.organization ) {
								return <div key={ k }><a href="#">{ project.title.rendered }</a></div>;
							}
						} )
					}
				</dd>
				<dt>Last Check-In Date</dt>
				<dd className="strikebase-person-last-contact">
					{ props.lastCheckInDate }
				</dd>
			</dl>
		</article>
	);
};

export default Organization;
