/**
 * External Dependencies
 */
import React from 'react';


const ProjectList = ( props ) => {
	return (
		<div className="strikebase-projects-wrap">
			<div className="strikebase-filter-and-sort">
				<ul className="dropdown-container">
					<li className="dropdown-label">Status</li>
				</ul>
				<ul className="dropdown-container">
					<li className="dropdown-label">Type</li>
				</ul>
				<ul className="dropdown-container">
					<li className="dropdown-label">Genre</li>
				</ul>
				<ul className="dropdown-container">
					<li className="dropdown-label">Host</li>
				</ul>
			</div>

			<div className="strikebase-projects-list">
				{
					props.projects.map( ( project, i ) => {
						let launchTimeStamp = new Date( project['launch-date'] * 1000 );
						let checkInTimeStamp = new Date( project['last-check-in-date'] * 1000 );
						let lastCheckInDate;
						let launchDate;

						if ( 0 < launchTimeStamp / 1000 ) {
							launchDate = (
								<a href="#">
									{ launchTimeStamp.getUTCFullYear() + "-" + ( launchTimeStamp.getUTCMonth() + 1 ) + "-" + launchTimeStamp.getUTCDate() }
								</a>
							);
						} else {
							launchDate = '';
						}

						if ( 0 < checkInTimeStamp / 1000 ) {
							lastCheckInDate = (
								<a href="#">
									{ checkInTimeStamp.getUTCFullYear() + "-" + ( checkInTimeStamp.getUTCMonth() + 1 ) + "-" + checkInTimeStamp.getUTCDate() }
								</a>
							);
						} else {
							lastCheckInDate = '';
						}

						return (
							<article id={ `post-${ i }` } className="project strikebase-card" key={ i }>
								<h2 className="strikebase-card-title">{ project.title.rendered }</h2>
								<dl>
									<dt>Status</dt>
									<dd>
										{
											props.statuses.map( ( status, j ) => {
												if ( status.id == project["project-status"][j] ) {
													return <a key={ j } href="#">{ status.name }</a>;
												}
											} )
										}
									</dd>
									<dt>Launch Date</dt>
									<dd className="strikebase-project-launch-date">
										{ launchDate }
									</dd>
									<dt>Last Check-In Date</dt>
									<dd className="strikebase-project-last-contact">
										{ lastCheckInDate }
									</dd>
								</dl>
							</article>
						);
					} )
				}
			</div>
		</div>
	)
};

export default ProjectList;
