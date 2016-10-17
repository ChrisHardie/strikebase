<?php
/**
 * People CPT Custom Fields
 *
 * @package strikebase
 */

class Strikebase_Project_Fields {

	/**
	 * Singleton holder
	 */
	private static $__instance = null;

	/**
	 * Class variables
	 */
	private $cpt = 'project';

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
		add_action( 'fm_post_project', array( $this, 'add_project_fields' ) );
	}

	/**
	 * Add custom fields for Person post type
	 *
	 * @action fm_post_person
	 * @return null
	 */
	public function add_project_fields() {
		$person_fields = new Fieldmanager_Group( array(
			'name'     => 'person_contact_info',
			//'label'    => esc_html__( 'Contact Info', 'strikebase' ),
			'children' => array(
				'people' => new Fieldmanager_Group( array(
					'name'  => 'people',
					'label' => esc_html__( 'People', 'strikebase' ),
					'children' => array(
						'username' => new Fieldmanager_Textfield( array(
							'name'  => 'username',
							'label' => esc_html__( 'Username', 'strikebase' ),
						) ),
						'email' => new Fieldmanager_TextArea( array(
							'name'  => 'email',
							'label' => esc_html__( 'Email Address(s)', 'strikebase' ),
						) ),
						'phone' => new Fieldmanager_TextArea( array(
							'name'  => 'phone',
							'label' => esc_html__( 'Phone Number(s)', 'strikebase' ),
						) ),
					)
				) ),
			)
		) );

		$person_fields->add_meta_box( esc_html__( 'Contact Info', 'strikebase' ), $this->cpt );
	}

}
Strikebase_Project_Fields::get_instance();
