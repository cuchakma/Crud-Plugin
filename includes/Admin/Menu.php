<?php

namespace CC\CRUD\Admin;

/**
 * Menu Handler Class
 */
class Menu{

    function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    public function admin_menu() {
        add_menu_page( __( 'CRUD PLUGIN', 'crud' ), __( 'CURD', 'crud' ), 'manage_options', 'crud', array( $this, 'plugin_page' ), 'dashicons-welcome-learn-more' );

    }

    public function plugin_page() {
        echo 'Hello World';
    }
}