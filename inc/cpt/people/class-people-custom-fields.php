<?php
/**
 * People CPT Custom Fields
 *
 * @package strikebase
 */

class Strikebase_Person_Fields {

	/**
	 * Singleton holder
	 */
	private static $__instance = null;

	/**
	 * Class variables
	 */
	private $cpt = 'person';

	/**
	 * Instantiate the singleton
	 */
	public static function get_instance() {
		if ( ! is_a( self::$__instance, __CLASS__ ) ) {
			self::$__instance = new self;
		}
		return self::$__instance;
	}

	/**
	 * Add those actions to the init hook when the class is instantiated.
	 */
	private function __construct() {
		add_action( 'fm_post_person', array( $this, 'add_person_fields' ) );
	}

	/*
	 * Get a list of all the timezones PHP supports.
	 */
	private function get_timezones() {
		$timezone_list = DateTimeZone::listIdentifiers( DateTimeZone::ALL );
		return $tzlist;
	}

	/**
	 * Add custom fields for Person post type
	 *
	 * @action fm_post_person
	 * @return null
	 */
	public function add_person_fields() {
		$person_fields = new Fieldmanager_Group( array(
			'name'     => 'person_contact_info',
			//'label'    => esc_html__( 'Contact Info', 'strikebase' ),
			'children' => array(
				'username' => new Fieldmanager_Textfield( array(
					'name'  => 'username',
					'label' => esc_html__( 'WordPress.com Username', 'strikebase' ),
				) ),
				'email' => new Fieldmanager_TextArea( array(
					'name'  => 'email',
					'label' => esc_html__( 'Email Address(s)', 'strikebase' ),
				) ),
				'phone' => new Fieldmanager_TextArea( array(
					'name'  => 'phone',
					'label' => esc_html__( 'Phone Number(s)', 'strikebase' ),
				) ),
				'time_zone' => new Fieldmanager_Autocomplete( array(
					'name'  => 'time_zone',
					'label' => esc_html__( 'Time Zone', 'strikebase' ),
					'datasource'  => new Fieldmanager_Datasource( array(
						'options' => self::get_timezones(),
					) ),
				) ),

				// Social media accounts.
				'social_media' => new Fieldmanager_Group( array(
					'name'  => 'social_media',
					'label' => esc_html__( 'Social Media Accounts', 'strikebase' ),
					'serialize_data' => 'false',
					'children' => array(
						'twitter' => new Fieldmanager_Textfield( array(
							'name'  => 'twitter',
							'label' => esc_html__( 'Twitter', 'strikebase' ),
						) ),
						'facebook' => new Fieldmanager_Textfield( array(
							'name'  => 'facebook',
							'label' => esc_html__( 'Facebook', 'strikebase' ),
						) ),
						'youtube' => new Fieldmanager_Textfield( array(
							'name'  => 'youtube',
							'label' => esc_html__( 'Youtube', 'strikebase' ),
						) ),
						'instagram' => new Fieldmanager_Textfield( array(
							'name'  => 'instagram',
							'label' => esc_html__( 'Instagram', 'strikebase' ),
						) )
					)
				) ),
			)
		) );

		$person_fields->add_meta_box( esc_html__( 'Contact Info', 'strikebase' ), $this->cpt );
	}

}
Strikebase_Person_Fields::get_instance();
