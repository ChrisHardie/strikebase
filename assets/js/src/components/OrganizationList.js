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
					let timeStamp = new Date( props.projects[i]['last-check-in-date'] * 1000 );
					let lastCheckInDate;

					if ( timeStamp / 1000 > 0 ) {
						lastCheckInDate = (
							<a href="#">
								{ timeStamp.getUTCFullYear() + "-" + ( timeStamp.getUTCMonth() + 1 ) + "-" + timeStamp.getUTCDate() }
							</a>
						);
					} else {
						lastCheckInDate = '';
					}

					return (
						<tr key={ i }>
							<td className="entry-title">
								<a href="#">{ org.name }</a>
							</td>
							<td className="strikebase-person-organization">
								{
									props.people.map( ( person, j ) => {
										if ( org.id == person.organization ) {
											return <div key={ j }><a href="#">{ person.title.rendered }</a></div>;
										}
									} )
								}
							</td>
							<td className="strikebase-person-project">
								{
									props.projects.map( ( project, k ) => {
										if ( org.id == project.organization ) {
											return <div key={ k }><a href="#">{ project.title.rendered }</a></div>;
										}
									} )
								}
							</td>
							<td className="strikebase-person-last-contact">
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

export default OrganizationList;
