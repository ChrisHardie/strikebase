/**
 * External Dependencies
 */
import React from 'react';

const Person = ( props ) => {
	return (
		<article id={ `post-${ props.index }` } className="person strikebase-card">
			<h2 className="strikebase-card-title">{ props.person.title.rendered }</h2>

			<dl>
				<dt>Organization</dt>
				<dd className="strikebase-person-organization">
					{
						props.organizations.map( ( org, j ) => {
							if ( org.id == props.person.organization ) {
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
									if ( Array.isArray( projectPeople[personType] ) && projectPeople[personType][l] == props.person.id ) {
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
};

export default Person;
