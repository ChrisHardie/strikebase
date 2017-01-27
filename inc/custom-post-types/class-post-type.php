<?php

/**
 * Abstract Singleton class for CPT inheritance
 */
abstract class Strikebase_Post_Type {
	/**
	 * Singleton holder
	 */
	private static $__instances = array();
	/**
	 * Name of the post type
	 *
	 * @var string
	 */
	protected $cpt_name = null;

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
	private function __construct() {
		// Create the post type
		add_action( 'init', array( $this, 'create_post_type' ) );
	}

	/**
	 * Create the post type
	 */
	abstract public function create_post_type();
}