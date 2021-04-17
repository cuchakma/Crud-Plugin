<?php

namespace CC\CRUD;

/**
 * Assets Handler class
 */
class Assets {

	/**
	 * Class constructor
	 */
	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_assets' ) );
	}

	/**
	 * All available scripts
	 *
	 * @return array
	 */
	public function get_scripts() {
		return array(
			'academy-script'         => array(
				'src'     => CC_CRUD_ASSETS . '/js/frontend.js',
				'version' => filemtime( CC_CRUD_PATH . '/assets/js/frontend.js' ),
				'deps'    => array( 'jquery' ),
			),
			'academy-enquiry-script' => array(
				'src'     => CC_CRUD_ASSETS . '/js/enquiry.js',
				'version' => filemtime( CC_CRUD_PATH . '/assets/js/enquiry.js' ),
			),
		);
	}

	/**
	 * All available styles
	 *
	 * @return array
	 */
	public function get_styles() {
		return array(
			'academy-style'         => array(
				'src'     => CC_CRUD_ASSETS . '/css/frontend.css',
				'version' => filemtime( CC_CRUD_PATH . '/assets/css/frontend.css' ),
			),
			'academy-admin-style'   => array(
				'src'     => CC_CRUD_ASSETS . '/css/admin.css',
				'version' => filemtime( CC_CRUD_PATH . '/assets/css/admin.css' ),
			),
			'academy-enquiry-style' => array(
				'src'     => CC_CRUD_ASSETS . '/css/enquiry.css',
				'version' => filemtime( CC_CRUD_PATH . '/assets/css/enquiry.css' ),
			),
		);
	}

	/**
	 * Register scripts and styles
	 *
	 * @return void
	 */
	public function register_assets() {
		$scripts = $this->get_scripts();
		$styles  = $this->get_styles();

		foreach ( $scripts as $handle => $script ) {
			$deps = isset( $script['deps'] ) ? $script['deps'] : false;

			wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
		}

		foreach ( $styles as $handle => $style ) {
			$deps = isset( $style['deps'] ) ? $style['deps'] : false;

			wp_register_style( $handle, $style['src'], $deps, $style['version'] );
		}

		error_log(wp_localize_script(
			'academy-enquiry-script',
			'cccrudobject',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'error'   => __( 'Something Went Wrong', 'crud' ),
			)
		));
	}
}
