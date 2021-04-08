<?php

namespace CC\CRUD\Admin;

/**
 * Addressbook class handler
 */
class Addressbook{

    public function plugin_page() {

        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';

        switch( $action ){
            case 'new':
                $template = __DIR__ .'/views/address-new.php';
                break;
            
            case 'edit':
                $template = __DIR__ .'/views/address-edit.php';
                break;
            
            case 'view':
                $template = __DIR__ .'/views/address-view.php';
                break;
            
            default:
                $template = __DIR__ . '/views/address-list.php';
                
        }

        if( file_exists( $template ) ) {
            include $template;
        }
    }

    /**
     * Handles the form
     *
     * @return void
     */
    public function form_handler() {

        if( !isset( $_POST['submit_address'] ) ) {
            return;
        }

        if( !wp_verify_nonce( $_POST['_wpnonce'], 'new-address' ) ) {
            wp_die( 'Are You Cheating?' );
        }

        if( !current_user_can( 'manage_options' ) ) {
            wp_die( 'Are You Cheating?' );
        }

        var_dump( $_POST );
        exit();
    }

}