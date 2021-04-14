<?php

namespace CC\CRUD;

/**
 * Assets Handler class
 */
class Assets {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'equeue_assets' ), 10, 1 );
	}

	public function get_scripts() {
		return array(
			'cc-scripts' => array(
				'src'     => CC_CRUD_ASSETS . '/js/frontend.js',
				'version' => fileatime( CC_CRUD_PATH . '/assets/js/frontend.js' ),
				'deps'    => array( 'jQuery' ),
			),
		);
	}

	public function get_styles() {
		return array(
			'cc-styles' => array(
				'src'     => CC_CRUD_ASSETS . '/css/frontend.css',
				'version' => fileatime( CC_CRUD_PATH . '/assets/css/frontend.css' ),
			),
		);
	}

	public function enqueue_assets() {

		$scripts = $this->get_scripts();

		foreach ( $scripts as $handle => $script ) {
			$deps = isset( $script['deps'] ) ? $script['deps'] : false;
			wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
		}

		$styles = $this->get_styles();

		foreach ( $styles as $handle => $style ) {
			$deps = isset( $style['deps'] ) ? $style['deps'] : false;
			wp_register_style( $handle, $style['src'], $deps, $style['version'] );
		}
	}
}
