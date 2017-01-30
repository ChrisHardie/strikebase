<?php

/**
 * Abstract Singleton class for Custom Field inheritance
 */
abstract class Strikebase_Fields {
	/**
	 * Instances of this class
	 *
	 * Used by sub-classes to track instances
	 *
	 * @var array
	 */
	private static $__instances = array();
	/**
	 * Name of the post type(s) field group is attached to
	 *
	 * Set to null but overridden by sub-classes to generate field groups
	 *
	 * @var array
	 */
	protected $post_types = null;

	/**
	 * Creates an instance of this class
	 *
	 * @return Strikebase_Fields (or sub-class instance, in this case)
	 */
	public static function get_instance() {
		$class = get_called_class();
		if ( ! array_key_exists( $class, self::$__instances ) ) {
			self::$__instances[ $class ] = new $class();
		}

		return self::$__instances[ $class ];
	}

	/**
	 * Initializes the field group by running the create_fields function from the
	 * sub-classes in the init hook.
	 *
	 * Note that the constructor for this class (and sub-classes) relies on
	 * the Singleton Pattern
	 */
	private function __construct() {
		// Create the post type
		add_action( 'init', array( $this, 'create_fields' ) );
	}

	/**
	 * Creates custom field group using the Fieldmanager plugin - https://github.com/alleyinteractive/wordpress-fieldmanager.
	 * Adds meta boxes to field group post type.
	 *
	 * Note: Because this is an Abstract parent class, this method must be defined in all child classes.
	 */
	abstract public function create_fields();
}
