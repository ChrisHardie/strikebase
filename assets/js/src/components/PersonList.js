/**
 * External Dependencies
 */
import React from 'react';


const PersonList = ( props ) => {
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
				{
					props.people.map( ( person, i ) => {
						return (
							<tr key={ i }>
								<td className="entry-title">
									<a href="#">{ person.title.rendered }</a>
								</td>
								<td className="strikebase-person-organization">
									{
										props.organizations.map( ( org, i ) => {
											if ( org.id == person.organization ) {
												return <a key={ i } href="#">{ org.name }</a>;
											}
										} )
									}
								</td>
								<td className="strikebase-person-project">
									<a href="#">Test Project</a>
								</td>
							</tr>
						);
					} )
				}
			</tbody>
		</table>
	)
};

export default PersonList;