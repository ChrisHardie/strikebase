/**
 * External Dependencies
 */
import React from 'react';

/**
 * Internal Dependencies
 */
import Organization from './Organization';

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
						<Organization
							key={ i }
							index={ i }
							org={ org }
							projects={ props.projects }
							people={ props.people }
							lastCheckInDate={ lastCheckInDate }
						/>
					);
				} )
			}
		</div>
	)
};

export default OrganizationList;
