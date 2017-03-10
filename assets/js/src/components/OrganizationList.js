/**
 * External Dependencies
 */
import React from 'react';


const OrganizationList = ( props ) => {
	return (
		<div className="strikebase-organization-list">
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
						<article id="strikebase-term-slug" className="strikebase-card organization" key={ i }>
							<h2 className="strikebase-card-title">{ org.name }</h2>

							<dl>
								<dt>People</dt>
								<dd className="strikebase-person-organization">
									{
										props.people.map( ( person, j ) => {
											if ( org.id == person.organization ) {
												return <div key={ j }><a href="#">{ person.title.rendered }</a></div>;
											}
										} )
									}
								</dd>
								<dt>Projects</dt>
								<dd className="strikebase-person-project">
									{
										props.projects.map( ( project, k ) => {
											if ( org.id == project.organization ) {
												return <div key={ k }><a href="#">{ project.title.rendered }</a></div>;
											}
										} )
									}
								</dd>
								<dt>Last Check-In Date</dt>
								<dd className="strikebase-person-last-contact">
									{ lastCheckInDate }
								</dd>
							</dl>
						</article>
					);
				} )
			}
		</div>
	)
};

export default OrganizationList;
