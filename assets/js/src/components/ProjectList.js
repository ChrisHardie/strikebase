/**
 * External Dependencies
 */
import React from 'react';


const ProjectList = () => {
	return (
		<table className="strikebase-project-list">
			<thead>
			<th>Project</th>
			<th>Status</th>
			<th>Launch Date</th>
			<th>Last Check-In</th>
			</thead>
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
		</table>
	)
};

export default ProjectList;
