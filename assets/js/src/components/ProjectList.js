/**
 * External Dependencies
 */
import React from 'react';


const ProjectList = () => {
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
				<tr>
					<td className="entry-title">
						<a href="#">Project Name</a>
					</td>
					<td className="strikebase-project-status">
						<a href="#">Test Status</a>
					</td>
					<td className="strikebase-project-launch-date">
						<a href="#">Test Date</a>
					</td>
					<td className="strikebase-project-last-contact">
						<a href="#">Test Date</a>
					</td>
				</tr>
			</tbody>
		</table>
	)
};

export default ProjectList;
