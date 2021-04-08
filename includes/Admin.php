<?php

namespace CC\CRUD;

/**
 * The admin class
 */

class Admin{

    /**
     * Initialize the class
     */
    function __construct() {
        $this->dispatch_actions();
        new Admin\Menu();
    }

    public function dispatch_actions(){
        $addressbook = new Admin\Addressbook();
        add_action( 'admin_init', array( $addressbook, 'form_handler' ) );
    }
}