/**
 * External Dependencies
 */
import React from 'react';

const Project = ( props ) => {
	return (
		<article id={ `post-${ props.index }` } className="project strikebase-card">
			<h2 className="strikebase-card-title">{ props.project.title.rendered }</h2>
			<dl>
				<dt>Status</dt>
				<dd>
					{
						props.statuses.map( ( status, j ) => {
							if ( status.id == props.project["project-status"][j] ) {
								return <a key={ j } href="#">{ status.name }</a>;
							}
						} )
					}
				</dd>
				<dt>Launch Date</dt>
				<dd className="strikebase-project-launch-date">
					{ props.launchDate }
				</dd>
				<dt>Last Check-In Date</dt>
				<dd className="strikebase-project-last-contact">
					{ props.lastCheckInDate }
				</dd>
			</dl>
		</article>
	);
};

export default Project;
