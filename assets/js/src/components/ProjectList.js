/**
 * External Dependencies
 */
import React from 'react';

/**
 * Internal Dependencies
 */
import Project from './Project';

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
							<Project
								key={ i }
								index={ i }
								project={ project }
							    statuses={ props.statuses }
							    launchdate={ launchDate }
							    lastCheckInDate={ lastCheckInDate }
							/>
						);
					} )
				}
			</div>
		</div>
	)
};

export default ProjectList;
