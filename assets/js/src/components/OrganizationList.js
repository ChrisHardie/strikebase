/**
 * External Dependencies
 */
import React from 'react';


const OrganizationList = ( props ) => {
	return (
		<table className="strikebase-organization-list">
			<thead>
				<tr>
					<th>Organization</th>
					<th>People</th>
					<th>Projects</th>
					<th>Last Contacted</th>
				</tr>
			</thead>
			<tbody>
				{
					props.organizations.map( ( org, i ) => {
						return (
							<tr key={ i }>
								<td className="entry-title">
									<a href="#">{ org.name }</a>
								</td>
								<td className="strikebase-person-organization">
									<a href="#">Test Org</a>
								</td>
								<td className="strikebase-person-project">
									<a href="#">Test Project</a>
								</td>
								<td className="strikebase-person-last-contact">
									<a href="#">Test Last Contacted</a>
								</td>
							</tr>
						)
					} )
				}
			</tbody>
		</table>
	)
};

export default OrganizationList;
