<?php

namespace CC\CRUD\Admin;

/**
 * Menu Handler Class
 */
class Menu{

    public $addressbook;

    function __construct( $addressbook ) {
        $this->addressbook = $addressbook;
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    public function admin_menu() {
        $parent_slug = 'crud';
        $capability  = 'manage_options';
        add_menu_page( __( 'CRUD PLUGIN', 'crud' ), __( 'CRUD', 'crud' ), $capability, $parent_slug, array( $this->addressbook, 'plugin_page' ), 'dashicons-welcome-learn-more' );
        add_submenu_page( $parent_slug, __( 'Address Book', 'crud' ), __( 'Address Book', 'crud' ),  $capability, $parent_slug, array( $this->addressbook, 'plugin_page' ) );
        add_submenu_page( $parent_slug, __( 'Settings', 'crud' ), __( 'Settings', 'crud' ),  $capability, 'cc-crud-settings', array( $this, 'settings_page' ) );
    }

    public function settings_page() {
        echo "Hi from settings Page";
    }
}