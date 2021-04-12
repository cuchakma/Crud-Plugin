<?php
/**
 * Plugin Name: CRUD PLUGIN
 * Plugin URI:  www.facebook.com
 * Description: This is a crud plugin
 * Version:     1.0
 * Author:      Cupid Chakma
 * Author URI:  www.facebook.com
 * Text Domain: crud
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     CRUD PLUGIN
 * @author      Cupid Chakma
 * @copyright   2020 D&D
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      Plugin Functions Prefix
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class CC_CRUD {


	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';

	/**
	 * Class constructor
	 */
	private function __construct() {
		$this->define_constants();
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initialize the singleton instance
	 *
	 * @return \CC_CRUD;
	 */

	public static function single() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	public function define_constants() {
		define( 'CC_CRUD_VERSION', self::version );
		define( 'CC_CRUD_FILE', __FILE__ );
		define( 'CC_CRUD_PATH', __DIR__ );
		define( 'CC_CRUD_URL', plugins_url( '', CC_CRUD_FILE ) );
		define( 'CC_CRUD_ASSETS', CC_CRUD_URL . '/assets' );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {
		if ( is_admin() ) {
			new CC\CRUD\Admin();
		} else {
			new \CC\CRUD\Frontend();
		}
	}

	/**
	 * Triggered when plugin is activated
	 *
	 * @return void
	 */
	public function activate() {
		$installer = new CC\CRUD\Installer();
		$installer->run();
	}
}

/**
 * Initializes the main plugin
 *
 * @return \CRUD
 */
function cc_crud() {
	return CC_CRUD::single();
}

/**
 * Kickstart the plugin
 */
cc_crud();
