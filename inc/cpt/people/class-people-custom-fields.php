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
				'time_zone' => new Fieldmanager_Textfield( array(
					'name'  => 'time_zone',
					'label' => esc_html__( 'Timezone', 'strikebase' ),
				) ),
				'social_media' => new Fieldmanager_TextArea( array(
					'name'  => 'social_media',
					'label' => esc_html__( 'Social Media Accounts', 'strikebase' ),
				) ),
			)
		) );

		$person_fields->add_meta_box( esc_html__( 'Contact Info', 'strikebase' ), $this->cpt );
	}

}
Strikebase_Person_Fields::get_instance();
