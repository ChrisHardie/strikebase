/**
 * External Dependencies
 */
import React from 'react';


const PersonList = () => {
	return (
		<table className="strikebase-people-list">
			<thead>
				<tr>
					<th>Name</th>
					<th>Organization</th>
					<th>Projects</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td className="entry-title">
						<a href="#">Test Name</a>
					</td>
					<td className="strikebase-person-organization">
						<a href="#">Test Org</a>
					</td>
					<td className="strikebase-person-project">
						<a href="#">Test Project</a>
					</td>
				</tr>
			</tbody>
		</table>
	)
};

export default PersonList;
