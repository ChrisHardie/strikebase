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
										props.organizations.map( ( org, j ) => {
											if ( org.id == person.organization ) {
												return <a key={ j } href="#">{ org.name }</a>;
											}
										} )
									}
								</td>
								<td className="strikebase-person-project">
									{
										props.projects.map( ( project, k ) => {
											let projectPeople = project['project-people'];

											for ( let personType in projectPeople ) {
												for ( let l = 0, ll = projectPeople[personType].length; l < ll; l++ ) {
													if ( Array.isArray( projectPeople[personType] ) && projectPeople[personType][l] == person.id ) {
														return <div key={ k }><a href="#">{ project.title.rendered }</a></div>;
													}
												}
											}
										} )
									}
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
