<?php

/**
 * People CPT Custom Fields
 *
 * @package strikebase
 */
class Strikebase_Person_Fields extends Strikebase_Fields {
	/**
	 * Name of the post type(s) for fields to be applied
	 *
	 * @var array
	 */
	protected $post_types = array( 'person' );

	/**
	 * Create and register custom fields
	 *
	 * @action init
	 * @return null
	 */
	public function create_fields() {
		$person_fields = new Fieldmanager_Group( array(
			'name'     => 'person_contact_info',
			//'label'    => esc_html__( 'Contact Info', 'strikebase' ),
			'children' => array(
				'username'     => new Fieldmanager_Textfield( array(
					'name'  => 'username',
					'label' => esc_html__( 'WordPress.com Username', 'strikebase' ),
				) ),
				'email'        => new Fieldmanager_TextArea( array(
					'name'  => 'email',
					'label' => esc_html__( 'Email Address(s)', 'strikebase' ),
				) ),
				'phone'        => new Fieldmanager_TextArea( array(
					'name'  => 'phone',
					'label' => esc_html__( 'Phone Number(s)', 'strikebase' ),
				) ),
				'time_zone'    => new Fieldmanager_Select( array(
					'name'       => 'time_zone',
					'label'      => esc_html__( 'Time Zone', 'strikebase' ),
					'datasource' => new Fieldmanager_Datasource( array(
						'options' => strikebase_get_timezones(),
					) ),
				) ),
				// Social media accounts.
				'social_media' => new Fieldmanager_Group( array(
					'name'           => 'social_media',
					'label'          => esc_html__( 'Social Media Accounts', 'strikebase' ),
					'serialize_data' => 'false',
					'children'       => array(
						'twitter'   => new Fieldmanager_Textfield( array(
							'name'  => 'twitter',
							'label' => esc_html__( 'Twitter', 'strikebase' ),
						) ),
						'facebook'  => new Fieldmanager_Textfield( array(
							'name'  => 'facebook',
							'label' => esc_html__( 'Facebook', 'strikebase' ),
						) ),
						'youtube'   => new Fieldmanager_Textfield( array(
							'name'  => 'youtube',
							'label' => esc_html__( 'Youtube', 'strikebase' ),
						) ),
						'instagram' => new Fieldmanager_Textfield( array(
							'name'  => 'instagram',
							'label' => esc_html__( 'Instagram', 'strikebase' ),
						) ),
					),
				) ),
			),
		) );
		$person_fields->add_meta_box( esc_html__( 'Contact Info', 'strikebase' ), $this->post_types );
	}
}

Strikebase_Person_Fields::get_instance();
