/**
 * External Dependencies
 */
import React from 'react';


const ProjectList = ( props ) => {
	return (
		<table className="strikebase-project-list">
			<thead>
				<tr>
					<th>Project</th>
					<th>Status</th>
					<th>Launch Date</th>
					<th>Last Check-In</th>
				</tr>
			</thead>
			<tbody>
				{
					props.projects.map( ( project, i ) => {
						let launchDate = new Date( project['launch-date'] * 1000 );
						let lastCheckInDate = new Date( project['last-check-in-date'] * 1000 );

						return (
							<tr key={ i }>
								<td className="entry-title">
									<a href="#">{ project.title.rendered }</a>
								</td>
								<td className="strikebase-project-status">
									{
										props.statuses.map( ( status, j ) => {
											if ( status.id == project["project-status"][j] ) {
												return <a key={ j } href="#">{ status.name }</a>;
											}
										} )
									}
								</td>
								<td className="strikebase-project-launch-date">
									<a href="#">{ launchDate.getUTCFullYear() + "-" + ( launchDate.getUTCMonth() + 1 ) + "-" + launchDate.getUTCDate() }</a>
								</td>
								<td className="strikebase-project-last-contact">
									<a href="#">{ lastCheckInDate.getUTCFullYear() + "-" + ( lastCheckInDate.getUTCMonth() + 1 ) + "-" + lastCheckInDate.getUTCDate() }</a>
								</td>
							</tr>
						);
					} )
				}
			</tbody>
		</table>
	)
};

export default ProjectList;
