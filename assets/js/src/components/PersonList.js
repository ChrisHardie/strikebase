/**
 * External Dependencies
 */
import React from 'react';


const PersonList = ( props ) => {
	return (
		<div className="strikebase-people-wrap">
			<div className="strikebase-filter-and-sort">
				<ul className="dropdown-container">
					<li className="dropdown-label">Type</li>
				</ul>
			</div>

			<div className="strikebase-people-list">
				{
					props.people.map( ( person, i ) => {
						return (
							<article id={ `post-${ i }` } className="person strikebase-card" key={ i }>
								<h2 className="strikebase-card-title">{ person.title.rendered }</h2>

								<dl>
									<dt>Organization</dt>
									<dd className="strikebase-person-organization">
										{
											props.organizations.map( ( org, j ) => {
												if ( org.id == person.organization ) {
													return <a key={ j } href="#">{ org.name }</a>;
												}
											} )
										}
									</dd>
									<dt>Projects</dt>
									<dd className="strikebase-person-project">
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
									</dd>
								</dl>
							</article>
						);
					} )
				}
			</div>
		</div>
	)
};

export default PersonList;
