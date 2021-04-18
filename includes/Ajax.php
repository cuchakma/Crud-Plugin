<?php

namespace CC\CRUD;

use function cli\err;

/**
 * Ajax class handler
 */
class Ajax {

	public function __construct() {

		add_action( 'wp_ajax_cc_enquiry', array( $this, 'submit_enquiry' ) );
		add_action( 'wp_ajax_nopriv_cc_enquiry', array( $this, 'submit_enquiry' ) );
		add_action( 'wp_ajax_nopriv_cc-delete-contact', array( $this, 'delete_contact') );

	}

	public function submit_enquiry() {

		if( !wp_verify_nonce( $_REQUEST['_wpnonce'], 'cc-enquiry-form' ) ) {
			wp_send_json_error([
				'message' => 'Nonce Verification Failed'
			]);
		}

	}

	public function delete_contact() {
		wp_send_json_success();
	}
}
