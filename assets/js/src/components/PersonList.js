/**
 * External Dependencies
 */
import React from 'react';

/**
 * Internal Dependencies
 */
import Person from './Person';

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
						<Person
							key={ i }
							index={ i }
							person={ person }
							organizations={ props.organizations }
							projects={ props.projects }
						/>
						);
					} )
				}
			</div>
		</div>
	)
};

export default PersonList;
