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
						return (
							<tr key={ i }>
								<td className="entry-title">
									<a href="#">{ project.title.rendered }</a>
								</td>
								<td className="strikebase-project-status">
									{
										props.statuses.map( ( status, i ) => {
											if ( status.id == project["project-status"][i] ) {
												return <a key={ i } href="#">{ status.name }</a>
											}
										} )
									}
								</td>
								<td className="strikebase-project-launch-date">
									<a href="#">Test Date</a>
								</td>
								<td className="strikebase-project-last-contact">
									<a href="#">Test Date</a>
								</td>
							</tr>
						)
					} )
				}
			</tbody>
		</table>
	)
};

export default ProjectList;
