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
									{ launchDate }
								</td>
								<td className="strikebase-project-last-contact">
									{ lastCheckInDate }
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
