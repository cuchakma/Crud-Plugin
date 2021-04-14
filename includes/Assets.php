<?php

namespace CC\CRUD;

/**
 * Assets Handler class
 */
class Assets {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'equeue_assets' ), 10, 1 );
	}

	public function equeue_assets() {
		wp_enqueue_script( 'cc-scripts', CC_CRUD_ASSETS . '/js/frontend.js', false, fileatime( CC_CRUD_PATH . '/assets/js/frontend.js' ), true );
		wp_enqueue_style( 'cc-styles', CC_CRUD_ASSETS . '/css/frontend.css', false, fileatime( CC_CRUD_PATH . '/assets/css/frontend.css' ) );
	}
}
