<?php

/**
 * Abstract Singleton class for Custom Field inheritance
 */
abstract class Strikebase_Fields {
	/**
	 * Singleton holder
	 */
	protected static $__instances = array();
	/**
	 * Name of the post type
	 *
	 * @var string
	 */
	protected $field_name = null;

	/**
	 * Instantiate the singleton
	 */
	public static function get_instance() {
		$class = get_called_class();
		if ( ! array_key_exists( $class, self::$__instances ) ) {
			self::$__instances[ $class ] = new $class();
		}

		return self::$__instances[ $class ];
	}

	/**
	 * Constructor
	 */
	protected function __construct() {
		// Create the post type
		add_action( 'init', array( $this, 'create_fields' ) );
	}

	/**
	 * Create the post type
	 */
	abstract public function create_fields();
}
