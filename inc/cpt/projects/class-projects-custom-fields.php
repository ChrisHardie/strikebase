<?php
/**
 * Project CPT Custom Fields
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
	 * Add custom fields for Project post type
	 *
	 * @action fm_post_project
	 * @return null
	 */
	public function add_project_fields() {
		$project_fields = new Fieldmanager_Group( array(
			'name'     => 'project_info',
			'serialize_data' => 'false',
			'children' => array(
				'people' => new Fieldmanager_Group( array(
					'name'  => 'people',
					'label' => esc_html__( 'People', 'strikebase' ),
					'serialize_data' => 'false',
					'children' => array(
						'strikers' => new Fieldmanager_Select( array(
							'name'  => 'strikers',
							'label' => esc_html__( 'Strikers', 'strikebase' ),
							'limit' => 0,
							'add_more_label' => esc_html__( 'Add Striker', 'strikebase' ),
							'datasource' => new Fieldmanager_Datasource_Post( array(
								'query_args' => array(
									'post_type'      => 'person',
									'posts_per_page' => -1,
									'orderby'        => 'title',
									'order'          => 'ASC',
									'tax_query'      => array(
												array(
													'taxonomy' => 'person-type',
													'field'    => 'slug',
													'terms'    => 'striker',
												),
									),
								),
							) ),
						) ),
						'influencers' => new Fieldmanager_Autocomplete( array(
							'name'  => 'influencers',
							'label' => esc_html__( 'Influencers', 'strikebase' ),
							'limit' => 0,
							'add_more_label' => esc_html__( 'Add Influencer', 'strikebase' ),
							'datasource' => new Fieldmanager_Datasource_Post( array(
								'query_args' => array(
									'post_type'      => 'person',
									'posts_per_page' => -1,
									'orderby'        => 'title',
									'order'          => 'ASC',
									'tax_query'      => array(
												array(
													'taxonomy' => 'person-type',
													'field'    => 'slug',
													'terms'    => 'influencer',
												),
									),
								),
							) ),
						) ),
						'referrer' => new Fieldmanager_Textfield( array(
							'name'  => 'referrer',
							'label' => esc_html__( 'Referrer', 'strikebase' ),
						) ),
					)
				) ),
				'links' => new Fieldmanager_Group( array(
					'name'  => 'links',
					'label' => esc_html__( 'Links', 'strikebase' ),
					'children' => array(
						'staging_site' => new Fieldmanager_Link( array(
							'name'  => 'staging_site',
							'label' => esc_html__( 'Staging Site', 'strikebase' ),
						) ),
						'production_site' => new Fieldmanager_Link( array(
							'name'  => 'production_site',
							'label' => esc_html__( 'Production Site', 'strikebase' ),
						) ),
						'code_repo' => new Fieldmanager_Link( array(
							'name'  => 'code_repo',
							'label' => esc_html__( 'Code Repository', 'strikebase' ),
						) ),
					)
				) ),
				'dates' => new Fieldmanager_Group( array(
					'name'  => 'dates',
					'label' => esc_html__( 'Dates', 'strikebase' ),
					'children' => array(
						'date_received' => new Fieldmanager_Datepicker( array(
							'name'  => 'date_received',
							'label' => esc_html__( 'Date Received', 'strikebase' ),
						) ),
						'date_started' => new Fieldmanager_Datepicker( array(
							'name'  => 'date_started',
							'label' => esc_html__( 'Date Started', 'strikebase' ),
						) ),
						'est_launch' => new Fieldmanager_Datepicker( array(
							'name'  => 'est_launch',
							'label' => esc_html__( 'Estimated Launch Date', 'strikebase' ),
						) ),
						'launch' => new Fieldmanager_Datepicker( array(
							'name'  => 'launch',
							'label' => esc_html__( 'Actual Launch Date', 'strikebase' ),
						) ),
						'last_check_in' => new Fieldmanager_Datepicker( array(
							'name'  => 'last_check_in',
							'label' => esc_html__( 'Date of last check-in', 'strikebase' ),
						) ),
					)
				) ),
			)
		) );

		$project_fields->add_meta_box( esc_html__( 'Project Info', 'strikebase' ), $this->cpt );
	}

}
Strikebase_Project_Fields::get_instance();
