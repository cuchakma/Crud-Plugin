<?php

namespace CC\CRUD;

/**
 * The admin class
 */

class Admin {

	/**
	 * Initialize the class
	 */
	function __construct() {
		$addressbook = new Admin\Addressbook();
		$this->dispatch_actions( $addressbook );
		new Admin\Menu( $addressbook );
	}

	public function dispatch_actions( $addressbook ) {
		add_action( 'admin_init', array( $addressbook, 'form_handler' ) );
		add_action( 'admin_post_cc-delete-address', array( $addressbook, 'delete_address' ) );
	}
}
