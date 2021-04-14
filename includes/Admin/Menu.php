<?php

namespace CC\CRUD\Admin;

use function cli\err;

/**
 * Menu Handler Class
 */
class Menu {

	public $addressbook;

	function __construct( $addressbook ) {
		$this->addressbook = $addressbook;
		add_action( 'admin_menu', array( $this, 'admin_main' ) );
	}

	public function admin_main() {
		$parent_slug = 'crud';
		$capability  = 'manage_options';
		$hook        = add_menu_page( __( 'CRUD PLUGIN', 'crud' ), __( 'CRUD', 'crud' ), $capability, $parent_slug, array( $this->addressbook, 'plugin_page' ), 'dashicons-welcome-learn-more' );
		add_submenu_page( $parent_slug, __( 'Address Book', 'crud' ), __( 'Address Book', 'crud' ), $capability, $parent_slug, array( $this->addressbook, 'plugin_page' ) );
		add_submenu_page( $parent_slug, __( 'Settings', 'crud' ), __( 'Settings', 'crud' ), $capability, 'cc-crud-settings', array( $this, 'settings_page' ) );
		add_action( 'admin_head-' . $hook, array( $this, 'enqueue_assets' ) );
	}

	public function settings_page() {
		echo 'Hi from settings Page';
	}

	public function enqueue_assets() {
		wp_enqueue_style( 'academy-admin-style' );
	}
}
